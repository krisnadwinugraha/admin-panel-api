<template>
  <v-card id="report-card" class="py-5 px-5">
    <v-card flat class="my-5 mx-5">
      <h1>Report Transaction</h1>
      <div class="d-flex align-center me-6 my-5">
        <a href="../print-pdf" class="btn btn-success" target="_blank" style="text-decoration: none; color: inherit"
          ><v-btn color="primary" class="me-3"> Print PDF </v-btn></a
        >
        <a href="../export-excel" class="btn btn-success" target="_blank" style="text-decoration: none; color: inherit"
          ><v-btn color="success" class="me-3"> Export Excel </v-btn></a
        >
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
              <th class="text-uppercase">Product</th>
              <th class="text-uppercase">Product Price</th>
              <th class="text-uppercase">QTY</th>
              <th class="text-uppercase">Total Price</th>
              <th class="text-uppercase">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="transaction in transactions" :key="transaction.title">
              <td>{{ transaction.name }}</td>
              <td>
                {{ transaction.product_id.name }}
              </td>
              <td>
                {{ transaction.product_id.price }}
              </td>
              <td>
                {{ transaction.qty }}
              </td>
              <td>
                {{ transaction.product_id.price * transaction.qty }}
              </td>
              <td>
                {{ transaction.status }}
              </td>
              <td></td>
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
  </v-card>
</template>

<script>
import { mdiAlertOutline, mdiMagnify, mdiCloudUploadOutline } from '@mdi/js'
import axios from 'axios'

export default {
  name: 'transactions',
  data() {
    return {
      transactions: [],
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
    this.getTransactions()
  },
  methods: {
    async getTransactions() {
      await axios
        .get(`/api/transactions`)
        .then(response => {
          this.transactions = response.data.data
          this.lastPage = response.data.last_page
        })
        .catch(error => {
          console.log(error)
          this.transactions = []
        })
    },
    deleteTransaction(id) {
      if (confirm('Are you sure to delete this transaction ?')) {
        axios
          .delete(`/api/transactions/${id}`)
          .then(response => {
            this.getTransactions()
          })
          .catch(error => {
            console.log(error)
          })
      }
    },
    fetch() {
      axios
        .get('/transaction-search', { params: { keywords: this.keywords } })
        .then(response => (this.transactions = response.data.data))
        .catch(error => {})
    },
    changePage(num) {
      this.currentPage = this.currentPage + num
      this.getTransactions()
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
