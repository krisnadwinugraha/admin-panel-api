<template>
  <v-card flat class="mt-5">
    <v-form @submit.prevent="create">
      <div class="px-3">
        <v-card-text class="pt-5">
          <v-row>
            <v-col cols="12" sm="8" md="6">
              <h1 class="mb-5">Create Category</h1>
              <!-- Name -->
              <v-text-field v-model="category.name" :type="'text'" label="Name" outlined dense></v-text-field>

              <!-- Deskripsi -->
              <v-text-field
                v-model="category.description"
                :type="'text'"
                label="Deskripsi"
                outlined
                dense
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card-text>
      </div>

      <div class="pa-3">
        <!-- action buttons -->
        <v-card-text>
          <v-btn color="primary" type="submit" class="me-3 mt-3"> Save changes </v-btn>
        </v-card-text>
      </div>
    </v-form>
  </v-card>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import { mdiKeyOutline, mdiLockOpenOutline, mdiEyeOffOutline, mdiEyeOutline } from '@mdi/js'
import axios from 'axios'

export default {
  name: 'add-category',
  data() {
    return {
      category: {
        name: '',
        description: '',
      },
    }
  },
  methods: {
    async create() {
      await axios
        .post('/api/categories', this.category)
        .then(response => {
          this.$router.push({ name: 'pages-categories' })
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
