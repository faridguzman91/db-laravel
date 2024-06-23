<template lang="">
    <div class="group/list relative">
        <Link :href="exhibition.project_url" class="group/list relative">
            <div
                class="botton-0 aspect-h pointer-events-none absolute right-4 z-10 hidden w-72 opacity-0 group-hover/list:opacity-100 lg:block"
            >
                <img
                    class="col-span-6 text-right lg:col-span-1 lg:text-left"
                    :src="exhibition.image"
                    :alt="exhibition.image"
                />
            </div>

            <div
                class="grid grid-cols-12 gap-1 border-t border-black px-4 py-[11px] hover:bg-zinc-100 lg:gap-5 lg:px-5"
            >
                <p class="col-span-12 lg:col-span-7">
                    {{ exhibition.name }}
                </p>

                <div
                    class="text-grigio text-container col-span-6 lg:col-span-2 lg:text-black"
                >
                    {{ exhibition.id }}
                </div>
                <p class="col-span-2 hidden lg:block">
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
