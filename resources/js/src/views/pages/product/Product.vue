<template>
  <v-card id="product-card">
    <!-- tabs -->
    <v-tabs v-model="tab" show-arrows>
      <v-tab v-for="tab in tabs" :key="tab.icon">
        <v-icon size="20" class="me-3">
          {{ tab.icon }}
        </v-icon>
        <span>{{ tab.title }}</span>
      </v-tab>
    </v-tabs>

    <!-- tabs item -->
    <v-tabs-items v-model="tab">
      <v-tab-item>
        <product-index></product-index>
      </v-tab-item>

      <v-tab-item>
        <product-create></product-create>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import { mdiAccountOutline, mdiLockOpenOutline, mdiInformationOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

// demos
import ProductIndex from './ProductIndex.vue'
import ProductCreate from './ProductCreate.vue'

export default {
  components: {
    ProductIndex,
    ProductCreate,
  },
  setup() {
    const tab = ref('')

    // tabs
    const tabs = [
      { title: 'Index', icon: mdiAccountOutline },
      { title: 'Create', icon: mdiLockOpenOutline },
    ]

    return {
      tab,
      tabs,
      icons: {
        mdiAccountOutline,
        mdiLockOpenOutline,
      },
    }
  },
}
</script>
