<template>
    <div class="bg-gray-800 text-white w-48 p-4">
      <ul class="space-y-2">
        <li>
          <Link
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'dashboard' }"
            @click="setActiveMenuItem('dashboard')"
          >
          <i class="fas fa-home"></i>
            <span>Dashboard</span>
          </Link>
        </li>
        <li>
          <Link
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'users' }"
            @click="setActiveMenuItem('users')"
          >
          <i class="fas fa-user"></i>
            <span>Users</span>
          </Link>
        </li>
        <li>
        <Link
          href="/admin/products"
          class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
          :class="{ active: activeMenuItem === 'products' }"
          @click="setActiveMenuItem('products')"
        >
          <i class="fas fa-shopping-bag"></i>
          <span>Products</span>
        </Link>
        <Link
          href="/admin/stocks"
          class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
          :class="{ active: activeMenuItem === 'stocks' }"
          @click="setActiveMenuItem('stocks')"
        >
        <i class="fas fa-cubes"></i>
          <span>Stocks</span>
        </Link>
        </li>

      </ul>
    </div>
  </template>

<script setup>
   import { Link } from '@inertiajs/vue3'
</script>

<script>

  export default {
    props: {
      activeMenuItem: {
        type: String,
        default: 'dashboard',
      },
    },
    methods: {
      setActiveMenuItem(item) {
        this.$emit('update:activeMenuItem', item);
      },
    },
  };
</script>

