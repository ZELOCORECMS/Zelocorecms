<template>
  <!--
    WP admin-ui: Login page (outside the main Page layout)
    Follows WP wp-login.php visual conventions.
  -->
  <div class="wp-admin-login" role="main">

    <!-- Logo -->
    <div class="wp-admin-login__logo" aria-label="ZelocoreCMS">
      <!-- WP-style logo -->
      <svg width="84" height="84" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" style="display:block; margin:0 auto 8px; fill:var(--wp-admin-text-primary);">
        <path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM1.5 10c0-1.17.24-2.28.67-3.3L5.95 17.1A8.5 8.5 0 0 1 1.5 10zm8.5 8.5a8.46 8.46 0 0 1-2.41-.35L10.4 9.57l2.73 7.48a.5.5 0 0 0 .04.08A8.48 8.48 0 0 1 10 18.5zm1.18-12.66c.52-.03.98-.08.98-.08.46-.06.41-.73-.06-.7 0 0-1.38.11-2.27.11-.84 0-2.24-.11-2.24-.11-.46-.03-.52.67-.06.7 0 0 .44.05.9.08l1.34 3.66-1.88 5.63-3.13-9.29c.52-.03.97-.08.97-.08.46-.06.41-.73-.06-.7 0 0-1.38.11-2.27.11h-.05a8.5 8.5 0 0 1 14.12-.85c-.04 0-.09-.01-.13-.01-.84 0-1.44.73-1.44 1.52 0 .7.41 1.3.84 2 .33.57.7 1.3.7 2.36 0 .73-.28 1.58-.65 2.76l-.85 2.85-3.09-9.19zm2.3 11.73l2.72-7.87c.5-1.26.67-2.27.67-3.17 0-.33-.02-.63-.06-.9A8.5 8.5 0 0 1 18.5 10a8.48 8.48 0 0 1-4.52 7.57z"/>
      </svg>
      ZelocoreCMS
    </div>

    <!-- Login form -->
    <form
      class="wp-admin-login__form"
      id="loginform"
      aria-label="Login to ZelocoreCMS"
      @submit.prevent="login"
    >
      <h1 class="wp-admin-login__title" id="login-heading">Log In</h1>

      <div class="wp-admin-login__field">
        <label for="login-email" class="wp-admin-label">
          Email Address
        </label>
        <input
          id="login-email"
          type="email"
          v-model="email"
          class="wp-admin-input"
          autocomplete="email"
          autofocus
          required
          placeholder="you@example.com"
        />
      </div>

      <div class="wp-admin-login__field">
        <label for="login-password" class="wp-admin-label">
          Password
        </label>
        <input
          id="login-password"
          type="password"
          v-model="password"
          class="wp-admin-input"
          autocomplete="current-password"
          required
        />
      </div>

      <button
        id="btn-login-submit"
        type="submit"
        class="wp-admin-btn wp-admin-btn--primary wp-admin-login__submit"
      >
        Log In
      </button>
    </form>

    <p style="margin-top:16px; font-size:13px; color:var(--wp-admin-text-muted);">
      <a href="/" style="color:var(--wp-admin-theme-color);">← Back to site</a>
    </p>

  </div>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('');
const password = ref('');

const login = () => {
    console.log('login with', email.value, password.value);
};
</script>
