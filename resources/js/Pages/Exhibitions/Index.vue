<template>
    <head title="Exhibitions index" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Exhibitions</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/exhibitions/create"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                    New Exhibition
                    </Link>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Project ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="exhibition in exhibitions.data" :key="exhibition.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ exhibition.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ exhibition.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ exhibition.project.name }}
                                </td>

                                <td class="px-6 py-4">
                                    <img :src="exhibition.image" class="w-12 h-12 rounded-full" />
                                </td>
                                <td class="px-6 py-4">
                                    <Link :href="route('exhibitions.edit', exhibition.id)"
                                        class="font-medium text-blue-500 hover:text-blue-500 mr-2">
                                    Edit
                                    </Link>

                                    <Link :href="route('exhibitions.destroy', exhibition.id)" method="delete" as="button"
                                        type="button" class="font-medium text-red-500 hover:text-red-500 mr-2">
                                    Delete
                                    </Link>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    exhibitions: Object
})

</script>
