<template>
  <!-- WP admin-ui: Root app — router-view renders either Login or DashboardLayout (Page) -->
  <router-view />
</template>

<script setup>
// Root component — layout selection is handled by the router.
// DashboardLayout.vue = @wordpress/admin-ui Page component.
// Login.vue = standalone login (outside Page layout).
</script>
