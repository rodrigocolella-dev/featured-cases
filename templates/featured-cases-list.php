<?php
/* Template Name: Featured Cases List */

get_header();

$query = new WP_Query([
    'post_type'      => 'featured_case',
    'posts_per_page' => 3,
]);

echo '<h1>Featured Cases</h1>';

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        $case_type  = get_post_meta(get_the_ID(), '_case_type', true);
        $settlement = get_post_meta(get_the_ID(), '_settlement_amount', true);
        ?>
        <div style="margin-bottom:20px;">
            <h2><?php the_title(); ?></h2>
            <p><strong>Case Type:</strong> <?php echo esc_html($case_type); ?></p>
            <p><strong>Settlement:</strong> <?php echo esc_html($settlement); ?></p>
        </div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo '<p>No featured cases found.</p>';
}

get_footer();
