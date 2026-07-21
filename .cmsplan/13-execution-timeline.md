# ⏱️ ZELOCORECMS — Execution Timeline (PHP | Solo Founder Edition)

> **Document 13 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: PHP 8.2+ | Solo Founder | GPL v2+**

---

## 1. Solo Founder Reality Check

As a solo founder, the **most dangerous mistake** is building too much before shipping. The timeline below is structured around:

1. **Ship fast, ship often** — real users find real bugs
2. **Ruthless scope control** — "Not v1.0" list is sacred
3. **Sustainable pace** — you must still be alive in Month 12
4. **AI assistance** — Use AI (GitHub Copilot, etc.) as your force multiplier

**Estimated hours per week:** 30–40 hours (full-time equivalent)

---

## 2. High-Level Timeline Overview

```
Month:  1    2    3    4    5    6    7    8    9   10   11   12
        │    │    │    │    │    │    │    │    │    │    │    │
Phase:  [──────────── PHASE 1: FOUNDATION ──────────────────────]
                                              [── PHASE 2 START ─]
        [─ CORE BUILD ──][─ ALPHA ─][─ BETA ─][── v1.0 LIVE ────]
Stars:  0   100  300  1K   2K   5K  8K  12K  16K  20K  28K  40K
MRR:    $0   $0   $0   $0  $1K  $3K  $6K $10K $12K $15K $18K $25K
Installs: 0  0   10   50  200  1K   3K   5K   8K  12K  18K  25K
```

---

## 3. Month-by-Month Execution Plan

### 🔵 MONTH 1: Core Foundation

**Goal:** PHP skeleton running. Database connected. Basic request/response cycle.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Initialize Git repository, GPL v2+ license, README | 🔴 |
| W1 | Set up Composer project, PSR-4 autoloading, PHPUnit | 🔴 |
| W1 | Set up GitHub Actions CI (lint + test pipeline) | 🔴 |
| W1 | Set up development Docker environment | 🟠 |
| W2 | Design and implement MySQL database schema (all 10 core tables) | 🔴 |
| W2 | Set up Phinx migrations, run initial migration | 🔴 |
| W2 | Implement DI container (PHP-DI) + service provider | 🟠 |
| W3 | Implement HTTP kernel (Slim + FastRoute) | 🔴 |
| W3 | Implement `.env` configuration loading | 🔴 |
| W3 | Implement Eloquent ORM connection + base models | 🔴 |
| W4 | Implement Auth: registration, login, logout (session-based) | 🔴 |
| W4 | Implement Argon2id password hashing | 🔴 |
| W4 | Implement CSRF protection middleware | 🔴 |
| W4 | Write unit tests for Auth module (target: 80% coverage) | 🟠 |

**Week 4 Milestone:** Can create a user, login, and get a valid session. API returns 401 for unauthenticated requests.

---

### 🔵 MONTH 2: Content Engine

**Goal:** Core content management working end-to-end via API.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Implement Content Type builder (define types via JSON schema) | 🔴 |
| W1 | Implement Workspace model + workspace isolation | 🔴 |
| W2 | Implement Content CRUD API (REST: GET, POST, PATCH, DELETE) | 🔴 |
| W2 | Implement content validation against field schema | 🔴 |
| W3 | Implement 10 core field types: text, richtext, number, boolean, date, select, slug, media, relation, tags | 🔴 |
| W3 | Implement content status workflow (draft → published → archived) | 🔴 |
| W4 | Implement RBAC (roles, permissions, workspace members) | 🔴 |
| W4 | JWT authentication for REST API | 🔴 |
| W4 | Implement content versioning (save every change) | 🟠 |

**Week 8 Milestone:** Can create content types via API and manage content with role-based access control.

---

### 🔵 MONTH 3: Admin UI + Media

**Goal:** Working admin dashboard. Media uploads. Not pretty yet — functional.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Set up Vue.js 3 admin project (Vite + PrimeVue) | 🔴 |
| W1 | Build admin shell: login page, sidebar, header layout | 🔴 |
| W2 | Build Content Type List + Create views | 🔴 |
| W2 | Build Content List view (filterable table) | 🔴 |
| W3 | Build Content Edit form (dynamic — auto-generated from schema) | 🔴 |
| W3 | Integrate TipTap rich text editor | 🔴 |
| W4 | Implement Media Library (PHP upload + GD processing) | 🔴 |
| W4 | Build Media Library UI (grid view, upload dialog) | 🔴 |
| W4 | Compile Vue.js admin to `public/admin/` dist | 🔴 |

**Week 12 Milestone:** Can log in to admin, create a content type, manage content, and upload images. Everything works on a plain shared hosting environment.

---

### 🔵 MONTH 4: Plugin System + SEO + CLI

