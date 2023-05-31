<template>
    <Head title="Stock History"></Head>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Stock History</h2>
        <Link href="/admin/stocks/create"
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Add
        Stock</Link>
    </div>
    <p class="text-white-600 mb-4">Here is a transection history of available products.</p>

    <div class="bg-white p-6 rounded-md">
        <h3 class="text-lg font-bold mb-4">Stock Table</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Product Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Quantity</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Transection Type</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr v-for="item in history" :key="item.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.productName }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.categoryName }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.qty }}</td>
                    <td class="px-6 py-4 whitespace-nowrap"
                        :class="{ 'text-red-500': item.sign === -1, 'text-green-500': item.sign === 1 }">
                        {{ item.sign === 1 ? 'IN' : 'Out' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
defineProps(['history']);
</script>
