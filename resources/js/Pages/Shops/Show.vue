<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import CalendarSelector from '@/Components/Calendar/CalendarSelector.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  shop: Array,
  products: Array,
  list: Array
})

</script>

<template>
  <Head title="shops in list" />

  <AuthLayout>
    <div class="wrapper-home">
      <div class="calendar-box">
        <CalendarSelector 
          
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
        <div class="flex items-center justify-around w-full">    
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
                <div class="mr-2">
                <!-- <input type="checkbox"/> -->
                <Checkbox></Checkbox>
              </div>
              <div>
                {{ product.title }}
              </div>
            </div>
            <div class="flex items-center">
              <div class="mr-2">
                {{ product.quantity }}
              </div>
              <div>
                {{ product.measured }}
              </div>
            </div>
            <div>
              <PrimaryButton>change</PrimaryButton>
              <DangerButton>delete</DangerButton>
            </div>
            </div>
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<style>

</style>