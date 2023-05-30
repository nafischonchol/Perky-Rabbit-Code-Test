<template>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Product List</h2>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Create New</a>
    </div>
    <p class="text-white-600 mb-4">Here is a list of available products.</p>

    <div class="bg-white p-6 rounded-md">
        <h3 class="text-lg font-bold mb-4">Product Table</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Product Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Stock</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Product 1</td>
                    <td class="px-6 py-4 whitespace-nowrap">$10.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">50</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Product 2</td>
                    <td class="px-6 py-4 whitespace-nowrap">$19.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">25</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Product 3</td>
                    <td class="px-6 py-4 whitespace-nowrap">$15.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">10</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</template>
