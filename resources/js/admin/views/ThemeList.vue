<template>
  <!--
    WP admin-ui: Themes page
    AdminBreadcrumbs last item = <h1>
  -->
  <div class="wp-admin-page-header">
    <AdminBreadcrumbs
      :items="[
        { label: 'Dashboard', to: '/admin' },
        { label: 'Themes' },
      ]"
    />
    <div class="wp-admin-page-header__actions">
      <button
        id="btn-upload-theme"
        class="wp-admin-btn wp-admin-btn--secondary"
      >
        <i class="pi pi-upload" aria-hidden="true"></i>
        Upload Theme
      </button>
    </div>
  </div>

  <div style="padding: 12px 0;">

    <p style="font-size:13px; color:var(--wp-admin-text-secondary); margin: 0 0 16px;">
      Manage the look and feel of your ZelocoreCMS site.
    </p>

    <!-- Theme grid -->
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap:16px;">
      <article
        v-for="theme in themes"
        :key="theme.slug"
        class="wp-admin-card"
        :aria-label="`Theme: ${theme.name}`"
        style="overflow:hidden;"
      >
        <!-- Thumbnail -->
        <div
          class="theme-thumbnail"
          style="height:160px; background:#f0f0f1; display:flex; align-items:center; justify-content:center; position:relative; border-bottom:1px solid var(--wp-admin-border-color);"
        >
          <i class="pi pi-image" style="font-size:48px; color:#c3c4c7;" aria-hidden="true"></i>

          <!-- Active badge -->
          <span
            v-if="theme.is_active"
            class="wp-admin-badge wp-admin-badge--active"
            style="position:absolute; top:10px; right:10px;"
          >Active</span>

          <!-- Hover overlay -->
          <div
            class="theme-overlay"
            style="position:absolute; inset:0; background:rgba(0,0,0,0.6); opacity:0; display:flex; align-items:center; justify-content:center; gap:8px; transition:opacity 0.15s;"
          >
            <button
              v-if="!theme.is_active"
              class="wp-admin-btn wp-admin-btn--primary"
              @click="activateTheme(theme.slug)"
            >Activate</button>
            <button
              v-if="theme.is_active"
              class="wp-admin-btn wp-admin-btn--secondary"
            >Customize</button>
          </div>
        </div>

        <div class="wp-admin-card__body">
          <div style="font-size:14px; font-weight:600; color:var(--wp-admin-text-primary); margin-bottom:2px;">
            {{ theme.name }}
          </div>
          <div style="font-size:12px; color:var(--wp-admin-text-muted);">
            Version {{ theme.version }} · By {{ theme.author }}
          </div>
          <p style="font-size:12px; color:var(--wp-admin-text-secondary); margin:8px 0 0; line-height:1.5;">
            {{ theme.description }}
          </p>
        </div>
      </article>

      <!-- Empty state -->
      <div
        v-if="themes.length === 0"
        class="wp-admin-card wp-admin-card__body"
        style="grid-column:1/-1; text-align:center; padding:32px; color:var(--wp-admin-text-muted);"
      >
        No themes installed yet.
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import AdminBreadcrumbs from '../components/AdminBreadcrumbs.vue';
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

<style scoped>
article:hover .theme-overlay { opacity: 1 !important; }
</style>
