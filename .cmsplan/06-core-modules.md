# 🔌 ZELOCORECMS — Core Modules & WordPress Core Clone Design

> **Document 06 of 13 | ZELOCORECMS Startup Planning Suite**

---

## 1. WordPress Core → ZELOCORECMS Equivalent Mapping

| WordPress Concept | ZELOCORECMS Equivalent | Enhancement |
|-------------------|------------------------|-------------|
| `wp_posts` table | `content_items` table | Typed, versioned, structured |
| `wp_postmeta` (EAV) | `data JSONB` field | Performant, indexed, typed |
| `wp_options` | `settings` table + env config | Scoped per workspace |
| Custom Post Types | Content Type Builder | UI-driven + API-driven |
| Taxonomies | Tag/Category system | Polymorphic, unlimited depth |
| `wp_users` | `users` table | OAuth2, MFA, SSO ready |
| `wp_capabilities` | RBAC Roles | Fine-grained permissions |
| Hooks (add_action/add_filter) | Hook System (TypeScript) | Async, typed, sandboxed |
| Plugins | Modules / Extensions | Sandboxed, signed, permissioned |
| Themes | Frontend (decoupled) | Any framework |
| Gutenberg | ZeloBuilder + TipTap editor | Visual overlay editing |
| Shortcodes | Content Blocks | Component-based |
| REST API | REST API v1 | Better designed, full coverage |
| WP-GraphQL (plugin) | GraphQL API (native) | First-class, auto-generated |
| Cron Jobs | BullMQ Job Queue | Reliable, Redis-backed |
| Transients | Redis Cache | Predictable TTL |
| wp_mail() | Email Service | Provider-agnostic |
| Media Library | ZeloMedia | AI-powered, folder-based |
| Pages | Pages Content Type | Built-in |
| Categories | Taxonomy System | Polymorphic |
| User Roles | RBAC Roles | Workspace-scoped |

---

## 2. Core Module Specifications

### Module 1: Content Engine (`@zelocms/core-content`)

The heart of ZELOCORECMS. Manages all content operations.

```typescript
// Content Type Schema Definition
interface ContentTypeSchema {
  id: string;
  slug: string;
  name: string;
  description?: string;
  fields: FieldDefinition[];
  settings: {
    hasSEO: boolean;
    hasSlug: boolean;
    hasStatus: boolean;
    hasVersioning: boolean;
    hasScheduling: boolean;
    hasTaxonomies: boolean;
    isPubliclyAccessible: boolean;
    apiEndpoint: string; // auto-generated slug
  };
}

// Supported Field Types
type FieldType = 
  | 'text'           // Short text
  | 'richtext'       // TipTap rich text editor
  | 'number'         // Integer or float
  | 'boolean'        // Toggle
  | 'date'           // Date picker
  | 'datetime'       // Date + time picker
  | 'email'          // Email validation
  | 'url'            // URL validation
  | 'color'          // Color picker
  | 'select'         // Dropdown (single)
  | 'multiselect'    // Dropdown (multiple)
  | 'media'          // Single media item
  | 'media_gallery'  // Multiple media items
  | 'relation'       // Link to another content type
  | 'relations'      // Link to multiple content items
  | 'component'      // Reusable nested component
  | 'blocks'         // Dynamic zone (choose from component types)
  | 'json'           // Raw JSON field
  | 'uid'            // Auto-generated unique identifier
  | 'password'       // Hashed password field
  | 'slug';          // URL-safe slug (auto from another field)

interface FieldDefinition {
  name: string;
  slug: string; // field key in data object
  type: FieldType;
  required: boolean;
  unique?: boolean;
  default?: any;
  validation?: ValidationRule[];
  private?: boolean; // excludes from public API
  options?: FieldOptions; // type-specific options
}
```

---

### Module 2: Hook System (`@zelocms/core-hooks`)

```typescript
// Full implementation of the typed hook system

class HookRegistry {
  private actions: Map<string, HookCallback[]> = new Map();
  private filters: Map<string, HookCallback[]> = new Map();

  addAction(hook: string, callback: ActionCallback, priority = 10): RemoveFn {
    this.register(this.actions, hook, callback, priority);
    return () => this.removeAction(hook, callback);
  }

  async doAction(hook: string, context: HookContext, ...args: any[]): Promise<void> {
    const callbacks = this.actions.get(hook) ?? [];
    for (const cb of callbacks.sort((a, b) => a.priority - b.priority)) {
      await cb.fn(context, ...args);
    }
  }

  addFilter<T>(hook: string, callback: FilterCallback<T>, priority = 10): RemoveFn {
    this.register(this.filters, hook, callback, priority);
    return () => this.removeFilter(hook, callback);
  }

  async applyFilters<T>(hook: string, value: T, context: HookContext): Promise<T> {
    const callbacks = this.filters.get(hook) ?? [];
    let result = value;
    for (const cb of callbacks.sort((a, b) => a.priority - b.priority)) {
      result = await cb.fn(result, context);
    }
    return result;
  }
}

// Singleton hook registry
export const hooks = new HookRegistry();
```

