<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import CalendarSelector from '@/Components/Calendar/CalendarSelector.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

const id = defineProps({
  productId: String
})

const form = useForm({
  shop_id: id.productId,
  title: '',
  quantity: '',
  measured: ''
});

const submit = () => {
    form.post(route('products.store'), { 
      onSuccess: () => form.reset(), 
    })
};
</script>

<template>
  <Head title="ProductCreatePage" />

  <AuthLayout>
    <div class="wrapper-home">
      <div class="calendar-box block">
        <CalendarSelector />
      </div>
      <div class="my-content mt-5 p-2.5 overflow-y-auto">
        <h1 class="text-stone-700 text-lg font-bold underline underline-offset-8">Создайте продукт</h1>
        <form class="mt-6" @submit.prevent= "submit">
          <div>
            <InputLabel for="title" value="Введите название продукта" />
            <TextInput id="title" type="text" placeholder="продукт" class="mt-1 block w-full" 
              v-model="form.title" autofocus required autocomplete="title" 
            />
          </div>
          <div>
            <div>
              <InputLabel for="quantity" value="Количество" />
              <TextInput id="quantity" type="text" v-model="form.quantity" autofocus required autocomplete="quantity" />
            </div>
            <div>
              <label for="measured" value="ед. измерения">ед. измерения
              <select v-model="form.measured" id="measured">
                <option value="null" disabled selected>ед. измерения</option>
                <option>шт.</option>
                <option>метр</option>
                <option>гр.</option>
                <option>кг.</option>
                <option>л.</option>
                <option>дес.</option>
              </select>
            </label>
            </div>
          </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-primary">Создать</button>
            </div>
        </form>
      </div> 
    </div>
  </AuthLayout>
</template>

<style>

</style>