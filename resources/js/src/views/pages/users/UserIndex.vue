<template>
  <v-card flat class="mt-5">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Email</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in desserts" :key="item.name">
            <td>{{ item.name }}</td>
            <td>
              {{ item.email }}
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
        name: 'User 1',
        email: 'user1@gmail.com',
      },
      {
        name: 'User 2',
        email: 'user2@gmail.com',
      },
      {
        name: 'User 3',
        email: 'user3@gmail.com',
      },
      {
        name: 'User 4',
        email: 'user4@gmail.com',
      },
      {
        name: 'User 5',
        email: 'user5@gmail.com',
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
