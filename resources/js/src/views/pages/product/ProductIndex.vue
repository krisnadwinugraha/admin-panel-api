<template>
  <v-card flat class="mt-5">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Deskripsi</th>
            <th class="text-uppercase">Harga</th>
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
              {{ item.harga }}
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
        name: 'Product 1',
        deskripsi: 'product',
        harga: '100000',
      },
      {
        name: 'Product 2',
        deskripsi: 'product',
        harga: '100000',
      },
      {
        name: 'Product 3',
        deskripsi: 'product',
        harga: '100000',
      },
      {
        name: 'Product 4',
        deskripsi: 'product',
        harga: '100000',
      },
      {
        name: 'Product 5',
        deskripsi: 'product',
        harga: '100000',
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
