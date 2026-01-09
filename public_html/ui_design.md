# Walk for God Bible App - UI Design System

## Overview

This document defines the complete design system for the Walk for God Bible application. It provides all the information needed for developers and AI assistants to create new features that seamlessly match the existing professional UI theme.

**Design Philosophy:** Dark, elegant, and spiritual. The design uses a rich black background with gold and cyan accents to create a premium, focused reading experience.

---

## Color Palette

### Primary Colors

```css
:root {
    --black: #0a0a0a;              /* Primary background */
    --black-light: #1a1a1a;        /* Secondary background, modals */
    --gold: #d4af37;               /* Primary accent, borders, highlights */
    --gold-light: #f0d77c;         /* Lighter gold for gradients */
    --white: #ffffff;              /* Primary text */
}
```

### Accent Colors

```css
:root {
    --purple: #6b4c9a;             /* Audio/podcast buttons */
    --purple-dark: #4a3470;        /* Purple gradient end */
    --purple-light: #9d7fd1;       /* Purple hover state */
    --heavenly-blue: #4a90d9;      /* Links, secondary accents */
    --heavenly-blue-light: #7ab3eb;/* Blue hover state */
    --cyan: #2bb8b8;               /* Notice elements, info */
}
```

### Utility Colors

```css
:root {
    --highlight: #ffff00;          /* Search highlight background */
    --highlight-text: #000000;     /* Search highlight text */
    --gray-light: #f5f5f5;         /* Light gray (rarely used) */
    --gray: #888888;               /* Muted text, disabled states */
}
```

### Usage Guidelines

- **Gold (`--gold`)**: Use for primary interactive elements, borders, headings, and CTAs
- **Cyan (`--cyan`)**: Use for informational elements, notices, and secondary highlights
- **Purple**: Reserved for audio/media playback features
- **White**: Primary text color with opacity variations for hierarchy
- **Gray**: Use for secondary text, disabled states, and subtle UI elements

---

## Typography

### Font Families

```css
/* Headings - Serif for elegance */
font-family: 'Playfair Display', serif;

/* Body Text - Sans-serif for readability */
font-family: 'Inter', sans-serif;

/* Code/Technical - Monospace */
font-family: 'Courier New', monospace;
```

### Font Sizes & Hierarchy

```css
/* Page Title */
h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 600;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 100%);
    -webkit-background-clip: text;
    background-clip: text;
}

/* Modal Headers */
h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--gold);
}

/* Section Headers */
h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: var(--gold);
}

/* Subsection Headers */
h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--gold);
}

/* Body Text */
p, li {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    line-height: 1.6;
    color: rgba(255,255,255,0.9);
}
```

---

## Component Library

### Buttons

#### Primary Button (Gold)

```html
<button class="btn-primary">Primary Action</button>
```

```css
.btn-primary {
    padding: 1rem 3rem;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
    color: var(--black);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
}
```

#### Success Button (Green)

```html
<button class="btn-success">Save Changes</button>
```

```css
.btn-success {
    padding: 0.8rem 2rem;
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(40,167,69,0.3);
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40,167,69,0.5);
}
```

#### Outline Button

```html
<button class="btn-outline">Secondary Action</button>
```

```css
.btn-outline {
    background: transparent;
    border: 1px solid var(--gold);
    color: var(--gold);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-outline:hover {
    background: rgba(212, 175, 55, 0.15);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(212,175,55,0.2);
}
```

#### Icon Button

```html
<button class="icon-btn" aria-label="Settings">
    <svg><!-- icon --></svg>
</button>
```

```css
.icon-btn {
    background: transparent;
    border: none;
    color: var(--white);
    font-size: 1.2rem;
    padding: 0.5rem;
    cursor: pointer;
    width: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background 0.2s;
}

.icon-btn:hover:not(:disabled) {
    background: rgba(255,255,255,0.1);
}

.icon-btn:disabled {
    color: rgba(255,255,255,0.2);
    cursor: default;
}
```

---

### Form Elements

#### Text Input

```html
<input type="text" placeholder="Enter text..." />
```

