<template>
  <div class="p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 capitalize">
        {{ isNew ? 'Create' : 'Edit' }} {{ route.params.type }}
      </h1>
      <Button label="Save" icon="pi pi-check" @click="save" />
    </div>
    
    <div class="card bg-white p-6 rounded shadow-sm border border-gray-100">
      <div v-if="loading" class="text-gray-500">Loading schema...</div>
      <div v-else class="flex flex-col gap-6 max-w-3xl">
        <div v-for="field in schema" :key="field.name" class="flex flex-col gap-2">
            <label :for="field.name" class="font-semibold text-gray-700 capitalize">{{ field.label || field.name }}</label>
            
            <template v-if="field.type === 'text' || field.type === 'slug'">
                <InputText :id="field.name" v-model="formData[field.name]" class="w-full" />
            </template>
            
            <template v-else-if="field.type === 'richtext'">
                <Editor-Content :editor="editor" class="border border-gray-300 rounded p-2 min-h-[150px]" />
            </template>
            
            <template v-else-if="field.type === 'boolean'">
                <ToggleSwitch :id="field.name" v-model="formData[field.name]" />
            </template>
            
            <template v-else>
                <InputText :id="field.name" v-model="formData[field.name]" class="w-full" />
            </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import InputText from 'primevue/inputtext';
import ToggleSwitch from 'primevue/toggleswitch';
import Button from 'primevue/button';
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import axios from 'axios';

const route = useRoute();
const router = useRouter();
const isNew = ref(!route.params.id);
const loading = ref(true);

const schema = ref([]);
const formData = ref({});

const editor = useEditor({
  content: '<p>Start typing...</p>',
  extensions: [
    StarterKit,
  ],
  onUpdate: ({ editor }) => {
    // find the richtext field in schema and update its form data
    const rtf = schema.value.find(s => s.type === 'richtext');
    if (rtf) {
        formData.value[rtf.name] = editor.getHTML();
    }
  }
});

const loadData = async () => {
    loading.value = true;
    try {
        const type = route.params.type;
        // Mock fetch schema
        const typeRes = await axios.get(`/api/workspaces/default/content-types/${type}`);
        schema.value = typeRes.data.data.schema;
        
        schema.value.forEach(f => {
            formData.value[f.name] = '';
        });

        if (!isNew.value) {
            const itemRes = await axios.get(`/api/workspaces/default/content/${type}/${route.params.id}`);
            Object.assign(formData.value, itemRes.data.data.data);
            
            const rtf = schema.value.find(s => s.type === 'richtext');
            if (rtf && editor.value && formData.value[rtf.name]) {
                editor.value.commands.setContent(formData.value[rtf.name]);
            }
        }
    } catch (e) {
        console.error(e);
        // Fallback mock schema for testing UI if API fails
        schema.value = [
            { name: 'title', type: 'text', label: 'Title' },
            { name: 'slug', type: 'slug', label: 'Slug' },
            { name: 'content', type: 'richtext', label: 'Content' },
            { name: 'is_featured', type: 'boolean', label: 'Featured' }
        ];
    } finally {
        loading.value = false;
    }
};

const save = async () => {
    try {
        const type = route.params.type;
        if (isNew.value) {
            await axios.post(`/api/workspaces/default/content/${type}`, formData.value);
        } else {
            await axios.patch(`/api/workspaces/default/content/${type}/${route.params.id}`, formData.value);
        }
        router.push(`/admin/content/${type}`);
    } catch (e) {
        console.error(e);
    }
};

onMounted(() => {
    loadData();
});

onBeforeUnmount(() => {
    if (editor.value) {
        editor.value.destroy();
    }
});
</script>
