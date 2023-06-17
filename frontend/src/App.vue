<script setup lang="ts">
import { RouterView } from 'vue-router';
import Header from '@/components/layout/header.vue';
import Footer from '@/components/layout/footer.vue';
</script>

<template>
  <Header />
  <RouterView />
  <!-- <Footer /> -->
</template>

<style lang="scss" scoped></style>
