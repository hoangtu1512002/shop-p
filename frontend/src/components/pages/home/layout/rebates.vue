<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
const modules = [Autoplay, Navigation];
</script>

<template>
  <div class="mb-[40px]">
    <div class="flex justify-between items-end">
      <div>
        <h1 class="text-[var(--title-color)] font-medium text-2xl">Khuyến mãi</h1>
        <p class="my-[10px]">Khám phá nhiều ưu đãi hấp dẫn</p>
      </div>
      <div class="flex gap-[20px]">
        <button
          type="button"
          class="rebates-prev-btn w-[36px] h-[36px] text-lg bg-[var(--primary-color)] text-[#fff] rounded-[50%]"
        >
          <font-awesome-icon :icon="['fas', 'arrow-left']" />
        </button>
        <button
          type="button"
          class="rebates-next-btn w-[36px] h-[36px] text-lg bg-[var(--primary-color)] text-[#fff] rounded-[50%]"
        >
          <font-awesome-icon :icon="['fas', 'arrow-right']" />
        </button>
      </div>
    </div>
    <swiper
      :slides-per-view="1"
      :navigation="{
        nextEl: '.rebates-next-btn',
        prevEl: '.rebates-prev-btn',
      }"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
      }"
      :loop="true"
      :modules="modules"
    >
      <swiper-slide>
        <div class="rabates-list mt-[20px] grid gap-[10px] grid-cols-5">
          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm đùi gà</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm đùi gà</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm đùi gà</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm đùi gà</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm đùi gà</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="rabates-list mt-[20px] grid gap-[10px] grid-cols-5">
          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/GCuWz2mjnZWiS7DIGExOnQGokt9vgffFzErfFE3LvjU/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzLzhlNDM4ODFhLTdlNTgtNDJlZi1iMmYxLWZlNjI5NDQzZjdlNS1rYWtpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm ba rọi heo</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/GCuWz2mjnZWiS7DIGExOnQGokt9vgffFzErfFE3LvjU/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzLzhlNDM4ODFhLTdlNTgtNDJlZi1iMmYxLWZlNjI5NDQzZjdlNS1rYWtpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm ba rọi heo</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/GCuWz2mjnZWiS7DIGExOnQGokt9vgffFzErfFE3LvjU/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzLzhlNDM4ODFhLTdlNTgtNDJlZi1iMmYxLWZlNjI5NDQzZjdlNS1rYWtpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm ba rọi heo</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/GCuWz2mjnZWiS7DIGExOnQGokt9vgffFzErfFE3LvjU/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzLzhlNDM4ODFhLTdlNTgtNDJlZi1iMmYxLWZlNjI5NDQzZjdlNS1rYWtpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm ba rọi heo</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>

          <div class="rabates-item rounded-xl border">
            <div class="rabates-img">
              <a href="" class="rabates-item-link">
                <img
                  src="https://images.deliany.co/GCuWz2mjnZWiS7DIGExOnQGokt9vgffFzErfFE3LvjU/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzLzhlNDM4ODFhLTdlNTgtNDJlZi1iMmYxLWZlNjI5NDQzZjdlNS1rYWtpLnBuZw"
                  class="rounded-tl-lg rounded-tr-lg"
                  alt=""
                />
              </a>
            </div>
            <h1 class="rabates-title ml-[10px] mr-[10px] font-bold text-lg my-[10px] truncate">
              <a href="">Cơm ba rọi heo</a>
            </h1>
            <a
              href=""
              class="rabates-description h-[40px] ml-[10px] mr-[10px] text-[var(--text-color)] line-clamp-2 mb-[20px]"
            >
              Combo Beru gồm 1 hộp Omisoka, 1 hộp salad Wafu và 1 hộp cuốn sushi
            </a>
            <div class="ml-[10px] mr-[10px] mb-[10px]">
              <strong class="text-[var(--primary-color)]"> 59.0000₫ </strong>
              <span class="text-[12px] font-[400] line-through text-[var(--text-color)] ml-[10px]"> 69.0000₫ </span>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<style lang="scss" scoped>
.disabled {
  background-color: gray;
}
</style>
