# For what this plugin is

**Problem**: WpAllImport plugin does not support Polylang plugin out of the box. WPML is supported, but it is not free.

**Resolution**: Specify language in product somehow, and then assign it to the product.

[CSV Document example](./readme/hotels.csv)

# Installation

During *WpAllImport* session, specify custom property `pl_lang`.

Value from there will be used later for polylang plugin, for set up language of post.

Available languages are (testes):

- en
- es
- ru
- cn

# How to use

1. Install and activate the plugin.

2. Prepare document for import: add column for holding localization property (e.g. `pl_lang`). Fill it up with locale code (e.g. `en`, `es`, `ru`, `cn`).

3. Throw this value to or attributes, or to custom fields (take a look at screenshots)
![](./readme/import.gif)

4. Begin import and wait till the finish
![](./readme/assign.gif)

5. Follow to plugin page and click on the button "Link products to languages"

6. Check if language assigned
