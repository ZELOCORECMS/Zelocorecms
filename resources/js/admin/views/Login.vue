<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="card bg-white p-8 rounded shadow-md border border-gray-200 w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to ZelocoreCMS</h2>
      <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-2">
            <label for="email" class="text-sm font-semibold text-gray-700">Email</label>
            <InputText id="email" v-model="email" />
        </div>
        <div class="flex flex-col gap-2">
            <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
            <InputText id="password" type="password" v-model="password" />
        </div>
        <Button label="Login" @click="login" class="mt-2 w-full" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

const email = ref('');
const password = ref('');

const login = () => {
    console.log('login with', email.value, password.value);
}
</script>
