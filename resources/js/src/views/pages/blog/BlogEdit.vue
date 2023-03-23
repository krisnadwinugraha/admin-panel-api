<template>
  <v-card flat class="mt-5">
    <v-form @submit.prevent="update">
      <div class="px-3">
        <v-card-text class="pt-5">
          <v-row>
            <v-col cols="12" sm="8" md="6">
              <h1 class="mb-5">Edit Blog</h1>
              <!-- Title -->
              <v-text-field v-model="blog.title" :type="'text'" label="Title" outlined dense></v-text-field>

              <!-- Category -->
              <v-select
                :items="categories"
                v-model="blog.category_id"
                name="category_id"
                item-value="id"
                item-text="name"
                label="Select a category"
                outlined
                dense
              />

              <!-- Content -->
              <v-text-field v-model="blog.content" :type="'text'" label="Content" outlined dense></v-text-field>
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
          <v-btn color="secondary" @click.prevent="cancel" outlined class="mt-3"> Cancel </v-btn>
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
      blog: {
        categories: [],
        title: '',
        category_id: '',
        content: '',
      },
    }
  },
  mounted() {
    this.getCategories()
    this.showBlog()
  },
  methods: {
    async getCategories() {
      await axios
        .get(`/api/get-all-categories`)
        .then(response => {
          this.categories = response.data
        })
        .catch(error => {
          console.log(error)
          this.categories = []
        })
    },
    async showBlog() {
      await axios
        .get(`/api/blogs/${this.$route.params.id}`)
        .then(response => {
          const { title, category_id, content } = response.data
          this.blog.title = title
          this.blog.category_id = category_id
          this.blog.content = content
        })
        .catch(error => {
          console.log(error)
        })
    },
    async update() {
      await axios
        .patch(`/api/blogs/${this.$route.params.id}`, this.blog)
        .then(response => {
          this.$router.push({ name: 'pages-blogs' })
        })
        .catch(error => {
          console.log(error)
        })
    },
    cancel() {
      this.$router.push({ name: 'pages-blogs' })
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
