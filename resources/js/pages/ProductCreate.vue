<template>
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Products</h2>
            <Link href="/admin/products"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">
            Product List</Link>
        </div>

        <div class="bg-white p-6 rounded-md">
            <h3 class="text-lg font-bold mb-4">Create Product</h3>
            <form class="max-w-md mx-auto" method="POST" @submit.prevent = "submit">
                <div class="grid grid-cols-6 gap-2">
                    <div class="col-span-5">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input v-model="form.name" @input="handleInput" id="name" name="name" type="text"
                                placeholder="Enter product name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                        <small class="text-red-500" v-if="form.errors.name">{{ form.errors.name }}</small>
                    </div>
                    <div class="col-span-5">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2">
                            <input v-model="form.price" @input="handleInput" id="price" name="price" type="number"
                                placeholder="Enter product price"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                        <small class="text-red-500" v-if="form.errors.price">{{ form.errors.price }}</small>
                    </div>
                    <div class="col-span-5">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <div class="mt-2">
                            <select  v-model="form.category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="category_id">
                                <option value="">Select Category</option>
                                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                            </select>
                            <small class="text-red-500" v-if="form.errors.category_id">{{ form.errors.category_id }}</small>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
defineProps(['categories']);
const form = useForm({
    name: '',
    price: '',
    category_id: '',
})

function submit()
{
    form.post('/admin/products',
        {
            preserveScroll: true
        });
}

function handleInput(e) {
    form.clearErrors(e.target.name);
}

</script>
