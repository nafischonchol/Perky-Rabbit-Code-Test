<template>
    <div>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Stock</h2>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Stock List</a>
      </div>

      <div class="bg-white p-6 rounded-md">
        <h3 class="text-lg font-bold mb-4">Stock Create</h3>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-200">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Category</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Product</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Quantity</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Current Quantity</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="(row, index) in rows" :key="index">
              <td class="py-4 whitespace-nowrap">
                <select v-model="row.category" @change="updateProductOptions(row)" class="form-control">
                  <option value="">Select Category</option>
                  <option v-for="category in categories" :value="category">{{ category }}</option>
                </select>
              </td>
              <td class="py-4 whitespace-nowrap">
                <select v-model="row.productName" class="form-control">
                  <option value="">Select Product</option>
                  <option v-for="product in row.products" :value="product">{{ product }}</option>
                </select>
              </td>
              <td class="py-4 whitespace-nowrap">
                <input type="number" v-model="row.quantity" />
              </td>
              <td class="py-4 whitespace-nowrap">
                <input type="number" v-model="row.currentQuantity" />
              </td>
              <td class="py-4 whitespace-nowrap">
                <button @click="removeRow(index)" v-if="index > 0" class="bg-red-500 text-white font-semibold px-4 py-2 rounded transition duration-300">
                  <i class="fas fa-times"></i> Remove
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="add-new-button">
          <button @click="addRow" class="bg-green-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Add New</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref, reactive } from 'vue';

  export default {
    setup() {
      const rows = ref([
        // Initial row
        {
          productName: '',
          quantity: 0,
          currentQuantity: 0,
          category: '',
          products: [],
        },
      ]);

      const categories = ['Shirt', 'T-Shirt'];
      const productsByCategory = reactive({
        Shirt: ['Product 1', 'Product 2', 'Product 3'], // Product options for Shirt category
        'T-Shirt': ['Product A', 'Product B', 'Product C'], // Product options for T-Shirt category
      });

      const addRow = () => {
        rows.value.push({
          productName: '',
          quantity: 0,
          currentQuantity: 0,
          category: '',
          products: [],
        });
      };

      const removeRow = (index) => {
        if (index > 0) {
          rows.value.splice(index, 1);
        }
      };

      const updateProductOptions = (row) => {
        const category = row.category;
        row.products = productsByCategory[category] || [];
        row.productName = ''; // Reset the selected product when the category changes
      };

      return {
        rows,
        categories,
        addRow,
        removeRow,
        updateProductOptions,
      };
    },
  };
  </script>

  <style>
  .add-new-button {
    text-align: right;
    margin-top: 10px;
  }
  </style>
