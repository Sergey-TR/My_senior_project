<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const shops = defineProps({
  shopInList: Array,
  message: String
})

</script>

<template>
  <Head title="shops in list" />
  <AuthLayout>
   
    <div>
        {{ shops.message }}
      </div>
      <div>
        <div v-for="shop in shops.shopInList" :key="shop.id">
      {{ shop.shop_name }}
    </div>
      </div>
  </AuthLayout>
</template>

<style>

</style>