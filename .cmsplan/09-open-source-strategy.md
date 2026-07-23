# 🌍 ZELOCORECMS — Open Source Strategy & Community Building

> **Document 09 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: GPL v2+ License | Solo Founder Strategy**

---

## 1. License Decision: GPL v2 or Later

### Why GPL v2 or Later?

ZELOCORECMS uses the **GNU General Public License v2, or (at your option) any later version** — written as `GPL-2.0-or-later`.

This is **identical to WordPress's license** and is the industry standard for open-source PHP CMS projects.

**Why this is the right choice:**

| Reason | Explanation |
|--------|-------------|
| **WordPress Compatibility** | GPL v2+ matches WordPress core. Plugins/themes can be GPL-compatible, enabling WP ecosystem crossover. |
| **Ecosystem Familiarity** | Every WordPress developer already knows GPL. Zero friction in understanding ZELOCORECMS's licensing. |
| **Copyleft Protection** | Anyone who distributes ZELOCORECMS (including modified versions) must also share their source code. Prevents proprietary forks. |
| **Patent Protection (v3 clause)** | The "or later" option means anyone can use GPL v3 provisions (explicit patent rights) if they prefer. |
| **Cure Period (v3 benefit)** | If using as GPL v3, violators get a cure period to fix compliance issues — reducing legal conflict. |
| **Revenue-Friendly** | Hosting and selling services around GPL software is perfectly legal. Our Cloud business is valid under GPL. |
| **Community Expectation** | The PHP/CMS community expects GPL. Choosing MIT or AGPL would be confusing and reduce adoption. |

### What GPL v2+ Means in Practice

```
✅ ALLOWED:
  - Anyone can use ZELOCORECMS for free (personal, commercial)
  - Anyone can modify ZELOCORECMS for their own use
  - Anyone can redistribute ZELOCORECMS (must include source + GPL license)
  - Anyone can build themes, plugins, or integrations
  - Selling hosting services around ZELOCORECMS (our Cloud business model)
  - Selling premium plugins (if distributed with GPL license)

⚠️ REQUIRED:
  - Any distributed/modified version must include source code
  - Any distributed/modified version must keep GPL license
  - Cannot remove copyright notices or license headers

❌ NOT ALLOWED:
  - Distributing ZELOCORECMS under a different, incompatible license
  - Removing the GPL license from distributed copies
  - Distributing compiled-only versions without source
```

### License File Header (All PHP Files)
```php
<?php
/**
 * ZELOCORECMS — A Modern Open Source CMS
 *
 * Copyright (C) 2026  ZELOCORECMS Contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see <https://www.gnu.org/licenses/>.
 */
```

### Third-Party Dependencies & License Compatibility

| Dependency | License | GPL v2 Compatible? |
|-----------|---------|-------------------|
| Slim Framework | MIT | ✅ Yes |
| Eloquent ORM | MIT | ✅ Yes |
| PHP-DI | MIT | ✅ Yes |
| FastRoute | BSD-3 | ✅ Yes |
| Twig | BSD-3 | ✅ Yes |
| HTMLPurifier | LGPL-2.1 | ✅ Yes |
| Firebase JWT | BSD-3 | ✅ Yes |
| Symfony Mailer | MIT | ✅ Yes |
| PHPUnit | BSD-3 | ✅ Yes (dev only) |
| Vue.js (admin) | MIT | ✅ Yes |
| TipTap (editor) | MIT | ✅ Yes |

---

## 2. Open Source Philosophy for Solo Founder

As a **solo founder**, your open-source strategy must be radically focused. You cannot do everything. Here's the prioritized approach:

### The Solo Founder Rule: "10% Unique Core"
> Only 10% of what you build needs to be truly unique. The other 90% is execution, polish, and community. Focus energy on the 10% that no one else has done.

For ZELOCORECMS, the 10% unique core is:
1. **Three-Tier Plugin Security** — No other CMS has adaptive isolation
2. **ZeloMigrate** — Frictionless WordPress migration
3. **Headless + Admin in one PHP package** — No Node.js required
4. **True open-source enterprise features** — No paywalled SSO/RBAC

---

## 3. GitHub Strategy (Solo Founder Edition)

### Repository Structure
```
github.com/zelocorecms/
├── zelocorecms           # Main PHP monorepo (PRIMARY ⭐)
├── zelocms-docs          # Documentation site
├── zelocms-website       # Marketing website
├── plugin-seo            # Official SEO plugin
├── plugin-forms          # Official forms plugin
├── plugin-sitemap        # Official sitemap plugin
├── starter-nextjs        # Next.js headless frontend starter
├── starter-nuxt          # Nuxt.js headless frontend starter
├── starter-plain         # Plain PHP theme starter
└── awesome-zelocorecms   # Community resources list
```

### Solo Founder GitHub Workflow

**Weekly rhythm (sustainable for 1 person):**

| Day | Activity | Time |
|-----|----------|------|
| Mon | Code — new features or bug fixes | 6–8 hours |
| Tue | Code — continue + PR review (community) | 6–8 hours |
| Wed | Documentation + blog post | 4 hours |
| Thu | Community (Discord, issues triage) | 2 hours |
| Fri | Code or marketing | 4–6 hours |
| Sat | Optional: coding sprint | As desired |
| Sun | REST | Off |

### GitHub Labels for Solo Management
```
Priority:    P0-critical, P1-high, P2-medium, P3-low
Type:        bug, feature, docs, security, question
Area:        core, admin-ui, api, plugins, migrations, security
For:         good-first-issue, help-wanted, hacktoberfest
Status:      triage-needed, in-progress, blocked, wont-fix
```

