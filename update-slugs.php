add_action('save_post', function($post_id) {
    // Avoid infinite loops and autosaves
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;

    $post = get_post($post_id);
    if (!$post) return;

    // Only run on public post types (post, page, custom post types)
    $post_type_obj = get_post_type_object($post->post_type);
    if (!$post_type_obj || !$post_type_obj->public) return;

    // Get current slug and title
    $current_slug = $post->post_name;
    $new_slug = sanitize_title($post->post_title);

    // Only update if slug doesn't match the title
    if ($current_slug !== $new_slug) {
        // Unhook temporarily to avoid infinite loop
        remove_action('save_post', __FUNCTION__);

        // Update post slug
        wp_update_post([
            'ID' => $post_id,
            'post_name' => $new_slug,
        ]);

        // Re-hook
        add_action('save_post', __FUNCTION__);
    }
});
