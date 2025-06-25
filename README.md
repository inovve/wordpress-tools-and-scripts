For doubts and enquires please visit [Inovve Web Design](https://inovve.com/)

# wordpress-tools-and-scripts
WooCommerce Tools and Scripts

📝 update-slugs.php
This WordPress snippet ensures that the slug (post_name) of any post, page, or custom post type is automatically updated to match the title whenever the title is changed.

By default, WordPress does not update the slug after the initial post creation, even if the title changes. This behavior is ideal for preserving permalinks, but can be undesirable if you want the URL to always reflect the current title.

This code hook fixes that by detecting changes to the title and forcing an update to the slug on save.

⚙️ Behavior
Applies to all public post types (post, page, and any custom post types with 'public' => true).

Updates the post_name (slug) to a sanitized version of the new title only if the title has changed.

Skips autosaves, revisions, and avoids infinite loops by temporarily unhooking itself.

Can be safely added to your theme’s functions.php or a custom plugin.

⚠️ Important Notes
SEO Warning: Changing slugs can break existing links. If this matters for your site, you should consider implementing a redirect system to forward old URLs to the new ones.

If you're using a plugin or theme that depends on fixed slugs, test carefully.

📦 Example Use Cases
Dynamic content where titles are frequently edited and you want URLs to match automatically.

Custom post types like projects, events, or documentation where SEO-friendly, title-based URLs are important.

# reset-slugs.php WooCommerce Product Slug Regenerator Script

This script is a simple, direct method to regenerate the URL slugs for all published WooCommerce products based on their current product names. It is designed for use cases where product slugs have become inconsistent or need to be uniformly reset.

**Disclaimer:** This script directly modifies your database. **Always perform a full backup of your WordPress files and database before running this script.** Running this script will change product URLs, which will impact your site's SEO. You should plan for implementing 301 redirects from old URLs to new ones.

## Features

* Iterates through all published WooCommerce products.
* Generates a new slug for each product based on its current name using standard WordPress functions.
* Ensures the generated slug is unique.
* Updates the product with the new slug if it's different from the current one.
* Flushes WordPress rewrite rules to activate the new permalinks after completion.

## Requirements

* A working WordPress installation with WooCommerce installed and activated.
* FTP or file manager access to your WordPress installation files.
* Basic understanding of PHP and WordPress file structure.

## Installation

1.  **Backup Your Website:** **Crucially, create a complete backup of your WordPress database and files.** This script modifies product data, and a backup is essential for recovery if any issues occur.
2.  **Create the Script File:** Create a new file named `regenerate_product_slugs.php` in the root directory of your WordPress installation (the same directory as `wp-config.php` and `wp-load.php`).
3.  **Copy and Paste the Code:** Copy the provided PHP code (shown below) and paste it into the `regenerate_product_slugs.php` file.

# 🛒 WooCommerce Dynamic m² Calculator for Products with Dimensions
This simple WordPress + WooCommerce snippet displays the total square meters (m²) a customer is purchasing based on the selected quantity of a product, using the built-in Length and Width product fields.

✅ Features
Automatically calculates and displays square meters when a user selects quantity.

Works only for products that have both Length and Width defined.

Converts values from centimeters to meters (adjustable).

Real-time update when quantity is changed, including with + and - buttons (Woodmart theme compatible).

Places the result below the "Add to Cart" button for better visibility.

💡 Example Output
Está a comprar 3 unidade(s) = 0.72 m²

📦 Requirements
WordPress + WooCommerce

Product dimensions (length and width) set in cm

Theme: Compatible with most, including Woodmart

🧩 How to Use
Add the provided PHP code to your theme’s functions.php file or a custom plugin.

Set the Length and Width values for each product in the product edit screen under "Shipping".

The dynamic m² message will appear automatically on the product page when quantity is changed.
