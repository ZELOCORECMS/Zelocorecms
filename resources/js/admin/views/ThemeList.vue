<template>
  <div class="wp-admin-page">
    <div class="wp-themes-header">
      <div class="wp-themes-header-content">
        <h1>Themes</h1>
        <p>Select or update the visual design for your site. <a href="#">Learn more.</a></p>
      </div>
    </div>

    <div class="wp-themes-toolbar">
      <div class="wp-themes-search-group">
        <div class="search-input-wrapper">
          <i class="pi pi-search search-icon"></i>
          <input type="text" v-model="searchQuery" placeholder="Search themes..." class="wp-theme-search-input" />
        </div>
        <select class="wp-theme-filter-select">
          <option>All</option>
        </select>
      </div>
      <button class="wp-btn wp-btn-secondary install-theme-btn" @click="triggerFileInput">
        Install new theme
      </button>
      <input type="file" ref="fileInput" @change="handleFileUpload" accept=".zip" style="display: none" />
    </div>

    <div class="wp-themes-tabs">
      <ul class="themes-nav-list">
        <li v-for="tab in tabs" :key="tab">
          <a
            href="#"
            class="nav-tab"
            :class="{ 'nav-tab-active': activeTab === tab }"
            @click.prevent="activeTab = tab"
          >{{ tab }}</a>
        </li>
      </ul>
    </div>

    <!-- Theme grid -->
    <div class="wp-themes-grid">
      <article
        v-for="theme in filteredThemes"
        :key="theme.slug"
        class="wp-theme-card"
        :class="{ 'is-active': theme.is_active }"
        :aria-label="`Theme: ${theme.name}`"
      >
        <!-- Thumbnail -->
        <div class="theme-thumbnail-wrapper">
          <div class="theme-thumbnail">
            <i class="pi pi-image theme-fallback-icon" aria-hidden="true"></i>
            
            <div v-if="theme.is_active" class="active-badge">
              <i class="pi pi-check"></i> Active
            </div>
            
            <!-- Hover overlay -->
            <div class="theme-overlay">
              <button
                v-if="!theme.is_active"
                class="wp-btn wp-btn-primary"
                @click="activateTheme(theme.slug)"
              >Activate</button>
              <button
                v-if="theme.is_active"
                class="wp-btn wp-btn-secondary"
              >Customize</button>
              <button
                class="wp-btn wp-btn-secondary"
                @click="updateTheme(theme.slug)"
              >Update</button>
              <button
                v-if="!theme.is_active"
                class="wp-btn wp-btn-danger"
                @click="deleteTheme(theme.slug)"
              >Delete</button>
            </div>
          </div>
        </div>

        <div class="theme-card-footer">
          <div class="theme-name">{{ theme.name }}</div>
          <div class="theme-status">
            <span class="status-badge status-free">Free</span>
          </div>
        </div>
      </article>

      <!-- Empty state -->
      <div v-if="filteredThemes.length === 0" class="wp-themes-empty">
        No themes found.
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

const themes = ref([]);
const workspaceSlug = 'default';
const fileInput = ref(null);
const searchQuery = ref('');
const activeTab = ref('All');

const tabs = [
    'My Themes', 'Recommended', 'All', 'Blog', 'Portfolio', 'Business', 'Store', 'Art & Design', 'About', 'Real Estate'
];

const filteredThemes = computed(() => {
    let result = themes.value || [];
    
    // Tab filtering
    if (activeTab.value !== 'All' && activeTab.value !== 'My Themes') {
        result = result.filter(theme => {
            if (activeTab.value === 'Recommended') return theme.is_active || theme.slug === 'default-theme';
            const searchStr = `${theme.name} ${theme.description || ''} ${theme.category || ''}`.toLowerCase();
            return searchStr.includes(activeTab.value.toLowerCase());
        });
    }

    // Text search filtering
    if (searchQuery.value.trim() !== '') {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(theme => {
            const searchStr = `${theme.name} ${theme.description || ''} ${theme.author || ''}`.toLowerCase();
            return searchStr.includes(query);
        });
    }

    return result;
});

const triggerFileInput = () => {
    fileInput.value.click();
};

const handleFileUpload = async (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('theme', file);

    try {
        const res = await axios.post(`/api/workspaces/${workspaceSlug}/themes/install`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });
        alert(res.data.message || 'Theme installed successfully!');
        loadThemes();
    } catch (e) {
        console.error('Failed to install theme:', e);
        alert(e.response?.data?.message || 'Failed to install theme.');
    }
    
    // Clear input
    event.target.value = null;
};

const loadThemes = async () => {
    try {
        const res = await axios.get(`/api/workspaces/${workspaceSlug}/themes`);
        themes.value = res.data?.data || [];
    } catch (e) {
        console.error('Failed to load themes:', e);
        themes.value = [];
    }
};

const activateTheme = async (slug) => {
    try {
        await axios.post(`/api/workspaces/${workspaceSlug}/themes/${slug}/activate`);
        loadThemes();
    } catch (e) {
        console.error('Failed to activate theme:', e);
    }
};

