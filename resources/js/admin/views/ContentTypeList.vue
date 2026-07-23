<template>
  <!--
    WP admin-ui: Content Types page
    AdminBreadcrumbs last item = <h1>
  -->
  <div class="wp-admin-page-header">
    <AdminBreadcrumbs
      :items="[
        { label: 'Dashboard', to: '/admin' },
        { label: 'Content Types' },
      ]"
    />
    <div class="wp-admin-page-header__actions">
      <button
        id="btn-new-content-type"
        class="wp-admin-btn wp-admin-btn--primary"
        @click="showCreateDialog = true"
      >
        <i class="pi pi-plus" aria-hidden="true"></i>
        Add New Type
      </button>
    </div>
  </div>

  <div style="padding: 12px 0;">

    <div class="wp-admin-card">
      <table class="wp-admin-table" aria-label="Content types list">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="contentTypes.length === 0">
            <td colspan="3" style="text-align:center; color: var(--wp-admin-text-muted); padding: 24px 10px;">
              No content types found.
            </td>
          </tr>
          <tr v-for="type in contentTypes" :key="type.id">
            <td>
              <strong>{{ type.name }}</strong>
            </td>
            <td>
              <code style="background:#f0f0f1; padding:2px 6px; border-radius:3px; font-size:12px;">
                {{ type.slug }}
              </code>
            </td>
            <td>
              <div class="wp-admin-table__row-actions">
                <button
                  class="wp-admin-btn wp-admin-btn--secondary"
                  title="Edit"
                  aria-label="Edit content type"
                >
                  <i class="pi pi-pencil" aria-hidden="true"></i>
                  Edit
                </button>
                <button
                  class="wp-admin-btn wp-admin-btn--link"
                  style="color: #dc3232;"
                  title="Delete"
                  aria-label="Delete content type"
                >
                  <i class="pi pi-trash" aria-hidden="true"></i>
                  Delete
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import AdminBreadcrumbs from '../components/AdminBreadcrumbs.vue';
import axios from 'axios';

const contentTypes = ref([]);
const showCreateDialog = ref(false);

const loadTypes = async () => {
    try {
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
