<template>
  <component :is="resolveLayout">
    <router-view></router-view>
  </component>
</template>

<script>
import { computed } from '@vue/composition-api'
import { useRouter } from '@/utils'
import LayoutBlank from '@/layouts/Blank.vue'
import LayoutContent from '@/layouts/Content.vue'
import Auth from './Auth.js'

export default {
  data() {
    return {
      loggedUser: this.auth.user,
    }
  },
  mounted() {
    console.log(this.auth.user)
  },
  methods: {
    logout() {
      this.axios
        .post('http://127.0.0.1:8000/api/auth/logout')
        .then(({ data }) => {
          Auth.logout() //reset local storage
          this.$router.push('/login')
        })
        .catch(error => {
          console.log(error)
        })
    },
  },
  components: {
    LayoutBlank,
    LayoutContent,
  },
  setup() {
    const { route } = useRouter()

    const resolveLayout = computed(() => {
      // Handles initial route
      if (route.value.name === null) return null

      if (route.value.meta.layout === 'blank') return 'layout-blank'

      return 'layout-content'
    })

    return {
      resolveLayout,
    }
  },
}
</script>