---

### Module 3: Plugin Sandbox (`@zelocms/core-plugins`)

```typescript
// Plugin Loader with Security Controls
class PluginManager {
  
  async install(pluginPackage: string): Promise<Plugin> {
    // 1. Verify cryptographic signature
    await this.verifySig(pluginPackage);
    
    // 2. Parse manifest & validate declared permissions
    const manifest = await this.parseManifest(pluginPackage);
    
    // 3. Request admin approval for elevated permissions
    if (manifest.permissions.includes('filesystem:write')) {
      await this.requestApproval(manifest);
    }
    
    // 4. Install in isolated directory
    await this.installIsolated(pluginPackage);
    
    // 5. Register hooks (within permission scope)
    await this.registerHooks(manifest);
    
    return this.createPluginInstance(manifest);
  }

  async loadPlugin(pluginId: string): Promise<void> {
    // Load plugin in Worker Thread for isolation
    const worker = new Worker(pluginEntrypoint, {
      workerData: {
        permissions: plugin.permissions,
        config: plugin.config
      },
      // Resource limits
      resourceLimits: {
        maxOldGenerationSizeMb: 128, // 128MB RAM limit
        maxYoungGenerationSizeMb: 32,
      }
    });
    
    // Communication via message passing (no shared memory for security)
    worker.on('message', (msg) => this.handlePluginMessage(pluginId, msg));
    
    this.workers.set(pluginId, worker);
  }
}
```

---

### Module 4: Auth & IAM (`@zelocms/core-auth`)

```typescript
// Authentication providers
const authProviders = {
  local: LocalAuthProvider,    // Email + password (Argon2 hashing)
  google: OAuthProvider,       // Google OAuth2
  github: OAuthProvider,       // GitHub OAuth2  
  saml: SAMLProvider,          // SAML 2.0 (Okta, Azure AD, Ping)
  oidc: OIDCProvider,          // OpenID Connect
};

// JWT Strategy
interface TokenPayload {
  sub: string;       // user ID
  wid: string;       // workspace ID
  roles: string[];   // role IDs
  perms: string[];   // flattened permissions (cached)
  iat: number;       // issued at
  exp: number;       // expires (short: 15min)
  jti: string;       // JWT ID (for revocation)
}

// Refresh token in httpOnly cookie (never accessible to JS)
// Access token in memory only (not localStorage for XSS protection)

// Permission Check
async function checkPermission(
  userId: string,
  workspaceId: string,
  action: string,
  resource?: string
): Promise<boolean> {
  const cacheKey = `perm:${userId}:${workspaceId}:${action}:${resource}`;
  const cached = await redis.get(cacheKey);
  if (cached !== null) return cached === '1';
  
  const allowed = await rbacEngine.check(userId, workspaceId, action, resource);
  await redis.setex(cacheKey, 300, allowed ? '1' : '0'); // 5min cache
  return allowed;
}
```

---

### Module 5: Media Manager (`@zelocms/core-media`)

```typescript
// Media processing pipeline
interface MediaProcessingPipeline {
  // Image processing
  image: {
    resize: (width: number, height: number) => void;
    webp: () => void;          // Convert to WebP
    avif: () => void;          // Convert to AVIF
    placeholder: () => void;   // Generate blur placeholder
    srcset: (sizes: number[]) => void; // Generate responsive images
    focalPoint: { x: number; y: number }; // Smart crop reference
  };
  
  // Video processing  
  video: {
    transcode: (formats: ['mp4', 'webm']) => void;
    thumbnail: () => void;     // Extract thumbnail at 0:01
    hls: () => void;          // Generate HLS segments for streaming
  };
  
  // Document processing
  document: {
    pdf: () => void;           // PDF thumbnail generation
    metadata: () => void;      // Extract EXIF/document metadata
  };
}

// Storage adapter (pluggable)
interface StorageAdapter {
  upload(file: Buffer, key: string, metadata: object): Promise<string>;
  download(key: string): Promise<Buffer>;
  delete(key: string): Promise<void>;
  getSignedUrl(key: string, expiresIn: number): Promise<string>;
  getPublicUrl(key: string): string;
}

// Built-in adapters
const storageAdapters = {
  local: LocalStorageAdapter,   // Local filesystem
  s3: S3StorageAdapter,         // AWS S3
  minio: MinIOStorageAdapter,   // MinIO (self-hosted S3)
  r2: R2StorageAdapter,         // Cloudflare R2
  gcs: GCSStorageAdapter,       // Google Cloud Storage
};
```

---

### Module 6: SEO Engine (`@zelocms/core-seo`)

