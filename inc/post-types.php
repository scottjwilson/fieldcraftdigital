<?php
/**
 * Register Custom Post Types
 */
function fieldcraft_register_post_types(): void
{
    register_post_type("case_study", [
        "labels" => [
            "name" => __("Case Studies", "fieldcraft"),
            "singular_name" => __("Case Study", "fieldcraft"),
        ],
        "public" => true,
        "has_archive" => true,
        "rewrite" => ["slug" => "work"],
        "supports" => ["title", "editor", "thumbnail", "excerpt"],
        "menu_icon" => "dashicons-portfolio",
        "show_in_rest" => true,
    ]);

    register_post_type("service", [
        "labels" => [
            "name" => __("Services", "fieldcraft"),
            "singular_name" => __("Service", "fieldcraft"),
        ],
        "public" => true,
        "has_archive" => false,
        "rewrite" => ["slug" => "services"],
        "supports" => [
            "title",
            "editor",
            "thumbnail",
            "excerpt",
            "page-attributes",
        ],
        "menu_icon" => "dashicons-hammer",
        "show_in_rest" => true,
    ]);

    register_post_type("team_member", [
        "labels" => [
            "name" => __("Team Members", "fieldcraft"),
            "singular_name" => __("Team Member", "fieldcraft"),
            "add_new" => __("Add New", "fieldcraft"),
            "add_new_item" => __("Add New Team Member", "fieldcraft"),
            "edit_item" => __("Edit Team Member", "fieldcraft"),
            "new_item" => __("New Team Member", "fieldcraft"),
            "view_item" => __("View Team Member", "fieldcraft"),
            "search_items" => __("Search Team Members", "fieldcraft"),
            "not_found" => __("No team members found", "fieldcraft"),
            "not_found_in_trash" => __(
                "No team members found in Trash",
                "fieldcraft",
            ),
        ],
        "public" => true,
        "has_archive" => false,
        "rewrite" => ["slug" => "team"],
        "supports" => ["title", "thumbnail"],
        "menu_icon" => "dashicons-groups",
        "show_in_rest" => true,
    ]);
}
add_action("init", "fieldcraft_register_post_types");

/**
 * Register custom meta fields for Team Members
 */
function fieldcraft_register_team_meta(): void
{
    register_post_meta("team_member", "position", [
        "show_in_rest" => true,
        "single" => true,
        "type" => "string",
        "sanitize_callback" => "sanitize_text_field",
    ]);
}
add_action("init", "fieldcraft_register_team_meta");

/**
 * Add meta box for Team Member position
 */
function fieldcraft_add_team_meta_boxes(): void
{
    add_meta_box(
        "team_member_details",
        __("Team Member Details", "fieldcraft"),
        "fieldcraft_team_meta_box_callback",
        "team_member",
        "normal",
        "high",
    );
}
add_action("add_meta_boxes", "fieldcraft_add_team_meta_boxes");

/**
 * Render the meta box
 */
function fieldcraft_team_meta_box_callback($post): void
{
    wp_nonce_field("fieldcraft_team_meta", "fieldcraft_team_meta_nonce");
    $position = get_post_meta($post->ID, "position", true);
    ?>
    <p>
        <label for="team_position"><strong><?php _e(
            "Position / Role",
            "fieldcraft",
        ); ?></strong></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr(
            $position,
        ); ?>" style="width: 100%; margin-top: 5px;" placeholder="e.g. CEO & Founder">
    </p>
    <?php
}

/**
 * Save the meta box data
 */
function fieldcraft_save_team_meta($post_id): void
{
    // Check nonce
    if (
        !isset($_POST["fieldcraft_team_meta_nonce"]) ||
        !wp_verify_nonce(
            $_POST["fieldcraft_team_meta_nonce"],
            "fieldcraft_team_meta",
        )
    ) {
        return;
    }

    // Check autosave
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can("edit_post", $post_id)) {
        return;
    }

    // Save position
    if (isset($_POST["team_position"])) {
        update_post_meta(
            $post_id,
            "position",
            sanitize_text_field($_POST["team_position"]),
        );
    }
}
add_action("save_post_team_member", "fieldcraft_save_team_meta");
