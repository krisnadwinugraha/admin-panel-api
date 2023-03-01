<template>
  <v-card flat class="mt-5">
    <v-form @submit.prevent="update">
      <div class="px-3">
        <v-card-text class="pt-5">
          <v-row>
            <v-col cols="12" sm="8" md="6">
              <h2 class="mb-5">Edit Product</h2>
              <!-- Name -->
              <v-text-field v-model="product.name" :type="'text'" label="name" outlined dense></v-text-field>

              <!-- Deskripsi -->
              <v-text-field v-model="product.deskripsi" :type="'text'" label="deskripsi" outlined dense></v-text-field>

              <!-- Harga -->
              <v-text-field v-model="product.harga" :type="'text'" label="harga" outlined dense></v-text-field>
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
      product: {
        name: '',
        deskripsi: '',
        harga: '',
      },
    }
  },
  mounted() {
    this.showProduct()
  },
  methods: {
    async showProduct() {
      await axios
        .get(`/api/products/${this.$route.params.id}`)
        .then(response => {
          const { name, deskripsi, harga } = response.data
          this.product.name = name
          this.product.deskripsi = deskripsi
          this.product.harga = harga
        })
        .catch(error => {
          console.log(error)
        })
    },
    async update() {
      await axios
        .patch(`/api/products/${this.$route.params.id}`, this.product)
        .then(response => {
          this.$router.push({ name: 'pages-products' })
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
