<template lang="">
    <section
        id="exhibitions"
        class="section bg-light-primary dark:bg-dark-primary mb-4 mt-4 min-h-[1400px] p-28 font-mono"
    >
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="mb-4 text-4xl">exhibitions</h2>
            </div>
            <ExhibitionList :projects="projects" :exhibitions="exhibitions" />
        </div>
    </section>
</template>

<script setup>
import ExhibitionList from "../FrontendComponents/ExhibitionList.vue";

defineProps({
    exhibitions: Object,
    projects: Object,
});
</script>
