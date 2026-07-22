<template>
  <div class="p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 capitalize">{{ route.params.type }}</h1>
      <Button label="New Item" icon="pi pi-plus" />
    </div>
    
    <div class="card bg-white p-6 rounded shadow-sm border border-gray-100">
      <DataTable :value="items" dataKey="id">
        <Column field="data.title" header="Title"></Column>
        <Column field="status" header="Status"></Column>
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
import { ref, watch, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import axios from 'axios';

const route = useRoute();
const items = ref([]);

const loadItems = async () => {
    try {
        const type = route.params.type;
        const res = await axios.get(`/api/workspaces/default/content/${type}`);
        items.value = res.data.data;
    } catch (e) {
        console.error(e);
    }
};

watch(() => route.params.type, () => {
    loadItems();
});

onMounted(() => {
    loadItems();
});
</script>
