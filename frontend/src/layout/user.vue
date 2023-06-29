<script setup lang="ts">
import { RouterView } from 'vue-router';
import Header from '@/components/layout/header.vue';
import Footer from '@/components/layout/footer.vue';
import BackToTop from '@/components/common/backToTop.vue';

</script>

<template>
  <Header />
  <RouterView />
  <BackToTop />
  <Footer />
</template>

<style lang="scss" scoped></style>
