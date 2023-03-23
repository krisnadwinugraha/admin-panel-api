<template>
  <v-card flat class="mt-5">
    <v-form @submit.prevent="create">
      <div class="px-3">
        <v-card-text class="pt-5">
          <v-row>
            <v-col cols="12" sm="8" md="6">
              <h1 class="mb-5">Create User</h1>
              <!-- Name -->
              <v-text-field v-model="user.name" :type="'text'" label="Name" outlined dense></v-text-field>

              <!-- Email -->
              <v-text-field
                v-model="user.email"
                :type="'email'"
                label="Email"
                outlined
                dense
                persistent-hint
              ></v-text-field>

              <!-- Password -->
              <v-text-field
                v-model="user.password"
                :type="isPasswordVisible ? 'text' : 'password'"
                :append-icon="isPasswordVisible ? icons.mdiEyeOffOutline : icons.mdiEyeOutline"
                label="Password"
                outlined
                dense
                class="mt-3"
                @click:append="isPasswordVisible = !isPasswordVisible"
              ></v-text-field>
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
  name: 'add-user',
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
      },
    }
  },
  methods: {
    async create() {
      await axios
        .post('/api/users', this.user)
        .then(response => {
          this.$router.push({ name: 'pages-users' })
        })
        .catch(error => {
          console.log(error)
        })
    },
  },
  setup() {
    const isPasswordVisible = ref(false)

    return {
      isPasswordVisible,
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
