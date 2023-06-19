<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
  <div class="banner h-[720px] w-[full]">
    <div class="baner-one relative mx-auto w-[100%] h-[100%]">
      <img src="@/assets/image/banner/banner-1.svg" alt="" class="w-[100%] h-[100%] fill-none" />
      <div
        class="flex justify-between items-center w-[1300px] mx-auto absolute top-[50%] -translate-y-[50%] left-[50%] -translate-x-[50%] mt-10"
      >
        <div class="w-[380px]">
          <h1 class="text-4xl mb-[40px] text-[var(--primary-color)] font-bold leading-[1.5] tracking-[4px]">
            Nhận ưu đãi khi đăng kí thành viên
          </h1>
          <a
            href=""
            class="btn text-[#fff] py-[14px] pl-[20px] pr-[48px] bg-[var(--primary-color)] rounded-3xl text-xl font-bold"
          >
            Xem chi tiết <font-awesome-icon :icon="['fas', 'arrow-right']" class="ml-[10px] text-xl" />
          </a>
        </div>
        <div class="">
          <img src="@/assets/image/banner/banner-1-element.svg" alt="" />
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
