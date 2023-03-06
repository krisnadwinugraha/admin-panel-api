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
            <th class="text-uppercase">Deskripsi</th>
            <th class="text-uppercase">Harga</th>
            <th class="text-uppercase">Image</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.name">
            <td>{{ product.name }}</td>
            <td>
              {{ product.deskripsi }}
            </td>
            <td>
              {{ product.harga }}
            </td>
            <td>
              <v-img
                v-if="product.image"
                class="white--text align-end"
                :src="'/images/avatars/' + product.image"
                height="100"
                width="100"
                alt=""
              />
            </td>
            <td>
              <router-link :to="{ name: 'product-edit', params: { id: product.id } }" class="btn btn-success"
                ><v-btn color="primary" class="me-3"> Edit </v-btn></router-link
              >
              <v-btn color="danger" outlined @click="deleteProduct(product.id)" class="btn btn-danger">Delete</v-btn>
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
  name: 'products',
  data() {
    return {
      products: [],
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
    this.getProducts()
  },
  methods: {
    async getProducts() {
      await axios
        .get(`/api/products?page=${this.currentPage}`)
        .then(response => {
          this.products = response.data.data
          this.lastPage = response.data.last_page
        })
        .catch(error => {
          console.log(error)
          this.products = []
        })
    },
    deleteProduct(id) {
      if (confirm('Are you sure to delete this products ?')) {
        axios
          .delete(`/api/products/${id}`)
          .then(response => {
            this.getProducts()
          })
          .catch(error => {
            console.log(error)
          })
      }
    },
    fetch() {
      axios
        .get('/product-search', { params: { keywords: this.keywords } })
        .then(response => (this.products = response.data.data))
        .catch(error => {})
    },
    changePage(num) {
      this.currentPage = this.currentPage + num
      this.getProducts()
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
        mdiMagnify,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
