<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const showButton = ref(false);

const backToTop = () => {
  const scrollStep = -window.scrollY / (500 / 15);
  const scrollInterval = setInterval(() => {
    if (window.scrollY !== 0) {
      window.scrollBy(0, scrollStep);
    } else {
      clearInterval(scrollInterval);
    }
  }, 15);
};

onMounted(() => {
  window.addEventListener('scroll', () => {
    showButton.value = window.scrollY > 100;
  });
});
</script>

<template>
  <button
    type="button"
    class="w-[50px] bg-[var(--primary-color)] text-[#fff] h-[50px] fixed bottom-[40px] right-[40px] z-[999] rounded-xl border-none outline-none"
    v-show="showButton"
    @click="backToTop"
  >
    <font-awesome-icon :icon="['fas', 'arrow-up']" class="text-xl" />
  </button>
</template>

<style lang="scss" scoped></style>
