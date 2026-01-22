<?php
/**
 * Plugin Name: Featured Cases
 * Description: Custom Post Type to manage featured legal cases.
 * Version: 1.0
 * Author: Rodrigo Colella
 */

if (!defined('ABSPATH')) exit;

/* =========================================
 * Custom Post Type: Featured Case
 * ========================================= */
add_action('init', function () {

    register_post_type('featured_case', [
        'labels' => [
            'name'          => 'Featured Cases',
            'singular_name' => 'Featured Case',
        ],
        'public'       => true,
        'has_archive'  => false,
        'show_in_rest' => true,
        'supports'     => ['title'],
        'menu_icon'    => 'dashicons-portfolio',
    ]);

});

/* =========================================
 * Meta Boxes
 * ========================================= */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'featured_case_details',
        'Case Details',
        'featured_case_meta_box',
        'featured_case'
    );

});

function featured_case_meta_box($post) {

    $case_type = get_post_meta($post->ID, '_case_type', true);
    $settlement = get_post_meta($post->ID, '_settlement_amount', true);

    ?>
    <p>
        <label><strong>Case Type</strong></label><br>
        <input type="text" name="case_type" value="<?php echo esc_attr($case_type); ?>" style="width:100%">
    </p>

    <p>
        <label><strong>Settlement Amount</strong></label><br>
        <input type="text" name="settlement_amount" value="<?php echo esc_attr($settlement); ?>" style="width:100%">
    </p>
    <?php
}

/* =========================================
 * Save Meta
 * ========================================= */
add_action('save_post_featured_case', function ($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['case_type'])) {
        update_post_meta($post_id, '_case_type', sanitize_text_field($_POST['case_type']));
    }

    if (isset($_POST['settlement_amount'])) {
        update_post_meta($post_id, '_settlement_amount', sanitize_text_field($_POST['settlement_amount']));
    }

});

/* =========================================
 * Template Loader
 * ========================================= */
add_filter('template_include', function ($template) {

    if (is_page_template('featured-cases-list.php')) {
        return plugin_dir_path(__FILE__) . 'templates/featured-cases-list.php';
    }

    return $template;
});
