<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import CalendarSelector from '@/Components/Calendar/CalendarSelector.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

const id = computed(()=> usePage().props.value.flash.message)

const form = useForm({
  shop_name: 'Без магазина',
  catalog_id: id
})

const submit = () => {
    form.post(route('shops.store'), { 
      onSuccess: () => form.reset(), 
    })
};

</script>

<template>
  <Head title="CreateNewShop" />

  <AuthLayout>
    <div class="wrapper-home">
      <div class="calendar-box block">
        <CalendarSelector />
      </div>
      <div class="my-content mt-5 p-2.5 overflow-y-auto">       
        <h1 class="text-stone-700 text-lg font-bold underline underline-offset-8">Create Shop</h1>
        <form class="mt-6" @submit.prevent= "submit">
          <div>
            <InputLabel for="shop_name" value="Введите название магазина" />
            <TextInput id="shop_name" type="text" placeholder="Без магазина" class="mt-1 block w-full" 
              v-model="form.shop_name" autofocus  autocomplete="shop_name" 
            />
          </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-primary">Create</button>
            </div>
        </form>
        
      </div>
      
    </div>
  </AuthLayout>
</template>