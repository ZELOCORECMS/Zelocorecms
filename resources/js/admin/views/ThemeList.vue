<template>
  <div class="p-8">
    <div class="flex justify-between items-center mb-8">
      <div>
        <h1 class="text-3xl font-bold text-gray-800">Themes</h1>
        <p class="text-gray-500 mt-1">Manage the look and feel of your ZeloCoreCMS.</p>
      </div>
      <Button label="Upload Theme" icon="pi pi-upload" />
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div v-for="theme in themes" :key="theme.slug" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition hover:shadow-md">
        <!-- Mock Thumbnail -->
        <div class="h-48 bg-gray-100 flex items-center justify-center border-b border-gray-100 relative group">
          <div v-if="theme.is_active" class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow">
            Active
          </div>
          <i class="pi pi-image text-gray-300 text-6xl"></i>
          
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <Button v-if="!theme.is_active" label="Activate" severity="success" @click="activateTheme(theme.slug)" />
          </div>
        </div>
        
        <div class="p-6">
          <h2 class="text-xl font-bold text-gray-900">{{ theme.name }}</h2>
          <p class="text-sm text-gray-500 mt-1">Version {{ theme.version }} • By {{ theme.author }}</p>
          <p class="text-gray-600 mt-4 line-clamp-2 text-sm">{{ theme.description }}</p>
          
          <div class="mt-6 flex gap-3">
            <Button v-if="theme.is_active" label="Customize" icon="pi pi-cog" outlined class="w-full" />
            <Button v-if="!theme.is_active" label="Preview" icon="pi pi-eye" outlined class="w-full" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Button from 'primevue/button';
import axios from 'axios';

const themes = ref([]);
const workspaceSlug = 'default';

const loadThemes = async () => {
    try {
        const res = await axios.get(`/api/v1/workspaces/${workspaceSlug}/themes`);
        themes.value = res.data.data;
    } catch (e) {
        console.error('Failed to load themes:', e);
    }
};

const activateTheme = async (slug) => {
    try {
        await axios.post(`/api/v1/workspaces/${workspaceSlug}/themes/${slug}/activate`);
        loadThemes();
    } catch (e) {
        console.error('Failed to activate theme:', e);
    }
};

onMounted(() => {
    loadThemes();
});
</script>
