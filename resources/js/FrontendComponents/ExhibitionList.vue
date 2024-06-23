<template lang="">
    <div class="container mx-auto">
        <div
            role="tablist"
            class="border-light-tail-100 tabs tabs-lifted mb-12 border-b-2"
        >
            <a role="tab" class="tab" @click="filterExhibitions('all')">
                <p class="text-xl">all</p>
            </a>
            <a
                role="tab"
                class="tab tab-active"
                v-for="projectExhibition in exhibitions.data"
                :key="projectExhibition.id"
                @click="filterExhibitions(projectExhibition.id)"
            >
                <p class="text-xl">
                    {{ projectExhibition.name }}
                </p>
            </a>
        </div>
        <section class="grid gap-y-12 lg:grid-cols-3 lg:gap-8">
            <Exhibition
                v-for="exhibition in filteredExhibitions"
                :key="exhibition.id"
                :exhibition="exhibition"
            />
        </section>
    </div>
</template>

<script setup>
import Exhibition from "../FrontendComponents/Exhibition.vue";
import { ref } from "vue";


const props = defineProps({
    exhibitions: Object,
    projects: Object,
});

const filteredExhibitions = ref(props.exhibitions.data)

const filterExhibitions = (id) => {
    if (id === "all") {
        filteredExhibitions.value = props.exhibitions.data
    } else {
        filteredExhibitions.value = props.exhibitions.data.filter(project => {
            console.log(project.id);
            return project.id === id;
        })
    }
}
</script>
