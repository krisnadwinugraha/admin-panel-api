<template>
  <v-card flat class="mt-5">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in desserts" :key="item.name">
            <td>{{ item.name }}</td>
            <td>
              <v-btn color="danger" outlined class="me-3"> Print PDF </v-btn>
              <v-btn color="secondary" class="me-3"> Excel </v-btn>
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
      },
      {
        name: 'User 2',
      },
      {
        name: 'User 3',
      },
      {
        name: 'User 4',
      },
      {
        name: 'User 5',
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
