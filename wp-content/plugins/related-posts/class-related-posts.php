<?php
// Class name
class Related_Posts {

    public function init() {
        // Hook into the_content to display related posts
        add_filter( 'the_content', array( $this, 'display_related_posts' ) );
    }

    public function display_related_posts( $content ) {
        if ( is_single() && is_main_query() ) {
            // Fetch related posts
            $related_posts = $this->get_related_posts();

            // Prepare the postmeta
            $postmeta = '<div class="related-posts">';
            foreach ( $related_posts as $post ) {
                setup_postdata( $post );
                $postmeta .= '<div class="related-post">';
                $postmeta .=  wp_kses_post( get_the_post_thumbnail( $post->ID, 'thumbnail' ) );
                $postmeta .= '<h3>' . esc_html( get_the_title( $post->ID ) ) . '</h3>';
                $postmeta .= '<p>' . esc_html( get_the_excerpt( $post->ID ) ) . '</p>';
                $postmeta .= '</div>';                
            }
            wp_reset_postdata();
            $postmeta .= '</div>';

            // Append the postmeta to the original content
            $content .= $postmeta;
        }

        return $content;
    }

    private function get_related_posts() {
        global $post;

        // Get tags and categories of the current post
        $tags = wp_get_post_tags($post->ID);
        print_r($tags);
        $categories = wp_get_post_categories($post->ID);

        // Set up the query arguments
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3, // Adjust the number of related posts to show
            'orderby' => 'rand', // Order By Random
            'post__not_in' => array($post->ID), // Exclude the current post
            'category__in' => $categories,
            'tag__in' => $tags,
            'ignore_sticky_posts' => 1
        );

        // Perform the query
        $related_posts_query = new WP_Query($args);
        return $related_posts_query->posts;
    }
}
