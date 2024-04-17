<script setup lang="ts">
import Header from "../FrontendComponents/Header.vue"

</script>

<template>
    <div class="bg-slate-200 dark:bg-slate-900">
         <!--header-->
         <Header></Header>
         <main class="min-h-screen">
             <slot />
         </main>

         <!--footer-->
    </div>
</template>
