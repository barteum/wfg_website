# Walk For God - Bible App Developer Guide

## 1. Overview
The **Walk For God Bible App** is a specialized Single-Page Application (SPA) designed to run within a WordPress environment. Its core philosophy is **"Offline-First, Personal Ownership"**. Unlike typical web apps that store user data in a central database, this app empowers users to save their personal notes and edits directly to a **local CSV file** on their device using the modern **File System Access API**.

**Current Version**: `v1.03`

---

## 2. Architecture

### Tech Stack
- **Frontend**: Vanilla HTML5, CSS3 (CSS Variables for theming), Modern JavaScript (ES6+).
- **Backend Helpers**: PHP (minimal interaction).
- **Authentication**: WordPress Session Integration.
- **Data Storage**: 
    - **Read-Only**: Server-side CSV (`bible/web.csv`).
    - **Personal Data**: Client-side Local File System (`My Bible Data.csv`).
    - **User Prefs**: Server-side secure CSV (`bible/users.csv`).

### High-Level Flow
1.  **Initialization**: `bible/bible.html` loads, checks WP Authentication via `auth_check.php`.
2.  **Data Loading**: App fetches Bible text via `bible/get_bible.php` (Secure Proxy).
3.  **Mode Detection**:
    - **Online Mode**: Default. Read-only access to standard Bible text.
    - **Personal Mode**: If user connects a local file, app switches to "My Bible" mode, enabling edits/notes interaction.
4.  **Persistence**:
    - **Edits**: Written directly to the user's local file handle.
    - **Options**: Written to server via `options_api.php`.

---

## 3. File Structure & Components

| File | Path | Purpose |
| :--- | :--- | :--- |
| **bible.html** | `/public_html/bible/bible.html` | **Core Application**. Contains all HTML structure, CSS styles, and JS logic (approx. 3000+ lines). |
| **auth_check.php** | `/public_html/bible/auth_check.php` | **Auth Bridge**. Returns JSON: `{ authenticated: true/false, username: "..." }`. |
| **backup_api.php** | `/public_html/bible/backup_api.php` | **Backup Endpoint**. Handles uploading/downloading of user backups to/from `bible/user_backups/`. |
| **web.csv** | `/public_html/bible/web.csv` | **Source Data**. The standard Bible text database. Protected from direct download. |
| **users.csv** | `/public_html/bible/users.csv` | **User Preferences**. Stores device IDs or settings per user. |
| **get_bible.php** | `/public_html/bible/get_bible.php` | **Secure Proxy**. Serves `web.csv` only to requests with valid Referer/Origin to prevent scraping. |
| **options_api.php**| `/public_html/bible/options_api.php`| **API Endpoint**. Handles Read/Write operations for `users.csv`. |
| **.htaccess** | `/public_html/bible/.htaccess` | **Security Rule**. Denies direct HTTP access to `.csv` files. |

---

## 4. Database & Data Formats

### A. Standard Bible (`web.csv`)
Header: `"Book","Chapter","Verse","Text"`
- **Format**: Standard CSV.
- **Encoding**: UTF-8.

### B. Personal Bible (Local CSV)
Used when a user saves "My Bible Data.csv" to their computer.
Header: `"Book","Chapter","Verse","Text","Note","EditNote"`

**Multi-Value Field Logic ("Note" & "EditNote"):**
To support multiple notes per verse without breaking CSV structure, we use a **Pick-style** delimiter system inside the column string:
- **Value Mark (VM)**: `Char(253) / \xFD` - Separates distinct note entries.
- **Sub-Value Mark (SM)**: `Char(252) / \xFC` - Separates fields within an entry (e.g., Text vs Timestamp).

**Format**: `Text` + SM + `Timestamp` + VM + `Text2` + SM + `Timestamp2`...

> **Legacy Compatibility**: The parser also supports JSON arrays `["A","B"]` and double-pipe strings `A || B`.

### C. Server Options (`users.csv`)
Stores user-specific settings on the server.
**Format**: `Username,OptionsBlob`
The `OptionsBlob` uses the same VM/SM delimiter logic for Key-Value pairs.
`Key1` + SM + `Value1` + VM + `Key2` + SM + `Value2`...

---

## 5. Key Functional Modules (JavaScript)

### 1. File System Access API
The app uses `window.showOpenFilePicker` and `window.showSaveFilePicker` to obtain a `FileSystemFileHandle`.
- **Permission Persistence**: The handle is stored in **IndexedDB** so the browser remembers the file on reload (though permission must be re-granted via prompt).
- **Security Context**: This API requires a Secure Context (HTTPS or localhost).

### 2. Virtual Rendering & Search
- **Search**: Client-side filtering of the `bibleData` array. Supports exact match regex and UK/US spelling normalization.
- **Pagination**: Uses `rowsPerPage` (default 50) to render slices of the result set to the DOM, keeping performance high.

### 3. Audio (TTS)
- Uses the browser's native `SpeechSynthesis` API.
- Logic handles verse-by-verse playback, auto-scrolling, and highlighting.

### 4. Authentication
- **Check**: `checkAuth()` calls `auth_check.php`.
- **UI**: Toggles "Log In" (Red) / "Log Out" (Green) indicators.
- **Enforcement**: Editing/Notes features are gated behind an `isAuthenticated` check.

---

## 6. Security Measures

1.  **Anti-Scraping**: 
    - `bible/.htaccess`: `Deny from all` for `*.csv`.
    - `get_bible.php`: Checks `HTTP_REFERER` to ensure requests originate from the App itself.
2.  **Auth Gating**:
    - `options_api.php`: Requires `is_user_logged_in()` check.
    - `auth_check.php`: Validates specific WP session cookies.

---

## 7. Developer Workflow

### Adding a New Feature
1.  **Modify `bible.html`**: Being an SPA, most logic changes happen here.
    - **CSS**: Add new variables or classes in the `<style>` block.
    - **HTML**: Add new Modals or UI elements in the body.
    - **JS**: Add logic in the `<script>` block.
2.  **Test Locally**:
    - Use XAMPP/Ampps.
    - Ensure `auth_check.php` returns positive results (mock if needed for offline dev).
3.  **Deploy**:
    - Upload `bible.html` to `public_html/bible/` and any modified PHP scripts.
    - **Do NOT** overwrite `options.csv` in production if it contains live user data (unless merging).

### Common Tasks
- **Update Version**: Change the version string in the footer of `bible.html` and the `console.log` init message.
- **Debug Auth**: Check `auth_check.php` response in Network Tab. Ensure user is logged into WordPress.
- **Debug Local File**: Check Console for "File System Access" errors. Verify "My Bible Data" status indicator (Green/Red).

---

## 8. Known Limitations
- **Browser Support**: File System Access API is supported in Chrome, Edge, and some modern browsers. Firefox/Safari may have limited support (fallback logic exists but limited).
- **Syncing**: There is **no cloud sync** for Bible text changes. The file lives on the user's device. `options.csv` is the only cloud capability currently.

---

*Documentation Generated by Antigravity Agent - 2026-01-07*
