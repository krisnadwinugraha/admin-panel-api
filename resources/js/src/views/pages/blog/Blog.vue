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
        <blog-index :index-data="blogData.index"></blog-index>
      </v-tab-item>

      <v-tab-item>
        <blog-create :create-data="blogData.create"></blog-create>
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

    // account settings data
    const blogData = {
      index: {
        avatarImg: require('@/assets/images/avatars/1.png').default,
        blogname: 'johnDoe',
        name: 'john Doe',
        email: 'johnDoe@example.com',
        role: 'Admin',
        status: 'Active',
        company: 'Google.inc',
      },
      create: {
        bio: 'The name’s John Deo. I am a tireless seeker of knowledge, occasional purveyor of wisdom and also, coincidentally, a graphic designer. Algolia helps businesses across industries quickly create relevant 😎, scaLabel 😀, and lightning 😍 fast search and discovery experiences.',
        birthday: 'February 22, 1995',
        phone: '954-006-0844',
        website: 'https://themeselection.com/',
        country: 'USA',
        languages: ['English', 'Spanish'],
        gender: 'male',
      },
    }

    return {
      tab,
      tabs,
      blogData,
      icons: {
        mdiAccountOutline,
        mdiLockOpenOutline,
      },
    }
  },
}
</script>
