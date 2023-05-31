<template>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Product List</h2>
        <Link href="/admin/products/create" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Create New</Link>
    </div>
    <p class="text-white-600 mb-4">Here is a list of available products.</p>

    <div class="bg-white p-6 rounded-md">
        <h3 class="text-lg font-bold mb-4">Product Table</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Product Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr v-for="item in products" :key="item.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{item.name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ item.category ? item.category.name : 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">৳ {{item.price}} </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
defineProps(['products']);
</script>
