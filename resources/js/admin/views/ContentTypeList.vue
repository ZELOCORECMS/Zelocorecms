<template>
  <div class="p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Content Types</h1>
      <Button label="New Type" icon="pi pi-plus" @click="showCreateDialog = true" />
    </div>
    
    <div class="card bg-white p-6 rounded shadow-sm border border-gray-100">
      <DataTable :value="contentTypes" dataKey="id">
        <Column field="name" header="Name"></Column>
        <Column field="slug" header="Slug"></Column>
        <Column header="Actions">
          <template #body="slotProps">
            <Button icon="pi pi-pencil" text rounded />
            <Button icon="pi pi-trash" text rounded severity="danger" />
          </template>
        </Column>
      </DataTable>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import axios from 'axios';

const contentTypes = ref([]);
const showCreateDialog = ref(false);

const loadTypes = async () => {
    try {
        // Mock or actual API call. Hardcoding workspace slug for now.
        const res = await axios.get('/api/workspaces/default/content-types');
        contentTypes.value = res.data.data;
    } catch (e) {
        console.error(e);
    }
};

onMounted(() => {
    loadTypes();
});
</script>