```typescript
// Auto-generated SEO metadata for every content item
interface SEOData {
  title?: string;           // Page title
  description?: string;     // Meta description
  keywords?: string[];      // Meta keywords
  ogTitle?: string;         // Open Graph title
  ogDescription?: string;   // Open Graph description  
  ogImage?: string;         // Open Graph image URL
  twitterCard?: 'summary' | 'summary_large_image';
  twitterTitle?: string;
  twitterDescription?: string;
  twitterImage?: string;
  canonicalUrl?: string;    // Canonical URL
  noIndex?: boolean;        // noindex directive
  noFollow?: boolean;       // nofollow directive
  structuredData?: object;  // JSON-LD structured data
  sitemap?: {
    priority: number;       // 0.0 to 1.0
    changefreq: 'always' | 'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly' | 'never';
    lastmod?: Date;
  };
}

// Sitemap generator
async function generateSitemap(workspaceId: string): Promise<string> {
  const allContent = await getPublishedContent(workspaceId);
  return buildXMLSitemap(allContent);
}
```

---

### Module 7: ZeloMigrate (`@zelocms/migrate-wordpress`)

```typescript
// WordPress Migration Engine
class WordPressMigrator {
  
  async analyze(wpConfig: WPConfig): Promise<MigrationReport> {
    // Connect to WP database
    const wpDb = await connectWPDatabase(wpConfig);
    
    return {
      postsCount: await wpDb.count('wp_posts'),
      usersCount: await wpDb.count('wp_users'),
      mediaCount: await wpDb.count('wp_posts', { where: { post_type: 'attachment' } }),
      pluginsInstalled: await this.getActivePlugins(wpDb),
      customPostTypes: await this.getCustomPostTypes(wpDb),
      estimatedTime: this.calculateTime(/* ... */),
      warnings: await this.detectPotentialIssues(wpDb),
    };
  }
  
  async migrate(wpConfig: WPConfig, options: MigrationOptions): Promise<void> {
    const session = await this.createMigrationSession();
    
    // Step 1: Import users
    await this.migrateUsers(wpDb, session);
    
    // Step 2: Import categories & tags (taxonomies)
    await this.migrateTaxonomies(wpDb, session);
    
    // Step 3: Import posts & pages
    await this.migratePosts(wpDb, session);
    
    // Step 4: Import media (re-download from WP install)
    await this.migrateMedia(wpConfig.siteUrl, session);
    
    // Step 5: Import custom post types
    await this.migrateCustomPostTypes(wpDb, session);
    
    // Step 6: Import custom fields (ACF, CMB2, etc.)
    await this.migrateCustomFields(wpDb, session);
    
    // Step 7: Set up redirects (301 from old URLs)
    await this.setupRedirects(session);
    
    // Step 8: Verify migration integrity
    await this.verifyMigration(session);
    
    session.complete();
  }
}
```

---

### Module 8: Webhook Manager (`@zelocms/core-webhooks`)

```typescript
// Event-driven webhook delivery with retry logic
interface WebhookDelivery {
  event: string;
  data: object;
  workspaceId: string;
  timestamp: Date;
  signature: string; // HMAC-SHA256 of payload
}

class WebhookManager {
  async trigger(event: string, data: object, workspaceId: string): Promise<void> {
    const webhooks = await this.getWebhooksForEvent(event, workspaceId);
    
    for (const webhook of webhooks) {
      // Add to queue (BullMQ) for reliable delivery
      await this.deliveryQueue.add('deliver', {
        webhookId: webhook.id,
        event,
        data,
        signature: this.sign(data, webhook.secret),
      }, {
        attempts: 5,              // Retry up to 5 times
        backoff: { type: 'exponential', delay: 1000 }
      });
    }
  }
}
```

---

## 3. Built-In Content Types (Like WordPress's Pages & Posts)

ZELOCORECMS ships with these content types pre-configured:

| Type | Slug | Description | WordPress Equivalent |
|------|------|-------------|---------------------|
| **Page** | `page` | Static pages | Pages |
| **Post** | `post` | Blog posts | Posts |
| **Media** | `media` | File attachments | Attachments |
| **User** | `user` | System users | Users |
| **Menu** | `menu` | Navigation menus | Menus |
| **Form** | `form` | Contact forms (built-in) | Gravity Forms (plugin) |
| **Redirect** | `redirect` | URL redirects | Redirection (plugin) |
| **Global Setting** | `global` | Site-wide config | Options pages |

---

## 4. Content Relationship System

Unlike WordPress's fragile relationship via postmeta, ZELOCORECMS uses proper relational references:

```typescript
// Content relationships are typed and indexed
interface ContentRelation {
  sourceType: string;      // Content type of the "from" item
  sourceId: string;        // Content item ID of the "from" item  
  targetType: string;      // Content type of the "to" item
  targetId: string;        // Content item ID of the "to" item
  field: string;           // The field name that holds this relation
  order?: number;          // For ordered many-to-many relations
}

// Example: Post → Author (User)
// Example: Product → Categories (many-to-many)
// Example: Page → Sections (ordered components)
```
