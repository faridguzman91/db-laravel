<template lang="">
    <section id="exhibitions" class="p-28 mb-4 mt-4 font-mono section bg-light-primary dark:bg-dark-primary min-h-[1400px]">
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="text-4xl">
exhibitions
                </h2>
                <p>
my latest shows

                </p>
            </div>
            <ExhibitionList :projects="projects" :exhibitions="exhibitions" />
        </div>

    </section>
</template>

<script setup>
import ExhibitionList from "../FrontendComponents/ExhibitionList.vue"

defineProps({
exhibitions: Object,
projects: Object
});


</script>
