import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: 'dashboard',
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('@/views/dashboard/Dashboard.vue'),
  },
  {
    path: '/typography',
    name: 'typography',
    component: () => import('@/views/typography/Typography.vue'),
  },
  {
    path: '/icons',
    name: 'icons',
    component: () => import('@/views/icons/Icons.vue'),
  },
  {
    path: '/cards',
    name: 'cards',
    component: () => import('@/views/cards/Card.vue'),
  },
  {
    path: '/simple-table',
    name: 'simple-table',
    component: () => import('@/views/simple-table/SimpleTable.vue'),
  },
  {
    path: '/form-layouts',
    name: 'form-layouts',
    component: () => import('@/views/form-layouts/FormLayouts.vue'),
  },
  {
    path: '/pages/account-settings',
    name: 'pages-account-settings',
    component: () => import('@/views/pages/account-settings/AccountSettings.vue'),
  },
  {
    path: '/pages/users',
    name: 'pages-users',
    component: () => import('@/views/pages/users/User.vue'),
  },
  {
    path: '/pages/blogs',
    name: 'pages-blogs',
    component: () => import('@/views/pages/blog/Blog.vue'),
  },
  {
    path: '/pages/blogs/:id/edit',
    name: 'blog-edit',
    component: () => import('@/views/pages/blog/BlogEdit.vue'),
  },
  {
    path: '/pages/categories',
    name: 'pages-categories',
    component: () => import('@/views/pages/category/Category.vue'),
  },
  {
    path: '/pages/categories/:id/edit',
    name: 'category-edit',
    component: () => import('@/views/pages/category/CategoryEdit.vue'),
  },
  {
    path: '/pages/products',
    name: 'pages-products',
    component: () => import('@/views/pages/product/Product.vue'),
  },
  {
    path: '/pages/products/:id/edit',
    name: 'product-edit',
    component: () => import('@/views/pages/product/ProductEdit.vue'),
  },
  {
    path: '/pages/reports',
    name: 'pages-reports',
    component: () => import('@/views/pages/report/Report.vue'),
  },
  {
    path: '/pages/roles',
    name: 'pages-roles',
    component: () => import('@/views/pages/role/Role.vue'),
  },
  {
    path: '/pages/login',
    name: 'pages-login',
    component: () => import('@/views/pages/Login.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/pages/register',
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

export default router
