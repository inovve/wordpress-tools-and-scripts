# wordpress-tools-and-scripts
WooCommerce Tools and Scripts

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
