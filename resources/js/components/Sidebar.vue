<template>
    <div class="bg-gray-800 text-white w-48 p-4">
      <ul class="space-y-2">
        <li>
          <a
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'dashboard' }"
            @click="setActiveMenuItem('dashboard')"
          >
            <i class="fas fa-users"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'users' }"
            @click="setActiveMenuItem('users')"
          >
            <i class="fas fa-shopping-cart"></i>
            <span>Users</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'products' }"
            @click="setActiveMenuItem('products')"
          >
            <i class="fas fa-shopping-bag"></i>
            <span>Products</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="flex items-center space-x-2 text-gray-300 hover:text-white hover:bg-gray-700"
            :class="{ active: activeMenuItem === 'reports' }"
            @click="setActiveMenuItem('reports')"
          >
            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>
          </a>
        </li>
      </ul>
    </div>
  </template>


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

