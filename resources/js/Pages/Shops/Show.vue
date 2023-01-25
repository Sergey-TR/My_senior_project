<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import CalendarSelector from '@/Components/Calendar/CalendarSelector.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import store from '@/Store/store';

const props = defineProps({
  shop: Object,
  products: Array,
  list: Array
})

const allLists = computed(() => store.getters.getAllDateList)

</script>

<template>
  <Head title="shops in list" />

  <AuthLayout>
    <div class="wrapper-home">
      <div class="calendar-box">
        <CalendarSelector 
        :dateList="allLists"
        />
      </div>
      <div class="my-content mt-5 p-2.5">
        <div v-for="listItem in props.list" :key="listItem.id">
          <h1 class="text-stone-700 text-lg font-bold underline underline-offset-8">
            {{ listItem.name }}
          </h1>
          <div class="text-sm text-stone-500 mt-1">
            {{ listItem.list_data }}
          </div>
        </div>
        <div class="flex items-center justify-between w-full">    
          <h1 class="text-stone-600 text-lg font-bolder m-0 p-0">
           Магазин: &nbsp; {{ props.shop.shop_name }}
          </h1>
          <Link
            :href="route('products.create', props.shop.id)"
            class="hover:underline  hover:underline-offset-8 hover:text-sky-400 text-lg text-sky-500 font-bolder"
            >Добавить продукт
          </Link>
        </div>
        <div v-for="product in props.products" :key="product.id">
            <div class="flex items-center justify-between w-full mt-3">
              <div class="flex items-center">
                <div class="shop-products-list">
                  <div class="shop-productItem" >
                    <label
                      class="row-list"
                    >
                      <input
                        type="checkbox"
                        class="check-item"               
                      />
                      <div class="title-of-the-item">
                        {{ product.title }}
                      </div>
                      <span class="check-box-fake"></span>
                    </label>
                  </div>
                </div>
                <div class="mr-2">
                  {{ product.quantity }}
                </div>
                <div>
                  {{ product.measured }}
                </div>
              </div>
              <!-- <div class="flex items-center">
                
              </div> -->
            <!-- <div>
              <PrimaryButton>change</PrimaryButton>
              <DangerButton>delete</DangerButton>
            </div> -->
            </div>
        </div>
      </div>
      
    </div>
  </AuthLayout>
</template>

<style>
.shop-products-list {
  padding: 0px 16px;
}
.row-list {
  display: flex;
  align-items: center;
  margin-bottom: 14px;
}
.check-item {
  position: absolute;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
.title-of-the-item {
  width: 240px;
  white-space: nowrap;
  font-weight: 500;
  overflow: hidden;
  text-overflow: ellipsis;
}
.title-checked {
  color: #b9b9b9;
  text-decoration-line: line-through;
}
.check-item {
  position: absolute;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
.check-box-fake {
  position: absolute;
  width: 16px;
  height: 16px;
  border: 1px solid #242e42;
  border-radius: 2px;
  margin-left: -29px;
}
/*CHECKED*/
input:checked + .title-of-the-item {
  color: #b9b9b9;
  text-decoration-line: line-through;
}
input:checked + .title-of-the-item + .check-box-fake {
  background-image: url("data:image/svg+xml,%3Csvg width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 14L2 9L3.41 7.58L7 11.17L14.59 3.58L16 5L7 14ZM16 0H2C0.89 0 0 0.89 0 2V16C0 16.5304 0.210714 17.0391 0.585786 17.4142C0.960859 17.7893 1.46957 18 2 18H16C16.5304 18 17.0391 17.7893 17.4142 17.4142C17.7893 17.0391 18 16.5304 18 16V2C18 0.89 17.1 0 16 0Z' fill='%23B9B9B9'/%3E%3C/svg%3E");
  width: 18px;
  height: 18px;
  background-size: 18px;
  border: none;
}
</style>