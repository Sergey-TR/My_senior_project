<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import CalendarSelector from '@/Components/Calendar/CalendarSelector.vue';
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
        <div v-for="shopItem in shop.shop" :key="shopItem.id">
            
          {{ shopItem.shop_name }}
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<style>

</style>