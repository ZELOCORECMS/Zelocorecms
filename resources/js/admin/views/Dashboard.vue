<template>
  <AdminBreadcrumbs :items="[{ label: 'Dashboard' }]" />

  <div class="dash-wrap">

    <!-- ══ ROW 1: Full-width setup notice (when incomplete) ══ -->
    <div class="dash-notice" v-if="!setupComplete">
      <i class="pi pi-info-circle" aria-hidden="true"></i>
      Your site is not yet live. Complete the setup steps below.
      <button class="dash-notice__dismiss" @click="setupComplete = true" aria-label="Dismiss">×</button>
    </div>

    <!-- ══ MAIN GRID: left column (wider) + right column ══ -->
    <div class="dash-grid">

      <!-- ─── LEFT COLUMN ─────────────────────────────────── -->
      <div class="dash-col dash-col--left">

        <!-- 1. Site Setup -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.setup }">
          <div class="dash-widget__header" @click="toggle('setup')">
            <span class="dash-widget__title">Site Setup</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.setup ? 'Expand' : 'Collapse'" :title="collapsed.setup ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.setup ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.setup">
            <ul class="dash-setup-list">
              <li v-for="step in setupSteps" :key="step.label" class="dash-setup-item" :class="{ 'dash-setup-item--done': step.done }">
                <span class="dash-setup-item__check">
                  <i class="pi" :class="step.done ? 'pi-check' : 'pi-circle'" aria-hidden="true"></i>
                </span>
                <div class="dash-setup-item__body">
                  <router-link v-if="step.to" :to="step.to" class="dash-setup-item__label">{{ step.label }}</router-link>
                  <span v-else class="dash-setup-item__label dash-setup-item__label--done">{{ step.label }}</span>
                  <span v-if="step.badge" class="dash-badge dash-badge--blue">{{ step.badge }}</span>
                </div>
                <i class="pi pi-chevron-right dash-setup-item__arrow" v-if="!step.done" aria-hidden="true"></i>
              </li>
            </ul>
          </div>
        </div>

        <!-- 2. At a Glance -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.glance }">
          <div class="dash-widget__header" @click="toggle('glance')">
            <span class="dash-widget__title">At a Glance</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.glance ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.glance ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.glance">
            <div class="dash-glance-counts">
              <router-link to="/admin/content/blog-post" class="dash-glance-stat">
                <i class="pi pi-file" aria-hidden="true"></i>
                <strong>{{ glance.posts }}</strong> Content Items
              </router-link>
              <router-link to="/admin/content-types" class="dash-glance-stat">
                <i class="pi pi-list" aria-hidden="true"></i>
                <strong>{{ glance.types }}</strong> Content Types
              </router-link>
              <router-link to="/admin/themes" class="dash-glance-stat">
                <i class="pi pi-palette" aria-hidden="true"></i>
                <strong>{{ glance.themes }}</strong> Themes
              </router-link>
            </div>
            <div class="dash-glance-meta">
              <p>
                <i class="pi pi-desktop" aria-hidden="true"></i>
                ZelocoreCMS running
                <router-link to="/admin/themes" class="dash-link">{{ glance.activeTheme }}</router-link>
                theme.
              </p>
            </div>
            <div class="dash-glance-storage">
              <div class="dash-glance-storage__item">
                <i class="pi pi-database" aria-hidden="true"></i>
                <span>{{ glance.storage }} Storage Used</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Activity -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.activity }">
          <div class="dash-widget__header" @click="toggle('activity')">
            <span class="dash-widget__title">Activity</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.activity ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.activity ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.activity">
            <h3 class="dash-activity-heading">Recently Published</h3>
            <ul class="dash-activity-list" v-if="recentActivity.length">
              <li v-for="item in recentActivity" :key="item.id" class="dash-activity-item">
                <span class="dash-activity-item__date">{{ item.date }}</span>
                <router-link :to="item.to" class="dash-link">{{ item.title }}</router-link>
              </li>
            </ul>
            <p v-else class="dash-empty-text">No published content yet.</p>
          </div>
        </div>

        <!-- 4. Content Stats (= Jetpack Stats equivalent) -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.stats }">
          <div class="dash-widget__header" @click="toggle('stats')">
            <span class="dash-widget__title">Content Stats</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.stats ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.stats ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.stats">
            <!-- Period tabs -->
            <div class="dash-tabs" role="tablist" aria-label="Stats period">
              <button
                v-for="period in statPeriods"
                :key="period"
                class="dash-tab"
                :class="{ 'dash-tab--active': activePeriod === period }"
                role="tab"
                :aria-selected="activePeriod === period"
                @click="activePeriod = period"
              >{{ period }}</button>
            </div>

            <!-- Chart placeholder -->
            <div class="dash-chart-placeholder">
              <i class="pi pi-chart-bar" aria-hidden="true" style="font-size:32px; color:var(--wp-admin-text-muted);"></i>
              <p>Once content is published, this chart will show views and traffic details.</p>
            </div>

            <!-- 7-day highlights -->
            <div class="dash-highlights">
              <h4 class="dash-highlights__title">7 Day Highlights</h4>
              <div class="dash-tabs" role="tablist" aria-label="Highlights view">
                <button
                  v-for="tab in highlightTabs"
                  :key="tab"
                  class="dash-tab"
                  :class="{ 'dash-tab--active': activeHighlight === tab }"
                  role="tab"
                  :aria-selected="activeHighlight === tab"
                  @click="activeHighlight = tab"
                >{{ tab }}</button>
              </div>
              <p class="dash-empty-text" style="margin-top:12px;">No data to show</p>
              <a href="#" class="dash-link" style="font-size:12px;">View all content stats</a>
            </div>
          </div>
        </div>

      </div><!-- /.dash-col--left -->

      <!-- ─── RIGHT COLUMN ──────────────────────────────────── -->
      <div class="dash-col dash-col--right">

        <!-- 5. Site Overview (= WP "Site" widget) -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.site }">
          <div class="dash-widget__header" @click="toggle('site')">
            <span class="dash-widget__title">Site Overview</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.site ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.site ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.site">
            <!-- Site preview thumbnail -->
            <div class="dash-site-preview">
              <div class="dash-site-preview__bar">
                <span class="dash-site-preview__dot"></span>
                <span class="dash-site-preview__dot"></span>
                <span class="dash-site-preview__dot"></span>
                <span class="dash-site-preview__url">{{ siteUrl }}</span>
              </div>
              <div class="dash-site-preview__screen">
                <div class="dash-site-preview__mockup">
                  <div class="dash-site-preview__mockup-header"></div>
                  <div class="dash-site-preview__mockup-body">
                    <div class="dash-site-preview__mockup-line" style="width:60%"></div>
                    <div class="dash-site-preview__mockup-line" style="width:80%"></div>
                    <div class="dash-site-preview__mockup-line" style="width:40%"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dash-site-meta">
              <div class="dash-site-meta__logo">
                <img :src="logoUrl" alt="Zelocore" style="height:24px;width:auto;">
              </div>
              <div class="dash-site-meta__info">
                <div style="font-weight:600; font-size:13px;">Zelocore</div>
                <a :href="siteUrl" target="_blank" class="dash-link" style="font-size:12px;">{{ siteUrl }}</a>
              </div>
              <div class="dash-site-meta__actions">
                <a :href="siteUrl" target="_blank" class="wp-admin-btn wp-admin-btn--secondary" style="font-size:12px; height:28px;">
                  <i class="pi pi-external-link" aria-hidden="true"></i> View Site
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- 6. Quick Draft -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.draft }">
          <div class="dash-widget__header" @click="toggle('draft')">
            <span class="dash-widget__title">Quick Draft</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.draft ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.draft ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.draft">
            <div class="dash-form-field">
              <label for="draft-title" class="dash-form-label">Title</label>
              <input
                id="draft-title"
                type="text"
                v-model="draft.title"
                class="wp-admin-input"
                placeholder="Enter a title..."
              />
            </div>
            <div class="dash-form-field" style="margin-top:10px;">
              <label for="draft-content" class="dash-form-label">Content</label>
              <textarea
                id="draft-content"
                v-model="draft.content"
                class="wp-admin-input"
                rows="5"
                placeholder="What's on your mind?"
                style="resize:vertical;"
              ></textarea>
            </div>
            <button
              id="btn-save-draft"
              class="wp-admin-btn wp-admin-btn--primary"
              style="margin-top:10px;"
              @click="saveDraft"
            >
              Save Draft
            </button>
          </div>
        </div>

        <!-- 7. Recent Updates / News (= WP Events and News) -->
        <div class="dash-widget" :class="{ 'dash-widget--collapsed': collapsed.news }">
          <div class="dash-widget__header" @click="toggle('news')">
            <span class="dash-widget__title">Zelocore News &amp; Updates</span>
            <div class="dash-widget__controls">
              <button class="dash-widget__btn" :aria-label="collapsed.news ? 'Expand' : 'Collapse'">
                <i class="pi" :class="collapsed.news ? 'pi-chevron-down' : 'pi-chevron-up'" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="dash-widget__body" v-show="!collapsed.news">
            <ul class="dash-news-list">
              <li v-for="item in newsItems" :key="item.title" class="dash-news-item">
                <a :href="item.url" target="_blank" class="dash-link">{{ item.title }}</a>
              </li>
            </ul>
          </div>
        </div>

      </div><!-- /.dash-col--right -->

    </div><!-- /.dash-grid -->
  </div><!-- /.dash-wrap -->
