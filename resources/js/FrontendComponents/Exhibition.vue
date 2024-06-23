<template lang="">
    <Link
        :href="exhibition.project_url"
        class="grid grid-cols-12 gap-1 lg:gap-5 px-4 lg:px-5 border-t border-black py-[11px] hover:bg-zinc-100 items-center"
    >
        <div class="hidden absolute botton-0 right-4 z-10 w-72 opacity-0 pointer-events-none group-hover/list:opacity-100 lg:block aspect-h">
            <img
                class="h-5 rounded-2xl"
                :src="exhibition.image"
                :alt="exhibition.image"
            />
        </div>
        <span class="col-span-12 lg:col-span-7">
            {{ exhibition.name }}
        </span>

        <div class="col-span-6 lg:col-span-2 text-grigio lg:text-black text-container"></div>
        <h3 class="mb-3 text-2xl font-semibold group-hover:text-accent">
            {{ exhibition.name }}
        </h3>
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

defineProps({
    exhibition: Object,
});
</script>
