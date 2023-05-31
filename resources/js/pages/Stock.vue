<template>
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Stock</h2>
            <Link href="/admin/stocks"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Stock
                History</Link>
        </div>

        <div class="bg-white p-6 rounded-md">
            <div v-if="successMessage" class="bg-green-100 text-green-700 px-4 py-2 mt-4 rounded">
                {{ successMessage }}
            </div>
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
                                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                            </select>
                        </td>
                        <td class="py-4 whitespace-nowrap">
                            <select v-model="row.productName" class="form-control select-input"
                                @change="selectProduct(index)">
                                <option value="">Select Product</option>
                                <option v-for="product in row.products" :value="product" :key="product.id">{{ product.name
                                }}</option>
                            </select>
                            <p v-if="row.selectedProductError" class="text-red-500">Product already selected in another row.
                            </p>
                        </td>
                        <td class="py-4 whitespace-nowrap">
                            <input type="number" v-model="row.quantity" />
                        </td>
                        <td class="py-4 whitespace-nowrap">
                            <input type="number" v-model="row.currentQuantity" readonly />
                        </td>
                        <td class="py-4 whitespace-nowrap">
                            <button @click="removeRow(index)" v-if="index > 0"
                                class="bg-red-500 text-white font-semibold px-4 py-2 rounded transition duration-300">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="add-new-button">
                <button @click="addRow"
                    class="bg-green-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">
                    Add New
                </button>
            </div>
            <button @click="submitForm"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">
                Submit
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

defineProps(['categories']);
const rows = ref([
    {
        productName: '',
        quantity: 0,
        currentQuantity: 0,
        category: '',
        products: [],
    },
]);

const productsByCategory = reactive({});
const successMessage = ref('');

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

const updateProductOptions = async (row) => {
    const category = row.category;

    if (category) {
        try {
            const response = await fetch(`/admin/products-by-category/${category}`);
            const data = await response.json();
            if (data.result == 'Success') {

                const products = data.data.map((item) => ({
                    id: item.id,
                    name: item.name,
                }));

                productsByCategory[category] = products;
                row.products = products;
                row.productName = ''; // Reset the selected product when the category changes
            } else {
                console.error('Error fetching product data:', data.mgs);
            }
        }
        catch (error) {
            console.log('Error fetching product data');
        }
    }
    else {
        // Reset the product options if no category is selected
        row.products = [];
        row.productName = '';
    }
};
const selectProduct = (index) => {
    const selectedProduct = rows.value[index].productName;

    const isProductSelected = rows.value.some((r, i) => {
        return i !== index && r.productName && r.productName.id === selectedProduct.id;
    });

    if (isProductSelected) {
        rows.value[index].productName = '';
        rows.value[index].selectedProductError = true;
    } else {
        rows.value[index].selectedProductError = false;
        fetchCurrentQuantity(rows.value[index]);
    }
};

const fetchCurrentQuantity = async (row) => {
    const productId = row.productName.id;
    if (productId) {
        try {
            const response = await fetch(`/admin/current-stocks/${productId}`);
            const result = await response.json();
            if (result.result === 'Success') {
                row.currentQuantity = result.data.quantity;
            } else {
                row.currentQuantity = 0;
            }
        } catch (error) {
            console.error('Error fetching current quantity:', error);
        }
    }
};

const submitForm = () => {
    const formData = rows.value.map((row) => ({
        productId: row.productName.id,
        quantity: row.quantity,
        currentQuantity: row.currentQuantity,
        category: row.category,
    }));

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/admin/stocks', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken,
        },
        body: JSON.stringify(formData),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            resetForm();
            successMessage.value = 'Stock created successfully.';
        })
        .catch((error) => {
            console.error('Error submitting form:', error);
        });
};

const resetForm = () => {
    rows.value = [
        {
            productName: '',
            quantity: 0,
            currentQuantity: 0,
            category: '',
            products: [],
        },
    ];
};


</script>


<style>
.add-new-button {
    text-align: right;
    margin-top: 10px;
}

.select-input {
    width: 200px;
    /* Adjust the width as needed */
}
</style>
