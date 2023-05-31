<template>
    <div class="bg-gray-100">
        <div class="flex h-screen bg-login">
            <div class="m-auto w-96 bg-white rounded shadow-lg p-8">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Signup</h2>
                <form  action="#" method="POST" @submit.prevent = "submit">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Name">
                            Name
                        </label>
                        <input v-model="form.name" @input="handleInput"
                            class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            id="name" type="text" placeholder="Enter your name">
                            <small class="text-red-500" v-if="form.errors.name">{{ form.errors.name }}</small>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Email">
                            Email
                        </label>
                        <input v-model="form.email" @input="handleInput"
                            class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            id="email" type="text" placeholder="Enter your email">
                            <small class="text-red-500" v-if="form.errors.email">{{ form.errors.email }}</small>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input  v-model="form.password" @input="handleInput"
                            class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:border-blue-500"
                            id="password" type="password" placeholder="Enter your password">
                        <small class="text-red-500 text-xs italic" v-if="form.errors.password">{{ form.errors.password }}</small>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                         type="submit" :disabled="form.processing">
                            Signup
                        </button>
                        <Link class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/login">
                            Already have an account?
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    layout: "",
}
</script>

<script setup>
import {useForm } from "@inertiajs/vue3";
import { Link } from '@inertiajs/vue3';
const form = useForm ({
    name: '',
    email: '',
    password: ''
})

function submit()
{
    form.post('/registration',
    {
        preserveScroll: true
    });
}

function handleInput(e)
{
    form.clearErrors(e.target.name);
}

</script>