---

## 4. Contributor Funnel (Realistic for Solo Founder)

### Year 1 Realistic Goals
- **Month 1–3:** Solo development, no contributors yet
- **Month 4–6:** 5–10 contributors from alpha testers
- **Month 6–12:** 20–50 contributors
- **Year 2:** 100–250 contributors

### Making Contribution Easy
- **CONTRIBUTING.md** explains: how to set up dev environment in 5 minutes
- **good-first-issue** label always has 3–5 open issues
- **Issue templates** make bug reports and feature requests structured
- **PR template** with checklist to reduce back-and-forth
- **Auto-assign reviewers** via CODEOWNERS (just you initially)

### When to Accept Help
Start accepting community PRs from Month 4 (after alpha). Initial focus:
1. Documentation improvements (lowest risk, highest value)
2. Bug fixes with reproduction steps
3. New translations (no code risk)
4. Test coverage improvements
5. New field types or minor features

---

## 5. Community Infrastructure (Solo-Sustainable)

### Discord Server (Start Simple)
```
ZELOCORECMS Discord
│
├── 📢 announcements     # Releases, important news
├── 💬 general           # General chat
├── 🆘 help              # Support questions
├── 🔧 dev               # Developer discussion
├── 🔌 plugins           # Plugin development
└── 🚀 showcase          # Show off your projects
```

**Solo founder rule:** Only create channels you will actively participate in. Start with 5 channels. Add more as community grows.

### GitHub Discussions (Primary Support Channel)
- Cheaper than Discord for async help (search-indexed by Google)
- Categories: Q&A, Ideas, Show & Tell, Announcements
- Set up auto-labeling for common question patterns

### Blog (Key Solo Founder Marketing Tool)
**Frequency:** 1 post per week minimum (bi-weekly if needed)
**Content types:**
- Release notes (every release)
- Technical deep dives (how we built X)
- CMS comparisons (ZELOCORECMS vs WordPress)
- Tutorial series (building with ZELOCORECMS)

**The "Building in Public" Strategy:**
- Share weekly progress updates on Twitter/X
- Be honest about struggles — people root for solo founders
- Show actual code, real architecture decisions, real numbers
- This is your best marketing tool as a solo founder

---

## 6. Plugin Ecosystem Strategy (GPL Compatible)

### What GPL Means for Plugins
All plugins that extend ZELOCORECMS and are **distributed** must be GPL v2+.
- This is exactly how WordPress works
- Plugin developers CAN charge money for their GPL plugins (Ghost, WooCommerce, etc.)
- SaaS integrations (connecting to external APIs) are not required to be GPL

### Official Plugins (Built by You, Solo Founder)

**v1.0 launch plugins (must ship with core):**
| Plugin | Priority | Notes |
|--------|----------|-------|
| `zelocms-seo` | 🔴 P0 | Built-in SEO fields, sitemap, Open Graph |
| `zelocms-forms` | 🔴 P0 | Contact forms, spam protection |
| `zelocms-sitemap` | 🔴 P0 | XML sitemap auto-generation |

**v1.x plugins (post-launch):**
| Plugin | Priority |
|--------|----------|
| `zelocms-analytics` | P1 |
| `zelocms-newsletter` | P1 |
| `zelocms-social` | P2 |
| `zelocms-cache` | P1 |

### Community Plugin Registry
```
Phase 1 (Solo): Curated list in awesome-zelocorecms README
Phase 2:        Simple packagist-based discovery (composer tag: zelocms-plugin)
Phase 3:        Official plugin registry at plugins.zelocorecms.com
Phase 4:        Paid marketplace with GPL-compliant revenue sharing
```

---

## 7. Solo Founder Sustainability Plan

### Avoiding Burnout (Critical for Solo Projects)
- **Set office hours:** ZELOCORECMS is a project, not a 24/7 obligation
- **Batch community engagement:** Check Discord/GitHub 2x per day, not constantly
- **Automate what you can:** GitHub Actions, bots, templates
- **Say no to scope creep:** Maintain a strict "Not v1.0" list
- **Celebrate milestones:** Every 1,000 GitHub stars is a win

### AI as a Force Multiplier (Solo Founder's Secret Weapon)
- Use AI for boilerplate code generation
- Use AI for documentation drafts (then edit)
- Use AI for writing test cases
- Use AI for issue triage and response templates
- Use AI for competitive research
- **Estimated time saving:** 3–4 hours per day vs. non-AI workflow

### Metrics to Track (Solo Focus — Keep it Simple)
Track only these 5 metrics weekly:
1. GitHub Stars (awareness)
2. npm/Packagist downloads per week (adoption)
3. Discord members (community health)
4. Open bugs P0/P1 (product health)
5. MRR — Monthly Recurring Revenue (sustainability)

---

## 8. Community Health Projections (Solo Founder)

| Metric | Month 3 | Month 6 | Year 1 | Year 2 |
|--------|---------|---------|--------|--------|
| GitHub Stars | 500 | 2,000 | 5,000 | 25,000 |
| Contributors | 0 | 10 | 40 | 150 |
| Discord Members | 100 | 500 | 2,000 | 10,000 |
| Active Installs | 50 | 500 | 5,000 | 50,000 |
| Packagist Downloads/Week | 0 | 200 | 2,000 | 20,000 |
| MRR (Cloud) | $0 | $2,000 | $15,000 | $100,000 |
