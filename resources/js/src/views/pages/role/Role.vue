<template>
  <v-card id="role-card">
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
        <role-index :index-data="reportData.index"></role-index>
      </v-tab-item>

      <v-tab-item>
        <role-create :create-data="reportData.create"></role-create>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import { mdiAccountOutline, mdiLockOpenOutline, mdiInformationOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

// demos
import RoleIndex from './RoleIndex.vue'
import RoleCreate from './RoleCreate.vue'

export default {
  components: {
    RoleIndex,
    RoleCreate,
  },
  setup() {
    const tab = ref('')

    // tabs
    const tabs = [
      { title: 'Index', icon: mdiAccountOutline },
      { title: 'Create', icon: mdiLockOpenOutline },
    ]

    // account settings data
    const reportData = {
      index: {
        avatarImg: require('@/assets/images/avatars/1.png').default,
        reportname: 'johnDoe',
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
      reportData,
      icons: {
        mdiAccountOutline,
        mdiLockOpenOutline,
      },
    }
  },
}
</script>
