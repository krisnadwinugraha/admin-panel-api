<template>
  <v-card flat class="mt-5">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Deskripsi</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.name">
            <td>{{ category.name }}</td>
            <td>
              {{ category.deskripsi }}
            </td>
            <td>
              <router-link :to="{ name: 'categoryEdit', params: { id: category.id } }" class="btn btn-success"
                ><v-btn color="primary" class="me-3"> Edit </v-btn></router-link
              >
              <v-btn color="danger" outlined @click="deleteCategory(category.id)" class="btn btn-danger">Delete</v-btn>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </v-card>
</template>

<script>
import { mdiAlertOutline, mdiCloudUploadOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'
import axios from 'axios'

export default {
  name: 'categories',
  data() {
    return {
      categories: [],
    }
  },
  mounted() {
    this.getCategories()
  },
  methods: {
    async getCategories() {
      await axios
        .get('/api/categories')
        .then(response => {
          this.categories = response.data
        })
        .catch(error => {
          console.log(error)
          this.categories = []
        })
    },
    deleteCategory(id) {
      if (confirm('Are you sure to delete this category ?')) {
        axios
          .delete(`/api/categories/${id}`)
          .then(response => {
            this.getCategories()
          })
          .catch(error => {
            console.log(error)
          })
      }
    },
  },
  props: {
    indexData: {
      type: Object,
      default: () => {},
    },
  },
  setup(props) {
    const status = ['Active', 'Inactive', 'Pending', 'Closed']

    const indexDataLocale = ref(JSON.parse(JSON.stringify(props.indexData)))

    const resetForm = () => {
      indexDataLocale.value = JSON.parse(JSON.stringify(props.indexData))
    }

    return {
      status,
      indexDataLocale,
      resetForm,
      icons: {
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