```css
input[type="text"] {
    width: 100%;
    padding: 1rem 1.5rem;
    background: rgba(10, 10, 10, 0.6);
    border: 1px solid var(--gold);
    border-radius: 10px;
    color: var(--white);
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    transition: all 0.3s ease;
}

input[type="text"]:focus {
    outline: none;
    border: 2px solid var(--gold);
    box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
    padding: calc(1rem - 1px) calc(1.5rem - 1px);
}
```

#### Select Dropdown

```html
<select>
    <option value="">Select option...</option>
    <option value="1">Option 1</option>
</select>
```

```css
select {
    width: 100%;
    padding: 0.8rem 1rem;
    padding-right: 3rem;
    background: rgba(10,10,10,0.6);
    border: 1px solid var(--gold);
    border-radius: 10px;
    color: var(--white);
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    /* Custom gold arrow */
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23d4af37' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1.2rem;
}

select:focus {
    outline: none;
    border: 2px solid var(--gold);
    box-shadow: 0 0 15px rgba(212,175,55,0.3);
    padding: calc(0.8rem - 1px) calc(1rem - 1px);
    padding-right: calc(3rem - 1px);
}

select option {
    background-color: var(--black);
    color: var(--white);
}
```

#### Textarea

```html
<textarea rows="4" placeholder="Enter notes..."></textarea>
```

```css
textarea {
    width: 100%;
    background: rgba(0,0,0,0.3);
    border: 1px solid rgba(255,255,255,0.2);
    color: var(--white);
    padding: 1rem;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 1.2rem;
    line-height: 1.6;
    min-height: 150px;
    resize: vertical;
}

textarea:focus {
    outline: none;
    border-color: var(--gold);
    background: rgba(0,0,0,0.5);
}
```

---

### Modals & Popups

#### Modal Structure

```html
<div id="myModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Modal Title</h2>
            <button class="modal-close" onclick="closeModal('myModal')">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <!-- Content -->
        </div>
        <div class="modal-footer">
            <button class="btn-primary">Confirm</button>
        </div>
    </div>
</div>
```

#### Modal CSS

```css
.modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.85);
    z-index: 2000;
    backdrop-filter: blur(5px);
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.modal-overlay.active {
    display: flex;
}

.modal-content {
    background: var(--black-light);
    border: 1px solid var(--gold);
    border-radius: 20px;
    max-width: 800px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.modal-header {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(10, 10, 10, 0) 100%);
    padding: 2rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: relative;
}

.modal-header h2 {
    margin: 0;
    color: var(--gold);
    font-size: 1.8rem;
    font-family: 'Playfair Display', serif;
}

.modal-close {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: transparent;
    border: none;
    color: var(--gray);
    cursor: pointer;
    width: auto;
    padding: 0;
    transition: all 0.3s;
}

.modal-close:hover {
    color: var(--white);
    transform: rotate(90deg);
}

.modal-body {
    padding: 2rem;
    color: rgba(255,255,255,0.9);
}

.modal-footer {
    padding: 1.5rem 2rem 2rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
    border-top: 1px solid rgba(255,255,255,0.1);
}
```

---

### Cards & Containers

#### Verse Card

```html
<div class="verse-card">
    <div class="verse-reference">John 3:16</div>
    <div class="verse-text">For God so loved the world...</div>
</div>
```

```css
.verse-card {
    background: rgba(255, 255, 255, 0.03);
    border-left: 3px solid rgba(255,255,255,0.1);
    padding: 1.5rem;
    border-radius: 10px;
    transition: all 0.3s;
    margin-bottom: 0.5rem;
}

.verse-card:hover {
    background: rgba(255, 255, 255, 0.05);
    border-left-color: var(--gold);
}

.verse-card.featured {
    background: rgba(212, 175, 55, 0.1);
    border: 2px solid var(--gold);
    border-left: 5px solid var(--gold);
    transform: scale(1.02);
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}
```

#### Search Container

```css
.search-container {
    background: linear-gradient(135deg, rgba(26, 26, 26, 0.9) 0%, rgba(10, 10, 10, 0.95) 100%);
    border: 1px solid rgba(212, 175, 55, 0.3);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}
```

---

### Status Indicators

#### Status Dot

