<template>
  <v-card flat class="my-5 mx-5">
    <div class="d-flex align-center mx-6 my-5">
      <v-spacer></v-spacer>
      <v-text-field
        rounded
        dense
        outlined
        :prepend-inner-icon="icons.mdiMagnify"
        class="app-bar-search flex-grow-0"
        hide-details
        type="'text'"
        v-model="keywords"
      ></v-text-field>
    </div>
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Guard</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in roles" :key="role.id">
            <td>{{ role.name }}</td>
            <td>
              {{ role.guard_name }}
            </td>
            <td>
              <router-link :to="{ name: 'role-edit', params: { id: role.id } }" class="btn btn-success"
                ><v-btn color="primary" class="me-3"> Edit </v-btn></router-link
              >
              <v-btn color="danger" outlined @click="deleteRole(role.id)" class="btn btn-danger">Delete</v-btn>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
    <div class="d-flex align-center mx-6 my-5">
      <v-spacer></v-spacer>
      <v-btn color="primary" :disabled="currentPage === 1" @click="changePage(-1)">Prev</v-btn>
      <v-btn color="primary" :disabled="currentPage === lastPage" @click="changePage(1)">Next >></v-btn>
    </div>
  </v-card>
</template>

<script>
import { mdiAlertOutline, mdiMagnify, mdiCloudUploadOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'
import axios from 'axios'

export default {
  data() {
    return {
      roles: [],
      keywords: null,
      lastPage: '',
      currentPage: 1,
    }
  },
  watch: {
    keywords(after, before) {
      this.fetch()
    },
  },
  mounted() {
    this.getRole()
  },
  methods: {
    async getRole() {
      await axios
        .get(`/api/roles?page=${this.currentPage}`)
        .then(response => {
          this.roles = response.data.data
          this.lastPage = response.data.last_page
          console.log(this.roles)
        })
        .catch(error => {
          console.log(error)
          this.roles = []
        })
    },
    deleteRole(id) {
      this.$swal({
        title: 'Are you sure?',
        text: 'Are you sure want to delete this item!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then(result => {
        if (result.value) {
          axios
            .delete(`/api/roles/${id}`)
            .then(response => {
              this.getRole()
            })
            .catch(error => {
              console.log(error)
            })
          this.$swal('Deleted!', 'Your file has been deleted.', 'success')
        }
      })
    },
    fetch() {
      axios
        .get('/role-search', { params: { keywords: this.keywords } })
        .then(response => (this.roles = response.data.data))
        .catch(error => {})
    },
    changePage(num) {
      this.currentPage = this.currentPage + num
      this.getRole()
    },
  },
  setup() {
    return {
      icons: {
        mdiAlertOutline,
        mdiMagnify,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
