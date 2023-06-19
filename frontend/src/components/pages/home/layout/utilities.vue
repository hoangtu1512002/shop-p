<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
  <div class="utilities flex justify-center items-center gap-[80px] rounded-xl mt-[100px] h-[300px]">
    <div class="text-center py-[20px]">
      <h1 class="text-center text-2xl font-medium text-[var(--primary-color)]">Không Đợi chờ</h1>
      <nav class="mt-[20px] w-[62%] mx-auto">
        <p class="text-center">Thưởng thức món ăn yếu thích tại địa điểm yêu thích trong vòng 30 phút</p>
      </nav>
      <div class="flex items-center justify-center mt-[20px]">
        <img src="@/assets/image/time-30.svg" alt="" class="w-[80px]">
      </div>
    </div>

    <div class="text-center py-[20px]">
      <h1 class="text-center text-2xl font-medium text-[var(--primary-color)]">Thanh toán linh hoạt</h1>
      <nav class="mt-[20px] w-[62%] mx-auto">
        <p class="text-center">Thanh toán dễ dàng với tiền mặt hoặc các phương thức thanh toán trực tuyến phổ biến.</p>
      </nav>
      <div class="flex items-center justify-center mt-[20px]">
        <img src="@/assets/image/pay.svg" alt="" class="w-[80px]">
      </div>
    </div>

    <div class="text-center py-[20px]">
      <h1 class="text-center text-2xl font-medium text-[var(--primary-color)]">Tận hưởng dịch vụ</h1>
      <nav class="mt-[20px] w-[62%] mx-auto">
        <p class="text-center">Món ăn đa dạng, đặt hàng dễ dàng, theo dõi đơn tiện lợi, đổi trả món nhanh chóng.</p>
      </nav>
      <div class="flex items-center justify-center mt-[20px]">
        <img src="@/assets/image/heart.svg" alt="" class="w-[80px]">
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.utilities {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

img {
    filter: invert(43%) sepia(23%) saturate(6727%) hue-rotate(337deg) brightness(100%) contrast(101%);
}
</style>
