# 👨‍💻 ZELOCORECMS — Developer Experience (DX) Strategy

> **Document 07 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: PHP 8.2+ | Composer | GPL v2+ | Solo Founder**

---

## 1. DX Philosophy

> **"If it takes more than 5 minutes to get a CMS running, we failed."**

Developer Experience is not a nice-to-have for ZELOCORECMS. It IS the product differentiator. Every design decision must pass the "Would a developer love this?" test.

Our DX Pillars:
1. **Zero-config to start, infinite config to extend**
2. **PHP 8.2+ strict typing everywhere — no loose comparisons, no surprises**
3. **Self-documenting APIs — code IS documentation (PHPDoc + OpenAPI)**
4. **CLI-first development workflow**
5. **Excellent error messages (not cryptic PHP stack traces)**
6. **Works on shared hosting — no SSH required for basics**

---

## 2. The ZeloCLI

The primary entry point for all developer interactions.
ZeloCLI is a **PHP CLI tool** — no Node.js required.

```bash
# Global install via Composer
composer global require zelocorecms/cli

# OR download the phar (no Composer needed)
curl -O https://releases.zelocorecms.com/zelocms.phar
chmod +x zelocms.phar
mv zelocms.phar /usr/local/bin/zelocms

# Create a new ZELOCORECMS project (via Composer)
composer create-project zelocorecms/zelocorecms my-cms

# OR via ZeloCLI
zelocms create my-cms
zelocms create my-cms --template blog
zelocms create my-cms --template ecommerce

# Start PHP development server (no Apache needed)
zelocms dev                  # Start PHP built-in server + admin
zelocms dev --port 8080      # Custom port
zelocms dev --host 0.0.0.0  # Accept external connections

# Database migrations (Phinx-powered)
zelocms db:migrate           # Run pending migrations
zelocms db:migrate:create    # Create new migration file
zelocms db:rollback          # Rollback last migration
zelocms db:seed              # Seed database with demo data
zelocms db:reset             # Reset + re-seed (dev only)
zelocms db:status            # Show migration status

# Content Type management
zelocms type:create          # Interactive content type wizard
zelocms type:list            # List all content types
zelocms type:export          # Export types as JSON schema
zelocms type:import schema.json  # Import from JSON schema

# Plugin management
zelocms plugin:install @zelocms/seo  # Install official plugin
zelocms plugin:install ./local-plugin  # Install local plugin
zelocms plugin:list          # List installed plugins
zelocms plugin:enable seo    # Enable a plugin
zelocms plugin:disable seo   # Disable a plugin
zelocms plugin:create        # Scaffold a new plugin

# WordPress Migration
zelocms migrate:wordpress    # Interactive WP migration wizard
zelocms migrate:strapi       # Migrate from Strapi
zelocms migrate:contentful   # Migrate from Contentful

# Build & Deploy
zelocms build                # Build for production
zelocms deploy               # Deploy to ZELOCORECMS Cloud
zelocms export               # Export all data as JSON

# Generate
zelocms generate:types       # Generate TypeScript types from content types
zelocms generate:sdk         # Generate frontend SDK

# Health & diagnostics
zelocms health               # Check all services health
zelocms status               # Show project status
zelocms logs                 # Stream application logs
```

---

## 3. Project Structure (After `zelocms create`)

```
my-cms/
├── zelocms.config.ts          # Main configuration file
├── package.json
├── .env                       # Environment variables (gitignored)
├── .env.example               # Template for env vars
├── tsconfig.json
│
├── content-types/             # Content type definitions (code-based)
│   ├── blog-post.ts
│   ├── product.ts
│   └── author.ts
│
├── plugins/                   # Local/custom plugins
│   └── my-custom-plugin/
│       ├── index.ts
│       ├── package.json
│       └── PLUGIN.md
│
├── migrations/                # Database migrations (auto-generated)
│   ├── 001_initial.sql
│   └── 002_add_blog_posts.sql
│
├── hooks/                     # Global hook registrations
│   └── content-hooks.ts
│
├── seeds/                     # Database seed data
│   └── demo-data.ts
│
├── public/                    # Static files
│   └── uploads/               # Local media storage (dev)
│
└── .zelocms/                  # Auto-generated (gitignored)
    ├── types/                 # Generated TypeScript types
    └── sdk/                   # Generated frontend SDK
```

