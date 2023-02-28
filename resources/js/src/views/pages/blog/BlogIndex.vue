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
          <tr v-for="item in desserts" :key="item.title">
            <td>{{ item.title }}</td>
            <td>
              {{ item.category }}
            </td>
            <td>
              {{ item.content }}
            </td>
            <td>
              <v-btn color="primary" class="me-3"> Edit </v-btn>
              <v-btn color="danger" outlined class="btn btn-sm"> Delete </v-btn>
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

export default {
  props: {
    indexData: {
      type: Object,
      default: () => {},
    },
  },
  setup(props) {
    const status = ['Active', 'Inactive', 'Pending', 'Closed']

    const desserts = [
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
      desserts,
      resetForm,
      icons: {
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
