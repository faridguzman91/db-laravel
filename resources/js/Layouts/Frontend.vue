<script setup lang="ts">
import Header from "../FrontendComponents/Header.vue";
import Footer from "../FrontendComponents/Footer.vue";
import {onMounted, ref } from 'vue'
import {themeChange} from 'theme-change'

onMounted(() => {
  themeChange(false)
})

</script>

<template>
    <div class="">
        <!--header-->
        <Header></Header>
        <main class="min-h-screen">
            <slot />
        </main>

        <!--footer-->
        <Footer />
    </div>
</template>