```html
<div class="status-dot green"></div>
<div class="status-dot red"></div>
```

```css
.status-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.status-dot.green {
    background-color: #4cd137;
    box-shadow: 0 0 10px rgba(76, 209, 55, 0.5);
}

.status-dot.red {
    background-color: #ff6b6b;
    box-shadow: 0 0 10px rgba(255, 107, 107, 0.5);
}
```

---

## Layout Guidelines

### Spacing System

Use consistent spacing based on `rem` units:

```css
/* Spacing scale */
0.25rem = 4px   /* Tiny gap */
0.5rem  = 8px   /* Small gap */
0.8rem  = 12.8px /* Medium-small */
1rem    = 16px  /* Base unit */
1.5rem  = 24px  /* Medium */
2rem    = 32px  /* Large */
3rem    = 48px  /* Extra large */
```

### Container Widths

```css
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Modal content */
max-width: 600px;  /* Settings, small modals */
max-width: 700px;  /* Editor modals */
max-width: 800px;  /* Info modals */
```

### Responsive Breakpoints

```css
/* Mobile */
@media (max-width: 480px) { }

/* Tablet */
@media (max-width: 768px) { }

/* Desktop */
@media (min-width: 769px) { }
```

---

## Animations & Transitions

### Standard Durations

```css
/* Quick interactions */
transition: all 0.2s ease;

/* Standard interactions */
transition: all 0.3s ease;

/* Slower, more dramatic */
transition: all 0.5s ease;
```

### Common Animations

#### Hover Lift

```css
element:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
}
```

#### Pulse (for active states)

```css
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(255, 107, 107, 0); }
    100% { box-shadow: 0 0 0 0 rgba(255, 107, 107, 0); }
}

.playing {
    animation: pulse 1.5s infinite;
}
```

#### Modal Slide In

```css
@keyframes modalSlideIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
```

---

## Best Practices

### Do's ✅

- **Always use CSS variables** for colors (e.g., `var(--gold)` not `#d4af37`)
- **Use Playfair Display** for all headings (h1-h4)
- **Use Inter** for all body text and UI elements
- **Add transitions** to interactive elements (0.3s is standard)
- **Use gold borders** for primary form elements
- **Include hover states** for all clickable elements
- **Use SVG icons** instead of text symbols (×, ▼, etc.)
- **Add box-shadows** to elevated elements (modals, cards)
- **Use gradients** for backgrounds and buttons
- **Maintain consistent border-radius**: 10px for buttons/inputs, 20px for modals

### Don'ts ❌

- **Don't use hard-coded hex colors** - always use CSS variables
- **Don't use Comic Sans or Arial** - stick to defined font families
- **Don't use sharp corners** - always round with border-radius
- **Don't use pure black (#000)** - use `var(--black)` (#0a0a0a)
- **Don't use pure white text** - use `rgba(255,255,255,0.9)` for better readability
- **Don't forget focus states** - accessibility is important
- **Don't use `&times;`** for close buttons - use SVG icons
- **Don't skip transitions** - they make the UI feel polished

---

## Quick Reference: Common Patterns

### Creating a New Modal

1. Copy modal structure from existing modal (e.g., Settings modal)
2. Update ID and title
3. Use `modal-header`, `modal-body`, `modal-footer` classes
4. Include SVG close button
5. Add `onclick="closeModal('yourModalId')"` to overlay and close button

### Creating a New Button

1. Choose appropriate class: `btn-primary`, `btn-success`, `btn-outline`, or `icon-btn`
2. Add hover state with `transform: translateY(-2px)`
3. Include appropriate box-shadow
4. Use Inter font family

### Creating a New Form Section

1. Wrap in `<div class="settings-section">`
2. Add section title with `<h4 class="section-title">`
3. Use `setting-item` class for each form field
4. Apply `setting-select` class to dropdowns
5. Include proper labels with appropriate styling

---

## Version History

- **v1.0** (2026-01-09): Initial design system documentation
- Covers all existing UI patterns in the Bible application
- Includes Settings modal, Backup modal, Edit modal, and Notes popup patterns

---

**For Questions or Updates:** Contact the development team or refer to `bible.html` for live implementation examples.
