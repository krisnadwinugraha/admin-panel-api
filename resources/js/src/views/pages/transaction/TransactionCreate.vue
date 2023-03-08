<template>
  <v-card flat class="mt-5">
    <v-form @submit.prevent="create">
      <div class="px-3">
        <v-card-text class="pt-5">
          <v-row>
            <v-col cols="12" sm="8" md="6">
              <h2 class="mb-5">Create Transaction</h2>
              <!-- Nama -->
              <v-text-field v-model="transaction.nama" :type="'text'" label="Nama" outlined dense></v-text-field>

              <!-- Products -->

              <v-select
                :items="products"
                v-model="transaction.product_id"
                name="product_id"
                item-value="id"
                item-text="name"
                label="Select a product"
                outlined
              />
              <!-- Qty -->
              <v-text-field v-model="transaction.qty" :type="'text'" label="Qty" outlined dense></v-text-field>

              <!-- Status -->
              <v-select :items="status" v-model="transaction.status" name="status" label="Select a status" outlined />
            </v-col>

            <v-col cols="12" sm="4" md="6" class="d-none d-sm-flex justify-center position-relative">
              <v-img
                contain
                max-width="170"
                :src="require('@/assets/images/3d-characters/pose-m-1.png')"
                class="security-character"
              ></v-img>
            </v-col>
          </v-row>
        </v-card-text>
      </div>

      <div class="pa-3">
        <!-- action buttons -->
        <v-card-text>
          <v-btn color="primary" type="submit" class="me-3 mt-3"> Save changes </v-btn>
          <v-btn color="secondary" outlined class="mt-3"> Cancel </v-btn>
        </v-card-text>
      </div>
    </v-form>
  </v-card>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import { mdiKeyOutline, mdiLockOpenOutline, mdiEyeOffOutline, mdiEyeOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'
import axios from 'axios'

export default {
  data() {
    return {
      products: [],
      status: ['Belum', 'Dibayar', 'Pending'],
      transaction: {
        nama: '',
        product_id: '',
        qty: '',
        status: '',
      },
    }
  },
  mounted() {
    this.getProducts()
  },
  methods: {
    async getProducts() {
      await axios
        .get(`/api/get-all-products`)
        .then(response => {
          this.products = response.data
        })
        .catch(error => {
          console.log(error)
          this.products = []
        })
    },
    async create() {
      await axios
        .post('/api/transactions', this.transaction)
        .then(response => {
          this.$router.push({ name: 'pages-transactions' })
        })
        .catch(error => {
          console.log(error)
        })
    },
  },
  setup() {
    return {
      icons: {
        mdiKeyOutline,
        mdiLockOpenOutline,
        mdiEyeOffOutline,
        mdiEyeOutline,
      },
    }
  },
}
</script>

<style lang="scss" scoped>
.two-factor-auth {
  max-width: 25rem;
}
.security-character {
  position: absolute;
  bottom: -0.5rem;
}
</style>
