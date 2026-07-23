<template>
  <!--
    WP admin-ui: Breadcrumbs component
    - All items except the last must have a `to` prop
    - The last item (no `to`) is rendered as the page <h1>
    - Matches @wordpress/admin-ui Breadcrumbs API:
        <Breadcrumbs :items="[{ label: 'Home', to: '/' }, { label: 'Current' }]" />
  -->
  <nav
    id="wp-admin-breadcrumbs"
    aria-label="Breadcrumb"
    class="wp-admin-breadcrumbs"
  >
    <template v-for="(item, index) in items" :key="index">
      <!-- Separator before every item except the first -->
      <span v-if="index > 0" class="wp-admin-breadcrumbs__separator" aria-hidden="true">›</span>

      <span class="wp-admin-breadcrumbs__item">
        <!-- Non-last items: render as links -->
        <router-link
          v-if="item.to && index < items.length - 1"
          :to="item.to"
          class="wp-admin-breadcrumbs__link"
        >{{ item.label }}</router-link>

        <!-- Last item without `to`: this IS the h1 -->
        <h1
          v-else-if="!item.to"
          class="wp-admin-breadcrumbs__current"
          aria-current="page"
        >{{ item.label }}</h1>

        <!-- Last item WITH `to` (optional): render as link too -->
        <router-link
          v-else
          :to="item.to"
          class="wp-admin-breadcrumbs__link wp-admin-breadcrumbs__current"
          aria-current="page"
        >{{ item.label }}</router-link>
      </span>
    </template>
  </nav>
</template>

<script setup>
/**
 * AdminBreadcrumbs — WP @wordpress/admin-ui Breadcrumbs component equivalent.
 *
 * Props:
 *   items: Array<{ label: string, to?: string }>
 *     - All items except the last must have `to`.
 *     - The last item without `to` is rendered as an <h1>.
 */
defineProps({
  items: {
    type: Array,
    required: true,
    validator(items) {
      // In dev: warn if a non-last item is missing `to`
      for (let i = 0; i < items.length - 1; i++) {
        if (!items[i].to) {
          console.warn('[AdminBreadcrumbs] Non-last item is missing a `to` prop:', items[i]);
        }
      }
      return true;
    },
  },
});
</script>
