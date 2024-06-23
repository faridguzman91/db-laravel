<template>
    <div class="container mx-auto">
        <div
            role="tablist"
            class="border-light-tail-100 tabs tabs-lifted mb-12 border-b-2"
        >
            <a
                role="tab"
                class="tab"
                :class="{ 'tab-active': activeTab === 'all' }"
                @click="filterExhibitions('all')"
            >
                <p class="text-xl">All</p>
            </a>
            <a
                role="tab"
                class="tab"
                :class="{ 'tab-active': activeTab === projectExhibition.id }"
                v-for="projectExhibition in exhibitions.data"
                :key="projectExhibition.id"
                @click="filterExhibitions(projectExhibition.id)"
            >
                <p class="text-xl">
                    {{ projectExhibition.name }}
                </p>
            </a>
        </div>
        <section class="flex flex-col w-full">
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

const filteredExhibitions = ref(props.exhibitions.data);
const activeTab = ref('all'); // Initialize with 'all' since it's initially active

const filterExhibitions = (id) => {
    activeTab.value = id; // Update the active tab
    if (id === "all") {
        filteredExhibitions.value = props.exhibitions.data;
    } else {
        filteredExhibitions.value = props.exhibitions.data.filter(project => project.id === id);
    }
};
</script>