**Goal:** Plugin system. Official plugins. CLI tool. Alpha-ready.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Implement Hook System (addAction, doAction, addFilter, applyFilters) | 🔴 |
| W1 | Implement Plugin Manager (load, activate, deactivate plugins) | 🔴 |
| W2 | Implement **Tier 1 Plugin Sandbox** (PHP-level isolation) | 🔴 |
| W2 | Build `zelocms-seo` official plugin (SEO fields, sitemap, Open Graph) | 🔴 |
| W3 | Build `zelocms-forms` official plugin (contact forms, spam protection) | 🔴 |
| W3 | Build `zelocms-sitemap` official plugin (XML sitemap auto-generation) | 🔴 |
| W3 | Implement SEO module (built-in schema fields, auto-meta) | 🔴 |
| W4 | Build **ZeloCLI** PHP CLI tool (install, migrate, plugin:install) | 🟠 |
| W4 | Write installation guide (shared hosting step-by-step) | 🟠 |
| W4 | **PRIVATE ALPHA LAUNCH** — invite 50 developers | 🔴 |

**Week 16 Milestone:** Plugin system working with isolation. Three official plugins ship. Alpha users can install and test.

---

### 🔵 MONTH 5: WP Migration + GraphQL + Beta

**Goal:** ZeloMigrate v1. GraphQL API. Public beta launch.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Implement GraphQL API (webonyx/graphql-php, auto-schema from content types) | 🟠 |
| W1 | Implement i18n module (multi-language content fields) | 🟡 |
| W2 | Build **ZeloMigrate WordPress** importer (posts, pages, users, media, taxonomy) | 🔴 |
| W2 | Test WP migration on 5 real WordPress sites | 🔴 |
| W3 | Fix all alpha bugs (focus on alpha user feedback) | 🔴 |
| W3 | Write developer documentation (Getting Started, API Reference, Plugin Dev) | 🔴 |
| W4 | Security review: auth, CSRF, SQL injection, XSS | 🔴 |
| W4 | **PUBLIC BETA LAUNCH** (Product Hunt "Coming Soon" + GitHub public) | 🔴 |

**Week 20 Milestone:** Public beta live. WordPress migration working. 500+ beta users.

---

### 🔵 MONTH 6: v1.0 General Availability

**Goal:** Production-ready v1.0 release.

| Week | Tasks | Priority |
|------|-------|----------|
| W1 | Final QA pass — all features, edge cases, error messages | 🔴 |
| W1 | Performance testing (simulate 100 concurrent API requests) | 🔴 |
| W1 | Test on 5 different hosting environments (cPanel, Plesk, VPS, Docker, Cloudways) | 🔴 |
| W2 | Polish admin UI (dark mode, responsive, error states, loading states) | 🔴 |
| W2 | Write all documentation (100% feature coverage) | 🔴 |
| W2 | Record 3-minute demo video | 🟠 |
| W3 | **v1.0 RELEASE** — GitHub tag + Packagist publish | 🔴 |
| W3 | Product Hunt launch | 🔴 |
| W3 | Hacker News "Show HN" post | 🔴 |
| W3 | Blog post: "ZELOCORECMS 1.0 — The CMS that competes with everyone" | 🔴 |
| W4 | Email blast to all waitlist + beta users | 🔴 |
| W4 | Respond to every GitHub issue and Discord question (launch week) | 🔴 |

**Week 24 Milestone:** v1.0 live. Target: 5,000 GitHub stars. 100+ paying Cloud customers.

---

### 🟠 MONTHS 7–9: Ecosystem & Tier 2/3 Security

| Month | Focus | Key Deliverable |
|-------|-------|----------------|
| M7 | **Bug fixes + v1.1** | All alpha/beta bugs resolved, v1.1 release |
| M7 | **Tier 2 Security** | PHP-FPM pool isolation (VPS hosting) |
| M8 | **ZeloMigrate v2** | Strapi + Ghost migration tools |
| M8 | **Plugin Challenge** | Community plugin development ($500 prize) |
| M8 | **Webhooks** | Database-backed webhook delivery |
| M9 | **Queue System** | Database queue (shared hosting) + Redis queue (VPS) |
| M9 | **Admin Polish** | Real-time form validation, keyboard shortcuts, dark mode |
| M9 | **ZELOCORECMS Cloud beta** | Managed hosting launch |

---

### 🟠 MONTHS 10–12: Enterprise + Phase 2 Kickoff

| Month | Focus | Key Deliverable |
|-------|-------|----------------|
| M10 | **Hacktoberfest** | 50 good-first-issues for community sprint |
| M10 | **Tier 3 Security** | Docker container isolation for plugins |
| M10 | **SAML/SSO** | Enterprise SSO integration (all free to self-host) |
| M11 | **Multi-tenant** | Full workspace isolation for agency/SaaS use |
| M11 | **Year 1 retrospective** | Community survey + 2026 roadmap reveal |
| M12 | **ZeloAI v1** | Content generation + SEO analysis (BYOK — bring your own API key) |
| M12 | **Phase 2 start** | ZeloBuilder visual editor begins development |
| M12 | **v1.5 release** | AI features, SSO, multi-tenant |

