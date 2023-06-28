<script setup lang="ts">
import Banner from './layout/banner.vue';
import Rebates from './layout/rebates.vue';
import BuyTheMost from './layout/buyTheMost.vue'
import Order from './layout/order.vue'
import Utilities from './layout/utilities.vue'
</script>

<template>
  <div class="wrapper">
    <Banner />
    <div class="content">
      <Rebates />
      <BuyTheMost />
      <Order />
      <Utilities />
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
