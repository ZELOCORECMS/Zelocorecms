<template>
  <!--
    WP admin-ui: Content List page
    AdminBreadcrumbs last item = <h1> (dynamic content type name)
  -->
  <div class="wp-admin-page-header">
    <AdminBreadcrumbs
      :items="[
        { label: 'Dashboard', to: '/admin' },
        { label: contentTypeLabel },
      ]"
    />
    <div class="wp-admin-page-header__actions">
      <router-link
        :to="`/admin/content/${route.params.type}/create`"
        id="btn-new-content-item"
        class="wp-admin-btn wp-admin-btn--primary"
      >
        <i class="pi pi-plus" aria-hidden="true"></i>
        Add New
      </router-link>
    </div>
  </div>

  <div style="padding: 12px 0;">

    <div class="wp-admin-card">
      <table class="wp-admin-table" :aria-label="`${contentTypeLabel} list`">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="items.length === 0">
            <td colspan="3" style="text-align:center; color: var(--wp-admin-text-muted); padding: 24px 10px;">
              No items found.
              <router-link :to="`/admin/content/${route.params.type}/create`" class="wp-admin-breadcrumbs__link">
                Create your first one.
              </router-link>
            </td>
          </tr>
          <tr v-for="item in items" :key="item.id">
            <td>
              <router-link
                :to="`/admin/content/${route.params.type}/${item.id}`"
                class="wp-admin-breadcrumbs__link"
                style="font-weight:600;"
              >
                {{ item.data?.title || '(Untitled)' }}
              </router-link>
            </td>
            <td>
              <span
                class="wp-admin-badge"
                :class="item.status === 'published' ? 'wp-admin-badge--published' : 'wp-admin-badge--draft'"
              >
                {{ item.status }}
              </span>
            </td>
            <td>
              <div class="wp-admin-table__row-actions">
                <router-link
                  :to="`/admin/content/${route.params.type}/${item.id}`"
                  class="wp-admin-btn wp-admin-btn--secondary"
                  title="Edit"
                >
                  <i class="pi pi-pencil" aria-hidden="true"></i>
                  Edit
                </router-link>
                <button
                  class="wp-admin-btn wp-admin-btn--link"
                  style="color: #dc3232;"
                  title="Delete"
                  aria-label="Delete item"
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
import { ref, computed, watch, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import AdminBreadcrumbs from '../components/AdminBreadcrumbs.vue';
import axios from 'axios';

const route = useRoute();
const items = ref([]);

const contentTypeLabel = computed(() => {
    const type = route.params.type ?? '';
    return type.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
});

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
