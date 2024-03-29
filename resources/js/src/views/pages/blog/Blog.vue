<template>
  <v-card id="report-card" class="py-5 px-5">
    <v-card flat class="my-5 mx-5">
      <h1>Blogs</h1>
      <div class="d-flex align-center me-6 my-5">
        <router-link :to="{ name: 'pages-blogs-create' }" class="btn btn-success"
          ><v-btn color="primary" class="me-3"> Create </v-btn></router-link
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
              <th class="text-uppercase">Title</th>
              <th class="text-uppercase">Category</th>
              <th class="text-uppercase">Content</th>
              <th class="text-uppercase">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="blog in blogs" :key="blog.title">
              <td>{{ blog.title }}</td>
              <td>
                {{ blog.category_id.name }}
              </td>
              <td v-if="blog.content.length < 45">{{ blog.content }}</td>
              <td v-else>{{ blog.content.substring(0, 45) + '..' }}</td>
              <td>
                <router-link :to="{ name: 'blog-edit', params: { id: blog.id } }" class="btn btn-success"
                  ><v-btn color="primary" class="me-3"> Edit </v-btn></router-link
                >
                <v-btn color="danger" outlined @click="deleteBlog(blog.id)" class="btn btn-danger">Delete</v-btn>
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
  </v-card>
</template>

<script>
import { mdiAlertOutline, mdiMagnify, mdiCloudUploadOutline } from '@mdi/js'
import axios from 'axios'

export default {
  name: 'blogs',
  data() {
    return {
      blogs: [],
      categories: [],
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
    this.getBlogs()
    this.getCategories()
  },
  methods: {
    async getBlogs() {
      await axios
        .get(`/api/blogs?page=${this.currentPage}`)
        .then(response => {
          this.blogs = response.data.data
          this.lastPage = response.data.last_page
        })
        .catch(error => {
          console.log(error)
          this.blogs = []
        })
    },
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
    deleteBlog(id) {
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
            .delete(`/api/blogs/${id}`)
            .then(response => {
              this.getBlogs()
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
        .get('/blog-search', { params: { keywords: this.keywords } })
        .then(response => (this.blogs = response.data.data))
        .catch(error => {})
    },
    changePage(num) {
      this.currentPage = this.currentPage + num
      this.getBlogs()
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
