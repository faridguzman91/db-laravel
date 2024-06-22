<template>
    <head title="Exhibitions index" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Exhibitions
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="m-2 flex justify-end p-2">
                    <Link
                        href="/exhibitions/create"
                        class="rounded-md bg-indigo-500 px-4 py-2 text-white hover:bg-indigo-700"
                    >
                        New Exhibition
                    </Link>
                </div>
                <div class="relative overflow-x-auto">
                    <table
                        class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400"
                    >
                        <thead
                            class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Project ID
                                </th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Project</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="exhibition in exhibitions.data"
                                :key="exhibition.id"
                                class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
                            >
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    {{ exhibition.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ exhibition.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ exhibition.project.name }}
                                </td>

                                <td class="px-6 py-4">
                                    <img
                                        :src="exhibition.image"
                                        class="h-12 w-12 rounded-full"
                                    />
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route(
                                                'exhibitions.edit',
                                                exhibition.id,
                                            )
                                        "
                                        class="mr-2 font-medium text-blue-500 hover:text-blue-500"
                                    >
                                        Edit
                                    </Link>

                                    <Link
                                        :href="
                                            route(
                                                'exhibitions.destroy',
                                                exhibition.id,
                                            )
                                        "
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="mr-2 font-medium text-red-500 hover:text-red-500"
                                    >
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    exhibitions: Object,
});
</script>
