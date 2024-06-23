<template lang="">
    <section class="border border-gray-400 py-12">
        <div class="container mx-auto">
            <div
                class="grid grid-cols-1 gap-6 px-4 lg:grid-cols-3 lg:gap-5 lg:px-5"
            >
                <div
                    class="flex items-center justify-center"
                    v-for="project in projects.data"
                    :key="project.id"
                >
                    <a href="#" class="aspect-h group relative col-span-1">
                        <div
                            class="absolute z-10 hidden h-full w-full space-y-2.5 rounded-lg p-5 text-white opacity-0 transition-opacity group-hover:bg-black/60 group-hover:opacity-100 lg:block"
                        >
                            <h3 class="text-3xl">{{ project.name }}</h3>
                        </div>
                        <img
                            :src="project.image"
                            :alt="project.name"
                            class="lg:h-72"
                        />
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
defineProps({
    projects: Object,
});
</script>