---

## 4. `zelocms.config.ts` — The Configuration File

```typescript
import { defineConfig } from '@zelocms/core';

export default defineConfig({
  // Database
  database: {
    url: process.env.DATABASE_URL,
    pool: { min: 2, max: 10 }
  },
  
  // Cache
  cache: {
    url: process.env.REDIS_URL,
    ttl: 300 // 5 minutes default
  },
  
  // Media Storage
  storage: {
    provider: 'local',      // 'local' | 's3' | 'minio' | 'r2'
    local: {
      path: './public/uploads'
    },
    // s3: { bucket: '...', region: '...', ... }
  },
  
  // Authentication
  auth: {
    jwt: {
      secret: process.env.JWT_SECRET,
      expiresIn: '15m',
      refreshExpiresIn: '30d'
    },
    providers: {
      google: {
        clientId: process.env.GOOGLE_CLIENT_ID,
        clientSecret: process.env.GOOGLE_CLIENT_SECRET
      },
      github: {
        clientId: process.env.GITHUB_CLIENT_ID,
        clientSecret: process.env.GITHUB_CLIENT_SECRET
      }
    }
  },
  
  // ZeloAI (optional)
  ai: {
    provider: 'openai',     // 'openai' | 'anthropic' | 'ollama'
    openai: {
      apiKey: process.env.OPENAI_API_KEY,
      model: 'gpt-4o'
    }
  },
  
  // API
  api: {
    port: parseInt(process.env.PORT ?? '3000'),
    cors: {
      origins: ['http://localhost:3001', 'https://my-frontend.com']
    },
    rateLimit: {
      windowMs: 15 * 60 * 1000, // 15 minutes
      max: 1000                  // requests per window
    }
  },
  
  // Admin UI
  admin: {
    path: '/admin',
    meta: {
      title: 'My CMS',
      favicon: '/public/favicon.ico'
    }
  },
  
  // Plugins
  plugins: [
    '@zelocms/plugin-seo',
    '@zelocms/plugin-forms',
    './plugins/my-custom-plugin'
  ]
});
```

---

## 5. Code-Based Content Type Definition

Developers can define content types in code (not just via UI):

```typescript
// content-types/blog-post.ts
import { defineContentType, fields } from '@zelocms/core';

export const BlogPost = defineContentType({
  slug: 'blog-post',
  name: 'Blog Post',
  
  fields: {
    title: fields.text({
      required: true,
      max: 200,
      label: 'Post Title'
    }),
    
    slug: fields.slug({
      from: 'title',   // Auto-generate from title field
      unique: true
    }),
    
    content: fields.richText({
      required: true,
      extensions: ['bold', 'italic', 'link', 'image', 'code']
    }),
    
    excerpt: fields.text({
      multiline: true,
      max: 300,
      label: 'Short Excerpt'
    }),
    
    coverImage: fields.media({
      allowedTypes: ['image/*'],
      label: 'Cover Image'
    }),
    
    author: fields.relation({
      to: 'user',
      required: true
    }),
    
    categories: fields.relations({
      to: 'category',
      label: 'Categories'
    }),
    
    tags: fields.tags({
      label: 'Tags'
    }),
    
    publishedAt: fields.datetime({
      label: 'Published At'
    }),
    
    isFeatured: fields.boolean({
      default: false,
      label: 'Featured Post'
    }),
    
    readingTime: fields.virtual({
      // Computed field - not stored, computed from content
      compute: (item) => Math.ceil(item.content.split(' ').length / 200)
    })
  },
  
  settings: {
    hasVersioning: true,
    hasScheduling: true,
    hasSEO: true,
    apiEndpoint: 'blog-posts', // /api/v1/content/blog-posts
  },
  
  hooks: {
    beforeSave: async (item, context) => {
      // Validate or transform content before saving
      return item;
    },
    afterPublish: async (item, context) => {
      // Trigger notifications, update search index, etc.
    }
  }
});
```

