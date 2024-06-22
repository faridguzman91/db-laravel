<script setup>
import { Head, Link } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/Frontend.vue";
import Hero from "../FrontendComponents/Hero.vue";
import About from "../FrontendComponents/About.vue"
</script>

<template>
    <Head title="David Bade" />
    <FrontendLayout>
        <!--Hero primary -->
        <Hero />
        <!--about-->
        <About />

        <!-- Skills tail -100 -->
        <!-- Portfolio  primary-->
        <!-- Blog -->
        <!--contact -->
    </FrontendLayout>
</template>

<style></style>
