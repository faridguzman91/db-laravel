<template lang="">
    <div class="container mx-auto">
<div role="tablist" class="tabs tabs-lifted mb-12 border-b-2 border-light-tail-100">
  <a role="tab" class="tab">
      <p class="text-xl"></p>
  </a>
  <a role="tab" class="tab tab-active" v-for="projectExhibition in exhibitions.data" :key="projectExhibition.id">
 <p class="text-xl">
 {{ projectExhibition.name }}
 </p>
  </a>
  <a role="tab" class="tab">
 <p class="text-xl"></p>
  </a>
</div>
    </div>
</template>



<script setup>

defineProps({
    exhibitions: Object,
    projects: Object
});



</script>