const updateTheme = async (slug) => {
    try {
        await axios.post(`/api/workspaces/${workspaceSlug}/themes/${slug}/update`);
        alert('Theme updated successfully.');
        loadThemes();
    } catch (e) {
        console.error('Failed to update theme:', e);
        alert('Failed to update theme.');
    }
};

const deleteTheme = async (slug) => {
    if (!confirm('Are you sure you want to delete this theme? This action cannot be undone.')) return;
    try {
        await axios.delete(`/api/workspaces/${workspaceSlug}/themes/${slug}`);
        alert('Theme deleted successfully.');
        loadThemes();
    } catch (e) {
        console.error('Failed to delete theme:', e);
        alert(e.response?.data?.message || 'Failed to delete theme.');
    }
};

onMounted(() => {
    loadThemes();
});
</script>

<style scoped>
.wp-admin-page {
  padding: 20px;
  background: #f0f0f1;
  min-height: 100vh;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.wp-themes-header h1 {
  font-size: 23px;
  font-weight: 400;
  margin: 0 0 5px;
  color: #1d2327;
}

.wp-themes-header p {
  margin: 0;
  font-size: 13px;
  color: #50575e;
}

.wp-themes-header a {
  color: #2271b1;
  text-decoration: underline;
}

.wp-themes-toolbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
  margin-bottom: 15px;
}

.wp-themes-search-group {
  display: flex;
  align-items: center;
  gap: 10px;
}

.search-input-wrapper {
  position: relative;
}

.search-icon {
  position: absolute;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  color: #8c8f94;
  font-size: 14px;
}

.wp-theme-search-input {
  padding: 0 10px 0 30px;
  height: 32px;
  border: 1px solid #8c8f94;
  border-radius: 4px;
  font-size: 13px;
  width: 250px;
  color: #2c3338;
}

.wp-theme-filter-select {
  height: 32px;
  border: 1px solid #8c8f94;
  border-radius: 4px;
  padding: 0 30px 0 10px;
  font-size: 13px;
  background-color: #fff;
  color: #2c3338;
}

.wp-btn {
  display: inline-block;
  text-decoration: none;
  font-size: 13px;
  line-height: 2.15384615;
  min-height: 30px;
  margin: 0;
  padding: 0 10px;
  cursor: pointer;
  border-width: 1px;
  border-style: solid;
  appearance: none;
  border-radius: 3px;
  white-space: nowrap;
  box-sizing: border-box;
}

.wp-btn-primary {
  background: #2271b1;
  border-color: #2271b1;
  color: #fff;
}

.wp-btn-primary:hover {
  background: #135e96;
  border-color: #135e96;
}

.wp-btn-secondary {
  color: #2271b1;
  border-color: #2271b1;
  background: #f6f7f7;
}

.wp-btn-secondary:hover {
  background: #f0f0f1;
  border-color: #0a4b78;
  color: #0a4b78;
}

.wp-btn-danger {
  color: #d63638;
  border-color: #d63638;
  background: #f6f7f7;
}

.wp-btn-danger:hover {
  background: #d63638;
  color: #fff;
}

.themes-nav-list {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  list-style: none;
  padding: 0;
  margin: 0 0 20px 0;
  border-bottom: 1px solid #c3c4c7;
  padding-bottom: 12px;
}

.nav-tab {
  font-size: 13px;
  color: #50575e;
  text-decoration: none;
  padding: 6px 12px;
  border-radius: 15px;
}

.nav-tab:hover {
  color: #2271b1;
}

.nav-tab-active {
  background: #1d2327;
  color: #fff !important;
}

.wp-themes-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 20px;
}

.wp-theme-card {
  background: #fff;
  border: 1px solid #c3c4c7;
  display: flex;
  flex-direction: column;
  position: relative;
}

.wp-theme-card.is-active {
  border: 2px solid #2271b1;
}

.theme-thumbnail-wrapper {
  position: relative;
  width: 100%;
  padding-top: 66.66%; /* 3:2 aspect ratio */
  background: #f0f0f1;
  overflow: hidden;
}

.theme-thumbnail {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.theme-fallback-icon {
  font-size: 48px;
  color: #dcdcde;
}

.active-badge {
  position: absolute;
  bottom: 0;
  right: 0;
  background: #2271b1;
  color: #fff;
  font-size: 12px;
  padding: 4px 10px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 4px;
}

.theme-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.9);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  opacity: 0;
  transition: opacity 0.2s ease;
}

.wp-theme-card:hover .theme-overlay {
  opacity: 1;
}

.theme-card-footer {
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #fff;
  border-top: 1px solid #f0f0f1;
}

.theme-name {
  font-size: 14px;
  font-weight: 600;
  color: #1d2327;
}

.status-badge {
  font-size: 11px;
  font-weight: 500;
  padding: 3px 8px;
  border-radius: 12px;
}

.status-free {
  background: #f0f0f1;
  color: #1d2327;
}

.wp-themes-empty {
  grid-column: 1 / -1;
  text-align: center;
  padding: 40px;
  color: #50575e;
  font-size: 14px;
}
</style>
