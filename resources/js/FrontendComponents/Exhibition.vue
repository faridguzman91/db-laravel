<template lang="">
    <Link
        :href="exhibition.project_url"
        class="group flex cursor-pointer flex-col items-center text-center"
    >
        <div class="mb-6">
            <img
                class="h-56 rounded-2xl"
                :src="exhibition.image"
                :alt="exhibition.image"
            />
        </div>
        <span class="group-hover:text-light-tail-100 mb-3 text-sm text-accent">
            {{ exhibition.name }}
        </span>
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
