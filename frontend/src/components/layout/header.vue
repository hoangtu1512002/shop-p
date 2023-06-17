<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
  <header class="w-full h-auto border-b-[1px] fixed top-0 left-0 right-0 z-[99] bg-[#fff]">
    <div class="header-content ml-[40px] mr-[40px] mx-auto flex justify-between items-center">
      <div class="header-logo">
        <a href="">
          <img src="@/assets/image/logo.svg" alt="" />
        </a>
      </div>
      <div class="header-action flex justify-between items-center">
        <div class="header-menu relative">
          <ul class="header-menu-list flex justify-between items-center gap-[10px]">
            <li class="header-menu-item py-[22px]"><a href="" class="header-menu-link">Trang chủ</a></li>
            <li class="header-menu-item py-[22px]"><a href="" class="header-menu-link">Đặt hàng</a></li>
            <li class="header-menu-item py-[22px]"><a href="" class="header-menu-link">Danh mục</a></li>
            <li class="header-menu-item py-[22px]"><a href="" class="header-menu-link">Blog</a></li>
            <li class="header-menu-item py-[22px]"><a href="" class="header-menu-link">Về chúng tôi</a></li>
          </ul>
        </div>
        <div class="header-right ml-[40px] flex justify-between items-center gap-[20px]">
          <div class="header-cart bg-[var(--primary-color)] rounded-2xl">
            <a
              class="header-cart-link flex justify-between items-center text-[16px] text-[#fff] py-[4px] px-[16px] font-bold"
              href=""
            >
              <font-awesome-icon :icon="['fas', 'cart-plus']" />
              <nav class="header-cart-total ml-2">0</nav>
            </a>
          </div>
          <div class="header-auth">
            <a href="" class="py-[6px] px-[14px] bg-[#e1e1e3] block rounded-2xl font-medium text-[14px]">Đăng nhập</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<style lang="scss" scoped>
.header-logo a img {
  width: 110px;
  height: auto;
  background-size: contain;
  filter: invert(42%) sepia(61%) saturate(3788%) hue-rotate(335deg) brightness(102%) contrast(110%);
}
.header-menu::after {
  content: '';
  display: block;
  width: 2px;
  height: 20px;
  position: absolute;
  background: #9999;
  right: -20px;
  top: 50%;
  transform: translateY(-50%);
}
</style>
