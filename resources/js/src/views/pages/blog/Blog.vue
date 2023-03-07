<template>
  <v-card id="blog-card">
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
        <blog-index></blog-index>
      </v-tab-item>

      <v-tab-item>
        <blog-create></blog-create>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import { mdiAccountOutline, mdiLockOpenOutline, mdiInformationOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

// demos
import BlogIndex from './BlogIndex.vue'
import BlogCreate from './BlogCreate.vue'

export default {
  components: {
    BlogIndex,
    BlogCreate,
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
