<template>
  <v-card flat class="mt-5">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Deskripsi</th>
            <th class="text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in desserts" :key="item.name">
            <td>{{ item.name }}</td>
            <td>
              {{ item.deskripsi }}
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
        name: 'Deskripsi 1',
        deskripsi: 'deskripsi',
      },
      {
        name: 'Deskripsi 2',
        deskripsi: 'deskripsi',
      },
      {
        name: 'Deskripsi 3',
        deskripsi: 'deskripsi',
      },
      {
        name: 'Deskripsi 4',
        deskripsi: 'deskripsi',
      },
      {
        name: 'Deskripsi 5',
        deskripsi: 'deskripsi',
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