---

## 6. Auto-Generated TypeScript SDK

After running `zelocms generate:sdk`, developers get a fully-typed SDK:

```typescript
// Generated SDK — used in frontend Next.js / React app
import { ZeloClient } from './.zelocms/sdk';

const cms = new ZeloClient({
  baseUrl: 'http://localhost:3000',
  apiKey: process.env.CMS_API_KEY,
});

// Fully typed! TypeScript knows the shape of BlogPost
const { data: posts, meta } = await cms.content.blogPost.findMany({
  where: {
    status: 'published',
    author: { firstName: { contains: 'John' } }
  },
  orderBy: { publishedAt: 'desc' },
  take: 10,
  skip: 0,
  include: ['author', 'categories', 'coverImage']
});

// TypeScript auto-complete works on posts[0].title, .content, etc.

// Create
const newPost = await cms.content.blogPost.create({
  data: {
    title: 'Hello World',
    content: '<p>My first post</p>',
    status: 'draft',
    author: { connect: { id: 'user-id' } }
  }
});

// Update
const updated = await cms.content.blogPost.update({
  where: { id: newPost.id },
  data: { title: 'Updated Title' }
});

// Publish
await cms.content.blogPost.publish(newPost.id);
```

---

## 7. Developer Documentation Strategy

### Documentation Site (docs.zelocorecms.com)
Built with Nextra (Next.js-based docs framework):

```
docs/
├── Getting Started
│   ├── Installation (5 min quickstart)
│   ├── Configuration
│   ├── Your First Content Type
│   └── Your First API Request
│
├── Core Concepts
│   ├── Content Types
│   ├── Field Types Reference
│   ├── Hooks & Filters
│   ├── Roles & Permissions
│   └── Media Management
│
├── API Reference (auto-generated from OpenAPI)
│   ├── REST API
│   ├── GraphQL API
│   └── SDK Reference
│
├── Guides
│   ├── Building with Next.js
│   ├── Building with Nuxt.js
│   ├── Building with SvelteKit
│   ├── Building with Astro
│   ├── WordPress Migration Guide
│   ├── Multi-tenant Setup
│   └── Custom Authentication
│
├── Plugin Development
│   ├── Plugin Architecture
│   ├── Your First Plugin
│   ├── Hook Reference
│   └── Publishing to Registry
│
└── Deployment
    ├── Docker (Recommended)
    ├── Kubernetes
    ├── Railway / Render / Fly.io
    └── ZELOCORECMS Cloud
```

---

## 8. Onboarding Experience

### First 5 Minutes (what a developer experiences)

```bash
# Minute 0: Install
npm install -g @zelocms/cli

# Minute 1: Create project  
zelocms create my-blog
# → Interactive prompts: project name, database, storage
# → Generates project structure

# Minute 2: Start
cd my-blog && zelocms dev
# → PostgreSQL starts (Docker)
# → CMS API starts on :3000
# → Admin UI starts on :3001
# → Browser opens automatically

# Minute 3: Create first content type
# → In browser: click "New Content Type"
# → Add fields visually
# → Save → API endpoint auto-created

# Minute 4: Make first API call
curl http://localhost:3000/api/v1/content/my-posts
# → Returns JSON with content

# Minute 5: Integrate with frontend
zelocms generate:sdk
# → Import SDK, get full TypeScript types
```

---

## 9. Error Message Quality Standard

Every error must answer: **What happened? Why? How to fix it?**

```
❌ BAD (typical CMS error):
Error: ECONNREFUSED 127.0.0.1:5432

✅ GOOD (ZELOCORECMS error):
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
ZELOCORECMS: Database Connection Failed
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Cannot connect to PostgreSQL at: localhost:5432

Possible causes:
  → PostgreSQL is not running
  → DATABASE_URL in .env is incorrect
  → Database credentials are wrong

To fix:
  1. Check if PostgreSQL is running:  docker ps | grep postgres
  2. Start PostgreSQL:                docker compose up postgres -d
  3. Verify your DATABASE_URL in .env

Need help? → https://docs.zelocorecms.com/troubleshooting/database
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
```
