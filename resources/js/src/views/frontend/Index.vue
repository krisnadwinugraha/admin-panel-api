<template>
  <div>
    <v-card>
      <v-img height="600px" :src="require('@/assets/images/hero/hero1.jpg')">
        <v-app-bar flat color="rgba(0, 0, 0, 0.3)">
          <v-toolbar-title class="text-h6 white--text pl-5"> Title</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">
            {{ link }}
          </v-btn>
        </v-app-bar>

        <v-container fill-height fluid>
          <v-row align="center" justify="center">
            <v-toolbar-title class="text-h3 white--text pl-5"> WE, MAKE BEST QUALITY PRODUCT</v-toolbar-title>
          </v-row>
        </v-container>
      </v-img>

      <v-card-text class="mt-8">
        <h1 class="font-weight-bold ml-8 my-2">Our Product</h1>
        <v-sheet class="mx-auto" elevation="8">
          <v-slide-group v-model="model" class="pa-4" center-active show-arrows>
            <v-slide-group-item v-for="product in products" :key="product.name">
              <v-card class="mx-4" max-width="344">
                <v-img :src="'/images/avatars/' + product.image" height="200px"></v-img>

                <v-card-title> {{ product.name }} </v-card-title>

                <v-card-subtitle> {{ product.description }} </v-card-subtitle>
                <v-card-subtitle> {{ product.price }} </v-card-subtitle>
              </v-card>
            </v-slide-group-item>
          </v-slide-group>
        </v-sheet>
        <tr></tr>
      </v-card-text>

      <v-card-text class="mt-8">
        <h1 class="font-weight-bold ml-8 my-2">Our Blog</h1>
        <v-sheet class="mx-auto" elevation="8">
          <v-slide-group v-model="model" class="pa-4" center-active show-arrows>
            <v-slide-group-item v-for="blog in blogs" :key="blog.title">
              <v-card class="mx-4" max-width="344">
                <v-card-title> {{ blog.title }} </v-card-title>
                <v-card-subtitle> {{ blog.category_id.name }} </v-card-subtitle>
                <v-card-subtitle> {{ blog.content }} </v-card-subtitle>
              </v-card>
            </v-slide-group-item>
          </v-slide-group>
        </v-sheet>
        <tr></tr>
      </v-card-text>

      <v-footer class="mt-8" color="primary lighten-1" padless>
        <v-row justify="center" no-gutters>
          <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">
            {{ link }}
          </v-btn>
          <v-col class="primary lighten-2 py-4 text-center white--text" cols="12">
            {{ new Date().getFullYear() }} — <strong>Admin Panel</strong>
          </v-col>
        </v-row>
      </v-footer>
    </v-card>
  </div>
</template>

<script>
import { mdiAlertOutline, mdiMagnify, mdiCloudUploadOutline } from '@mdi/js'
import axios from 'axios'

export default {
  name: 'home',
  data() {
    return {
      links: ['Home', 'About Us', 'Team', 'Services', 'Blog', 'Contact Us'],
      products: [],
      blogs: [],
    }
  },
  mounted() {
    this.getProducts()
    this.getBlogs()
  },
  methods: {
    async getProducts() {
      await axios
        .get(`/api/products`)
        .then(response => {
          this.products = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.products = []
        })
    },
    async getBlogs() {
      await axios
        .get(`/api/blogs`)
        .then(response => {
          this.blogs = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.blogs = []
        })
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
