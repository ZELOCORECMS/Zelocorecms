<template>
  <!--
    WP admin-ui: Page component
    Provides the full admin layout with NavigableRegion landmarks:
      - role="banner"       → top header bar
      - role="navigation"   → sidebar nav (NavigableRegion)
      - role="main"         → content area (NavigableRegion)
    Matches the @wordpress/admin-ui Page + NavigableRegion pattern.
  -->

  <!-- Accessibility: skip-link (WP admin convention) -->
  <a class="wp-admin-skip-link" href="#wp-admin-main">Skip to main content</a>

  <div class="wp-admin-page">

    <!-- ── NavigableRegion: Header (role="banner") ──────────────── -->
    <header
      role="banner"
      class="wp-admin-header"
      aria-label="ZelocoreCMS Admin Toolbar"
    >
      <!-- Mobile hamburger -->
      <button
        class="wp-admin-header__toolbar-btn"
        aria-label="Toggle sidebar navigation"
        @click="toggleMobileSidebar"
        style="display:none"
        ref="mobileToggle"
      >
        <i class="pi pi-bars"></i>
      </button>

      <!-- Left Group: Logo, Site Name, Comments, New, Launch -->
      <div class="wp-admin-header__toolbar" role="toolbar" aria-label="Toolbar Left">
        <router-link to="/admin" class="wp-admin-header__toolbar-btn wp-admin-header__logo-only" title="ZelocoreCMS">
          <img :src="logoDarkUrl" alt="Zelocore Logo" style="height: 18px; width: auto;" />
        </router-link>

        <a href="/" target="_blank" class="wp-admin-header__toolbar-btn" title="Visit Site">
          <i class="pi pi-home" aria-hidden="true"></i>
          <span>Zelocore</span>
        </a>

        <router-link to="/admin/comments" class="wp-admin-header__toolbar-btn" title="0 Comments in moderation">
          <i class="pi pi-comments" aria-hidden="true"></i>
          <span>0</span>
        </router-link>

        <router-link to="/admin/content/blog-post/new" class="wp-admin-header__toolbar-btn" title="Add New">
          <i class="pi pi-plus" aria-hidden="true"></i>
          <span>New</span>
        </router-link>
        
        <!-- Launch site button (Blue) -->
        <a href="/" class="wp-admin-header__toolbar-btn" style="background-color: var(--wp-admin-theme-color); color: #fff; border-radius: 2px; margin-left: 8px;">
          <i class="pi pi-rocket" aria-hidden="true"></i>
          <span>Launch site</span>
        </a>
      </div>

      <div class="wp-admin-header__spacer"></div>

      <!-- Right Group: Cart, Reader, Help, Notifications, Profile -->
      <div class="wp-admin-header__toolbar" role="toolbar" aria-label="Toolbar Right">
        <a href="#" class="wp-admin-header__toolbar-btn" title="Store">
          <i class="pi pi-shopping-cart" aria-hidden="true"></i>
        </a>
        
        <a href="#" class="wp-admin-header__toolbar-btn" title="Reader">
          <i class="pi pi-book" aria-hidden="true"></i>
          <span>Reader</span>
        </a>

        <a href="#" class="wp-admin-header__toolbar-btn" title="Help">
          <i class="pi pi-question-circle" aria-hidden="true"></i>
        </a>

        <a href="#" class="wp-admin-header__toolbar-btn" title="Notifications">
          <i class="pi pi-bell" aria-hidden="true"></i>
        </a>

        <!-- User profile -->
        <div class="wp-admin-header__toolbar-btn wp-admin-header__profile" role="button" tabindex="0" aria-label="User profile">
          <span>Howdy, Admin</span>
          <div class="wp-admin-header__avatar" style="margin-left: 8px;">A</div>
        </div>
      </div>
    </header>

    <!-- ── Body: sidebar + content ───────────────────────────────── -->
    <div class="wp-admin-body">

      <!-- ── NavigableRegion: Sidebar Navigation ──────────────────── -->
      <nav
        id="adminmenu"
        role="navigation"
        aria-label="Main menu"
        class="wp-admin-sidebar"
        :class="{
          'wp-admin-sidebar--collapsed': sidebarCollapsed,
          'wp-admin-sidebar--mobile-open': mobileSidebarOpen
        }"
      >
        <!-- ── Home group ───────────────────────────────────────── -->
        <ul class="wp-admin-sidebar__menu" role="list">
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin"
              class="wp-admin-sidebar__menu-link"
              exact-active-class="is-active"
              :title="sidebarCollapsed ? 'Dashboard' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-home"></i></span>
              <span class="wp-admin-sidebar__menu-text">My Home</span>
            </router-link>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/updates"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Updates' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-refresh"></i></span>
              <span class="wp-admin-sidebar__menu-text">Updates</span>
              <span v-if="!sidebarCollapsed && updateCount > 0" class="wp-admin-sidebar__badge">{{ updateCount }}</span>
            </router-link>
          </li>
        </ul>

        <div class="wp-admin-sidebar__separator" role="separator" aria-hidden="true"></div>

        <!-- ── Stats ─────────────────────────────────────────────── -->
        <ul class="wp-admin-sidebar__menu" role="list">
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/stats"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Stats' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-chart-bar"></i></span>
              <span class="wp-admin-sidebar__menu-text">Stats</span>
            </router-link>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/hosting"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Hosting' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-server"></i></span>
              <span class="wp-admin-sidebar__menu-text">Hosting</span>
              <i v-if="!sidebarCollapsed" class="pi pi-external-link wp-admin-sidebar__ext" aria-hidden="true" style="margin-left: auto; font-size: 10px; color: var(--wp-admin-text-muted);"></i>
            </router-link>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/upgrades"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Upgrades' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-arrow-circle-up"></i></span>
              <span class="wp-admin-sidebar__menu-text">Upgrades</span>
            </router-link>
          </li>
        </ul>

        <div class="wp-admin-sidebar__separator" role="separator" aria-hidden="true"></div>

        <!-- ── Content ───────────────────────────────────────────── -->
        <ul class="wp-admin-sidebar__menu" role="list">

          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/content/blog-post"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Posts' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-file"></i></span>
              <span class="wp-admin-sidebar__menu-text">Posts</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/content/blog-post" class="wp-admin-sidebar__submenu-link">All Posts</router-link></li>
              <li><router-link to="/admin/content/blog-post/new" class="wp-admin-sidebar__submenu-link">Add New</router-link></li>
              <li><router-link to="/admin/content/categories" class="wp-admin-sidebar__submenu-link">Categories</router-link></li>
              <li><router-link to="/admin/content/tags" class="wp-admin-sidebar__submenu-link">Tags</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/media"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Media' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-images"></i></span>
              <span class="wp-admin-sidebar__menu-text">Media</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/media" class="wp-admin-sidebar__submenu-link">Library</router-link></li>
              <li><router-link to="/admin/media/new" class="wp-admin-sidebar__submenu-link">Add New</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/pages"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Pages' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-copy"></i></span>
              <span class="wp-admin-sidebar__menu-text">Pages</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/pages" class="wp-admin-sidebar__submenu-link">All Pages</router-link></li>
              <li><router-link to="/admin/pages/new" class="wp-admin-sidebar__submenu-link">Add New</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/comments"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Comments' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-comments"></i></span>
              <span class="wp-admin-sidebar__menu-text">Comments</span>
            </router-link>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/feedback"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Feedback' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-inbox"></i></span>
              <span class="wp-admin-sidebar__menu-text">Feedback</span>
            </router-link>
          </li>
        </ul>

        <div class="wp-admin-sidebar__separator" role="separator" aria-hidden="true"></div>

        <!-- ── Appearance / System ───────────────────────────────── -->
        <ul class="wp-admin-sidebar__menu" role="list">
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/themes"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Appearance' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-palette"></i></span>
              <span class="wp-admin-sidebar__menu-text">Appearance</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/themes" class="wp-admin-sidebar__submenu-link">Themes</router-link></li>
              <li><router-link to="/admin/customize" class="wp-admin-sidebar__submenu-link">Customize</router-link></li>
              <li><router-link to="/admin/widgets" class="wp-admin-sidebar__submenu-link">Widgets</router-link></li>
              <li><router-link to="/admin/menus" class="wp-admin-sidebar__submenu-link">Menus</router-link></li>
              <li><router-link to="/admin/theme-editor" class="wp-admin-sidebar__submenu-link">Theme File Editor</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/plugins"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Plugins' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-box"></i></span>
              <span class="wp-admin-sidebar__menu-text">Plugins</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/plugins" class="wp-admin-sidebar__submenu-link">Installed Plugins</router-link></li>
              <li><router-link to="/admin/plugins/new" class="wp-admin-sidebar__submenu-link">Add New</router-link></li>
              <li><router-link to="/admin/plugin-editor" class="wp-admin-sidebar__submenu-link">Plugin File Editor</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/users"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Users' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-users"></i></span>
              <span class="wp-admin-sidebar__menu-text">Users</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/users" class="wp-admin-sidebar__submenu-link">All Users</router-link></li>
              <li><router-link to="/admin/users/new" class="wp-admin-sidebar__submenu-link">Add New</router-link></li>
              <li><router-link to="/admin/profile" class="wp-admin-sidebar__submenu-link">Profile</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/tools"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Tools' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-wrench"></i></span>
              <span class="wp-admin-sidebar__menu-text">Tools</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/tools" class="wp-admin-sidebar__submenu-link">Available Tools</router-link></li>
              <li><router-link to="/admin/tools/import" class="wp-admin-sidebar__submenu-link">Import</router-link></li>
              <li><router-link to="/admin/tools/export" class="wp-admin-sidebar__submenu-link">Export</router-link></li>
              <li><router-link to="/admin/tools/site-health" class="wp-admin-sidebar__submenu-link">Site Health</router-link></li>
              <li><router-link to="/admin/tools/export-personal-data" class="wp-admin-sidebar__submenu-link">Export Personal Data</router-link></li>
              <li><router-link to="/admin/tools/erase-personal-data" class="wp-admin-sidebar__submenu-link">Erase Personal Data</router-link></li>
            </ul>
          </li>
          <li class="wp-admin-sidebar__menu-item" role="listitem">
            <router-link
              to="/admin/settings"
              class="wp-admin-sidebar__menu-link"
              active-class="is-active"
              :title="sidebarCollapsed ? 'Settings' : undefined"
            >
              <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-cog"></i></span>
              <span class="wp-admin-sidebar__menu-text">Settings</span>
            </router-link>
            <ul class="wp-admin-sidebar__submenu">
              <li><router-link to="/admin/settings" class="wp-admin-sidebar__submenu-link">General</router-link></li>
              <li><router-link to="/admin/settings/writing" class="wp-admin-sidebar__submenu-link">Writing</router-link></li>
              <li><router-link to="/admin/settings/reading" class="wp-admin-sidebar__submenu-link">Reading</router-link></li>
              <li><router-link to="/admin/settings/discussion" class="wp-admin-sidebar__submenu-link">Discussion</router-link></li>
              <li><router-link to="/admin/settings/media" class="wp-admin-sidebar__submenu-link">Media</router-link></li>
              <li><router-link to="/admin/settings/permalinks" class="wp-admin-sidebar__submenu-link">Permalinks</router-link></li>
              <li><router-link to="/admin/settings/privacy" class="wp-admin-sidebar__submenu-link">Privacy</router-link></li>
            </ul>
          </li>
        </ul>

        <!-- ── Footer: Collapse menu + Logout ───────────────────── -->
        <div class="wp-admin-sidebar__footer">
          <ul class="wp-admin-sidebar__menu" role="list">
            <li class="wp-admin-sidebar__menu-item" role="listitem">
              <button
                class="wp-admin-sidebar__menu-link wp-admin-sidebar__collapse-btn-bottom"
                :aria-label="sidebarCollapsed ? 'Expand menu' : 'Collapse menu'"
                :title="sidebarCollapsed ? 'Expand menu' : 'Collapse menu'"
                @click="toggleSidebar"
                style="background: transparent; border: none; width: 100%; text-align: left; padding: 0; cursor: pointer; color: inherit;"
              >
                <span class="wp-admin-sidebar__menu-icon" aria-hidden="true">
                  <i class="pi" :class="sidebarCollapsed ? 'pi-angle-double-right' : 'pi-angle-double-left'"></i>
                </span>
                <span class="wp-admin-sidebar__menu-text">Collapse menu</span>
              </button>
            </li>
            <li class="wp-admin-sidebar__menu-item" role="listitem">
              <a
                href="#"
                class="wp-admin-sidebar__menu-link"
                :title="sidebarCollapsed ? 'Log Out' : undefined"
                @click.prevent="logout"
              >
                <span class="wp-admin-sidebar__menu-icon" aria-hidden="true"><i class="pi pi-sign-out"></i></span>
                <span class="wp-admin-sidebar__menu-text">Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- ── NavigableRegion: Main Content ────────────────────────── -->
      <div class="wp-admin-content" role="region" aria-label="Main content">
        <main
          id="wp-admin-main"
          class="wp-admin-main"
          tabindex="-1"
        >
          <!-- Child views (Dashboard, ContentList, etc.) render here -->
          <router-view />
        </main>
      </div>

    </div><!-- /.wp-admin-body -->
  </div><!-- /.wp-admin-page -->
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

/** Sidebar collapsed state (desktop) */
// Public asset path — not bundled by Vite, served directly from public/
const logoDarkUrl = '/logo-dark.png';

const sidebarCollapsed = ref(false);
/** Mobile sidebar open state */
const mobileSidebarOpen = ref(false);
const mobileToggle = ref(null);
const updateCount = ref(2); // Example update count

function toggleSidebar() {
  sidebarCollapsed.value = !sidebarCollapsed.value;
}

function toggleMobileSidebar() {
  mobileSidebarOpen.value = !mobileSidebarOpen.value;
}

function logout() {
  window.location.href = '/admin/logout';
}

/** Show mobile toggle on small screens */
function updateMobileToggleVisibility() {
  if (mobileToggle.value) {
    mobileToggle.value.style.display = window.innerWidth <= 782 ? 'flex' : 'none';
  }
}

onMounted(() => {
  updateMobileToggleVisibility();
  window.addEventListener('resize', updateMobileToggleVisibility);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateMobileToggleVisibility);
});
</script>
