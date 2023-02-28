<template>
  <v-card flat class="mt-5">
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
              {{ blog.category }}
            </td>
            <td>
              {{ blog.content }}
            </td>
            <td>
              <router-link :to="{ name: 'blogEdit', params: { id: blog.id } }" class="btn btn-success"
                ><v-btn color="primary" class="me-3"> Edit </v-btn></router-link
              >
              <v-btn color="danger" outlined @click="deleteBlog(blog.id)" class="btn btn-danger">Delete</v-btn>
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
  name: 'blogs',
  data() {
    return {
      blogs: [],
    }
  },
  mounted() {
    this.getBlogs()
  },
  methods: {
    async getBlogs() {
      await axios
        .get('/api/blogs')
        .then(response => {
          this.blogs = response.data
        })
        .catch(error => {
          console.log(error)
          this.blogs = []
        })
    },
    deleteBlog(id) {
      if (confirm('Are you sure to delete this blog ?')) {
        axios
          .delete(`/api/blogs/${id}`)
          .then(response => {
            this.getBlogs()
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

    const blogs = [
      {
        title: 'User 1',
        category: 'Bebas',
        content: 'Lorem ipsum dolor sit ',
      },
      {
        title: 'User 2',
        category: 'Bebas',
        content: 'Lorem ipsum dolor sit ',
      },
      {
        title: 'User 3',
        category: 'Bebas',
        content: 'Lorem ipsum dolor sit ',
      },
      {
        title: 'User 4',
        category: 'Bebas',
        content: 'Lorem ipsum dolor sit ',
      },
      {
        title: 'User 5',
        category: 'Bebas',
        content: 'Lorem ipsum dolor sit ',
      },
    ]

    const indexDataLocale = ref(JSON.parse(JSON.stringify(props.indexData)))

    const resetForm = () => {
      indexDataLocale.value = JSON.parse(JSON.stringify(props.indexData))
    }

    return {
      status,
      indexDataLocale,
      blogs,
      resetForm,
      icons: {
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
