# ZelocoreCMS Theme Development Guide

This guide details the theme architecture and the update system for ZelocoreCMS, inspired by standard CMS theme systems like WordPress.

## 1. Theme Directory Structure

All themes must reside in the `themes/` directory at the root of the project. A standard theme has the following structure:

```
themes/
└── my-custom-theme/
    ├── theme.json
    ├── public/
    │   ├── css/
    │   ├── js/
    │   └── images/
    └── views/
        ├── index.blade.php
        ├── header.blade.php
        ├── footer.blade.php
        └── layouts/
            └── main.blade.php
```

### 1.1 Metadata (`theme.json`)

The `theme.json` file provides essential information about your theme. This is required for the theme to be recognized by ZelocoreCMS.

```json
{
    "name": "My Custom Theme",
    "slug": "my-custom-theme",
    "version": "1.0.0",
    "author": "Your Name",
    "description": "A beautiful custom theme for ZelocoreCMS."
}
```

### 1.2 Views

ZelocoreCMS uses Laravel's Blade templating engine. The `views/` folder inside your theme directory behaves identically to Laravel's default `resources/views/`. When your theme is active, ZelocoreCMS automatically adds your theme's `views/` path with a higher priority so it overrides default views if necessary.

### 1.3 Assets (public/)

Static assets (CSS, JS, images) should be placed in the `public/` directory within your theme. In production, these should either be symlinked to the main `public/themes/my-custom-theme` directory or served via a custom route controller.

## 2. Developing a Theme

1. **Create the Folder**: Create a new folder in `themes/` with your theme's slug (e.g., `my-custom-theme`).
2. **Add Metadata**: Create a `theme.json` inside your folder.
3. **Build Views**: Add your Blade files to the `views/` folder. Start with `index.blade.php`.
4. **Activate Theme**: Go to Appearance > Themes in the Admin Dashboard and activate your theme.

## 3. Theme Update System

ZelocoreCMS includes a theme update system that simplifies keeping themes up-to-date.

### 3.1 Version Checking
The system compares the active theme's version in `theme.json` with an external repository or API (e.g., Zelocore Themes API).
When an update is available, a badge is displayed in the Admin Dashboard (Updates submenu).

### 3.2 Update Process
When the administrator clicks "Update":
1. The CMS downloads the latest `.zip` file from the theme source.
2. The current theme directory is backed up to `storage/app/theme-backups/`.
3. The `.zip` file is extracted and overwrites the existing theme directory.
4. The system verifies the new `theme.json` version to confirm the update succeeded.

### 3.3 Supporting Updates in Custom Themes
If you develop a premium or private theme and want it to support updates, you can add an `update_url` property to your `theme.json`:
```json
{
    "name": "My Custom Theme",
    "slug": "my-custom-theme",
    "version": "1.0.0",
    "author": "Your Name",
    "update_url": "https://api.yourdomain.com/themes/my-custom-theme/update"
}
```
ZelocoreCMS will query this URL for the latest version data (must return JSON with `version` and `download_url` keys).
