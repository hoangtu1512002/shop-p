<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { RouterLink } from 'vue-router';

const menus = [
  {
    path: '/',
    name: 'Trang chủ',
    icon: '',
  },

  {
    path: '/order',
    name: 'Đặt hàng',
    icon: '',
  },

  {
    path: '/',
    name: 'Danh mục',
    icon: '',
  },

  {
    path: '/',
    name: 'Blog',
    icon: '',
  },

  {
    path: '/',
    name: 'Về chúng tôi',
    icon: '',
  },
];
</script>

<template>
  <header class="w-full h-auto border-b-[1px] sticky top-0 left-0 right-0 z-[999] bg-[#fff]">
    <div class="header-content ml-[40px] mr-[40px] mx-auto flex justify-between items-center">
      <div class="header-logo">
        <router-link to="/">
          <img src="@/assets/image/logo.svg" alt="" />
        </router-link>
      </div>
      <div class="header-action flex justify-between items-center">
        <div class="header-menu relative">
          <ul class="header-menu-list flex justify-between items-center gap-[10px]">
            <li class="header-menu-item" v-for="(menu, index) in menus" :key="index">
              <router-link
                :to="menu.path"
                class="header-menu-link hover:text-[var(--primary-color)] duration-200 py-[22px] block"
                >{{ menu.name }}</router-link
              >
            </li>
          </ul>
        </div>
        <div class="header-right ml-[40px] flex justify-between items-center gap-[20px]">
          <div class="header-cart bg-[var(--primary-color)] rounded-2xl">
            <router-link
              class="header-cart-link flex justify-between items-center text-[16px] text-[#fff] py-[4px] px-[16px] font-bold"
              to="/cart"
            >
              <font-awesome-icon :icon="['fas', 'cart-plus']" />
              <nav class="header-cart-total ml-2">0</nav>
            </router-link>
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
@import '@/assets/css/layout/header.scss';
</style>
