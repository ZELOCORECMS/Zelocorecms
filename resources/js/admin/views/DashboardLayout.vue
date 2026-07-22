<template>
  <div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-900 text-white flex flex-col">
      <div class="p-4 text-2xl font-bold border-b border-gray-800">
        ZelocoreCMS
      </div>
      <div class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1">
          <li>
            <router-link to="/admin" class="block px-4 py-2 hover:bg-gray-800" active-class="bg-gray-800 text-blue-400">Dashboard</router-link>
          </li>
          <li>
            <router-link to="/admin/content-types" class="block px-4 py-2 hover:bg-gray-800" active-class="bg-gray-800 text-blue-400">Content Types</router-link>
          </li>
          <li>
            <router-link to="/admin/themes" class="block px-4 py-2 hover:bg-gray-800" active-class="bg-gray-800 text-blue-400">Themes</router-link>
          </li>
          <li class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase mt-4">Content</li>
          <li>
            <router-link to="/admin/content/blog-post" class="block px-4 py-2 hover:bg-gray-800" active-class="bg-gray-800 text-blue-400">Blog Posts</router-link>
          </li>
        </ul>
      </div>
      <div class="p-4 border-t border-gray-800 text-sm">
        <a href="#" class="text-gray-400 hover:text-white flex items-center gap-2">
          <i class="pi pi-sign-out"></i> Logout
        </a>
      </div>
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Header -->
      <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6">
        <div class="font-semibold text-gray-700">Admin Panel</div>
        <div class="flex items-center gap-4">
            <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">A</div>
        </div>
      </header>
      
      <!-- Content area -->
      <main class="flex-1 overflow-y-auto">
        <router-view />
      </main>
    </div>
  </div>
</template>

<script setup>
</script>
