import Vue from 'vue'
import Auth from '../Auth'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: 'dashboard',
  },
  {
    path: '/home',
    name: 'home',
    component: () => import('@/views/frontend/Index.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('@/views/dashboard/Dashboard.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/typography',
    name: 'typography',
    component: () => import('@/views/typography/Typography.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/icons',
    name: 'icons',
    component: () => import('@/views/icons/Icons.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/cards',
    name: 'cards',
    component: () => import('@/views/cards/Card.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/simple-table',
    name: 'simple-table',
    component: () => import('@/views/simple-table/SimpleTable.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/form-layouts',
    name: 'form-layouts',
    component: () => import('@/views/form-layouts/FormLayouts.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/account-settings',
    name: 'pages-account-settings',
    component: () => import('@/views/pages/account-settings/AccountSettings.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/users',
    name: 'pages-users',
    component: () => import('@/views/pages/users/User.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/users/:id/edit',
    name: 'user-edit',
    component: () => import('@/views/pages/users/UserEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/blogs',
    name: 'pages-blogs',
    component: () => import('@/views/pages/blog/Blog.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/blogs/:id/edit',
    name: 'blog-edit',
    component: () => import('@/views/pages/blog/BlogEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/categories',
    name: 'pages-categories',
    component: () => import('@/views/pages/category/Category.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/categories/:id/edit',
    name: 'category-edit',
    component: () => import('@/views/pages/category/CategoryEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/products',
    name: 'pages-products',
    component: () => import('@/views/pages/product/Product.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/products-create',
    name: 'pages-products-create',
    component: () => import('@/views/pages/product/ProductCreate.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/products/:id/edit',
    name: 'product-edit',
    component: () => import('@/views/pages/product/ProductEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/reports',
    name: 'pages-reports',
    component: () => import('@/views/pages/report/Report.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/roles',
    name: 'pages-roles',
    component: () => import('@/views/pages/role/Role.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/roles/:id/edit',
    name: 'role-edit',
    component: () => import('@/views/pages/role/RoleEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/transactions',
    name: 'pages-transactions',
    component: () => import('@/views/pages/transaction/Transaction.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/transactions-create',
    name: 'pages-transactions-create',
    component: () => import('@/views/pages/transaction/TransactionCreate.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/pages/transactions/:id/edit',
    name: 'transaction-edit',
    component: () => import('@/views/pages/transaction/TransactionEdit.vue'),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: '/login',
    name: 'pages-login',
    component: () => import('@/views/pages/Login.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/register',
    name: 'pages-register',
    component: () => import('@/views/pages/Register.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/error-404',
    name: 'error-404',
    component: () => import('@/views/Error.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '*',
    redirect: 'error-404',
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (Auth.check()) {
      next()
      return
    } else {
      router.push('/login')
    }
  } else {
    next()
  }
})

export default router
