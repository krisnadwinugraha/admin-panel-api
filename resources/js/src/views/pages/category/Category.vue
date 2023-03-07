<template>
  <v-card id="category-card">
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
        <category-index></category-index>
      </v-tab-item>

      <v-tab-item>
        <category-create></category-create>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import { mdiAccountOutline, mdiLockOpenOutline, mdiInformationOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

// demos
import CategoryIndex from './CategoryIndex.vue'
import CategoryCreate from './CategoryCreate.vue'

export default {
  components: {
    CategoryIndex,
    CategoryCreate,
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
