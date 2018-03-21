Drupal to WP Migration

Steps:

Create both wp and drupal database on staging.
Run SQL script to migrate drupal blog posts into wp wp_posts table.
Clean up the blog post_names using blog.php which uses PHP PDO to connect to the wp database.

** Remember to replace placeholders with real database info on both files.
