<template lang="">
    <div class="relative group/list">
    <Link
        :href="exhibition.project_url"
        class="relative group/list"
    >
<div class="hidden absolute botton-0 right-4 z-10 w-72 opacity-0 pointer-events-none group-hover/list:opacity-100 lg:block aspect-h">
            <img
                class="col-span-6 text-right lg:col-span-1 lg:text-left"
                :src="exhibition.image"
                :alt="exhibition.image"
            />
        </div>

    <div class="grid grid-cols-12 gap-1 lg:gap-5 px-4 lg:px-5 border-t border-black py-[11px] hover:bg-zinc-100">
                <p class="col-span-12 lg:col-span-7">
            {{ exhibition.name }}
        </p>

        <div class="col-span-6 lg:col-span-2 text-grigio lg:text-black text-container">
            {{ exhibition.id}}
        </div>
        <p class="hidden col-span-2 lg:block">
            {{ exhibition.name }}
        </p>
    </div>
    </Link>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

defineProps({
    exhibition: Object,
});
</script>