</template>

<script setup>
import { ref, reactive } from 'vue';
import AdminBreadcrumbs from '../components/AdminBreadcrumbs.vue';

const logoUrl = '/logo-dark.png';
const siteUrl = window.location.origin;

/* ── Setup completion notice ── */
const setupComplete = ref(false);

const setupSteps = reactive([
  { label: 'Create your first post', to: '/admin/content/blog-post', done: false },
  { label: 'Install a theme',                to: '/admin/themes',        done: false },
  { label: 'Publish your first content',     to: '/admin/content/blog-post', done: false },
  { label: 'Configure site settings',        to: '/admin/settings',      done: false },
]);

/* ── Widget collapse state ── */
const collapsed = reactive({
  setup:    false,
  glance:   false,
  activity: false,
  stats:    false,
  site:     false,
  draft:    false,
  news:     false,
});
function toggle(key) { collapsed[key] = !collapsed[key]; }

/* ── At a Glance data ── */
const glance = reactive({
  posts: 0,
  types: 0,
  themes: 0,
  activeTheme: 'Default',
  storage: '0 MB',
});

/* ── Activity ── */
const recentActivity = ref([]);

/* ── Stats ── */
const statPeriods   = ['Days', 'Weeks', 'Months', 'Years'];
const activePeriod  = ref('Days');
const highlightTabs = ['Top Content', 'Top Referrers'];
const activeHighlight = ref('Top Content');

/* ── Quick Draft ── */
const draft = reactive({ title: '', content: '' });
function saveDraft() {
  if (!draft.title.trim()) return;
  alert(`Draft "${draft.title}" saved!`);
  draft.title = '';
  draft.content = '';
}

/* ── News ── */
const newsItems = ref([
  { title: 'ZelocoreCMS v1.0 released — getting started guide', url: '#' },
  { title: 'How to create custom content types in ZelocoreCMS', url: '#' },
  { title: 'Theme development documentation now available', url: '#' },
  { title: 'REST API endpoints for content management', url: '#' },
  { title: 'Community forum now open for discussions', url: '#' },
]);
</script>