---

## 4. The "Not v1.0" List (Sacred — Do NOT Build These Early)

These features will NOT be in v1.0 no matter how tempting:

| Feature | Defer To |
|---------|---------|
| ZeloBuilder visual editor | v2.0 |
| ZeloCommerce module | v2.5 |
| Real-time collaboration | v2.0 |
| Personalization engine | v3.0 |
| Mobile SDK | v3.0 |
| Multi-tenant billing | v1.5 |
| AI content generation | v1.5 |
| Redis queue | v1.1 |
| Docker plugin isolation (Tier 3) | v1.2 |

---

## 5. Resource Plan (Solo Founder)

### Tools & Infrastructure Costs (Year 1, Solo Founder)
| Service | Cost/Month | Notes |
|---------|-----------|-------|
| GitHub (Free for public) | $0 | OSS project |
| Cloudflare (Free) | $0 | DNS, CDN, DDoS protection |
| VPS for staging (DigitalOcean) | $12/month | 2GB droplet |
| Postmark (email) | $15/month | Transactional email |
| Domain name | $15/year | zelocorecms.com |
| phpStorm IDE | $69/year | Best PHP IDE |
| GitHub Copilot | $10/month | AI code assistant |
| Sentry.io (free tier) | $0 | Error tracking |
| **Total** | **~$45/month** | Very lean! |

### AI Tools as Solo Founder's Team
| Role Replaced | AI Tool |
|--------------|---------|
| Documentation Writer | AI (draft, you edit) |
| Code Review | GitHub Copilot + PHPStan |
| Marketing Copywriter | AI (draft, you edit) |
| Test Case Generator | AI + PHPUnit |
| SEO Researcher | AI |
| Issue Triager | GitHub Copilot |

---

## 6. Risk Register (Solo Founder Specific)

| Risk | Probability | Impact | Mitigation |
|------|------------|--------|------------|
| **Burnout** | High | Critical | Hard cap at 40h/week, take weekends seriously |
| **Scope creep delays v1.0** | Very High | High | Sacred "Not v1.0" list — enforced ruthlessly |
| **Low adoption despite good product** | Medium | High | Build in public from Month 1, content marketing |
| **Security vulnerability at launch** | Low | Critical | Pre-launch security audit, responsible disclosure |
| **Hosting compatibility issue** | Medium | Medium | Test on 5 hosting environments before v1.0 |
| **Plugin signing bypassed** | Low | High | Defense in depth (3 security tiers) |
| **PHP ecosystem abandonment** | Very Low | Medium | PHP 8.x is modern, actively developed, dominant |
| **Competing CMS releases similar** | Medium | Medium | First-mover advantage + community moat |

---

## 7. Success Checkpoints (PHP-Specific)

### Month 3 Checkpoint (Admin & API Ready?)
- [ ] Works on fresh cPanel shared hosting (zero config)
- [ ] Works in Docker (one command)
- [ ] All 10 core MySQL tables created via migration
- [ ] REST API: CRUD for content types + items
- [ ] Admin UI: login, list, create, edit, delete content
- [ ] Image upload via GD (no Imagick required)
- [ ] Zero PHP errors in production mode (`display_errors=0`)
- [ ] PHPUnit tests: 70%+ coverage on core modules

### Month 5 Checkpoint (Beta Ready?)
- [ ] WP migration runs on a real 5-year-old WordPress site
- [ ] Plugin sandbox (Tier 1) blocks `exec()`, `system()`, `shell_exec()`
- [ ] GraphQL schema auto-generated from content types
- [ ] Works on PHP 8.2, 8.3, and 8.4
- [ ] Works with MySQL 8.0 AND MariaDB 10.6
- [ ] Passes `composer audit` (zero known vulnerabilities)
- [ ] PHPStan level 8 (zero type errors)
- [ ] Documentation: Getting Started guide tested by 5 beta users

### Month 6 Checkpoint (v1.0 Ready?)
- [ ] Successfully installed on: cPanel, Plesk, VPS (Ubuntu), Docker, Cloudways
- [ ] PHP memory usage < 32MB for typical request
- [ ] API response time < 200ms (p95) on shared hosting
- [ ] `zelocms-seo`, `zelocms-forms`, `zelocms-sitemap` plugins all working
- [ ] All 15 field types work correctly
- [ ] Zero known P0 or P1 bugs from beta
- [ ] Complete documentation (all sections)
- [ ] GPL v2+ license headers on all PHP files
- [ ] CHANGELOG.md complete with all changes
- [ ] Packagist package registered (composer create-project works)
