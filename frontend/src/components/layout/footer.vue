<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const currentYear = ref<number>(0);

onMounted(() => {
  const currentDate = new Date();
  currentYear.value = currentDate.getFullYear();
});
</script>

<template>
  <footer class="footer bg-[#fff]">
    <div class="footer-content w-[1280px] my-0 mx-auto pb-[10px]">
      <div class="footer-logo py-[28px]">
        <img src="@/assets/image/logo.svg" alt="" />
      </div>

      <div class="flex justify-between">
        <div>
          <div>
            <h1 class="font-bold">CÔNG TY CỔ PHẨN ABC VIỆT NAM</h1>
            <p class="text-[12px] my-[10px]">100 Miêu Nha, Tây mỗ, Nam Từ Liêm, Hà Nội, Việt Nam</p>
            <nav class="flex text-[12px] font-[600] w-[160px] justify-between">
              Mã số thuế:
              <p class="text-[12px] font-[400]">12345678</p>
            </nav>
            <nav class="flex text-[12px] font-[600] w-[160px] justify-between my-[10px]">
              Đăng kí lần đầu:
              <p class="text-[12px] font-[400]">12345678</p>
            </nav>
            <nav class="flex text-[12px] font-[600] w-[160px] justify-between">
              Ngày cấp:
              <p class="text-[12px] font-[400]">15/01/2002</p>
            </nav>
            <nav class="flex text-[12px] font-[600] w-[160px] justify-between my-[10px]">
              Số điện thoại:
              <p class="text-[12px] font-[400]">1900109999</p>
            </nav>
          </div>
        </div>

        <div class="grid grid-cols-3">
          <div class="w-[200px]">
            <h1 class="font-bold uppercase">Về chúng tôi</h1>
            <ul class="my-[10px]">
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Về sứ mệnh</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Về thành tích</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Định hường phát triển</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Về tầm nhìn</a
                >
              </li>
            </ul>
          </div>

          <div class="w-[200px]">
            <h1 class="font-bold uppercase">Chính sách</h1>
            <ul class="my-[10px]">
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Chính sách giao hàng</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Chính sách đổi trả</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Chính sách bảo mật thông tin</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="block my-[10px] text-[12px] hover:text-[var(--primary-color)] hover:pl-[10px] duration-200"
                  >Chính sách thanh toán</a
                >
              </li>
            </ul>
          </div>

          <div class="w-[200px]">
            <h1 class="font-bold uppercase">Liên hệ</h1>
            <ul>
              <li>
                <p class="my-[10px] text-[12px]">
                  <font-awesome-icon :icon="['fas', 'envelope']" class="mr-[5px] text-[10px]" />
                  hoangtu1512002@gmail.com
                </p>
              </li>
              <li>
                <p class="my-[10px] text-[12px]">
                  <font-awesome-icon :icon="['fas', 'phone']" class="mr-[5px] text-[10px]" /> 0382584001
                </p>
              </li>
              <li>
                <p class="my-[10px] text-[12px] flex">
                  <img class="w-[18px] mr-[5px]" src="@/assets/image/social/zalo.svg" alt="" /> zalo.me/hoangtu
                </p>
              </li>
              <li class="footer-social flex gap-[10px]">
                <a href=""><img src="@/assets/image/social/facebook.svg" alt="" class="w-[20px]" /></a>
                <a href=""><img src="@/assets/image/social/instagram.svg" alt="" class="w-[20px]" /></a>
                <a href=""><img src="@/assets/image/social/linkedin.svg" alt="" class="w-[20px]" /></a>
                <a href=""><img src="@/assets/image/social/tiktok.svg" alt="" class="w-[20px]" /></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-[#334155]">
      <p class="text-[#fff] w-[1280px] mx-auto text-[10px] py-[20px]">© {{ currentYear }} Deliany</p>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
@import '@/assets/css/layout/footer.scss';
</style>
