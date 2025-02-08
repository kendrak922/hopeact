# Block: Accordion Tabs

## Block Documentation

### Accordions

Nothing special.
Just accordions. optional buttons below the content

### JumpNav

This layout is tabs, but turns into a "jump nav" on mobile.

#### Content

Nothing special. Can have an optional image appear on the right side, optional buttons below the content.

#### Team Members

Team members can be manually selected in the order desired, or come in as a feed. I sorted by menu order so you can edit the order of the team member posts for easy sorting. By deafult, it's just alphabetical.

#### Publications

Repeater of publications, they wanted to keep the ones for the year always in their own row which is why it isn't simply a repeater of files. So now you create the row and then put the publications inside of it.

### Tabs

Disabled

---

## Possible next steps

Publications to pull the PDF preview may be neat

---

## Style notes

Uses atomic design for consistent styling

### Atoms:

- 'media/image'

### Molecules:

- 'buttons/button-group'

---

## File Overview

High level details about each file:

- **accordion-tabs.js**
  - Custom events and behaviors for this block. - Each method has a comment block detailing its use cases and how to use.
  - Includes:
    - JS Class Init
    - Document Ready
    - Window Resize
- **accordion-tabs.php**
  - Used to register block within functions.php
  - Layout file to render block HTML output
- **accordion-tabs.scss**
  - Styles for the appearance and layout of this specific block. Kept styles in components where we could and forwarded them to this file.

&nbsp;

---

## Block Demo

You can see a demo of this block in action on the starter theme staging site

- https://fjorge-wp-starter.l05.project-qa.com/starter-block-accordion-tabs/

&nbsp;
