<?php
namespace Inc\Admin;
use Inc\Models\ObjectViewerCPT;
use Inc\Frontend\Shortcode;

class ObjectViewerColumns {
    public static function init() {
        add_action("manage_". ObjectViewerCPT::$slug . "_posts_columns",  [self::class, "custom_columns"]);
        add_action("manage_". ObjectViewerCPT::$slug . "_posts_custom_column",  [self::class, "display_columns_data"], 10, 2);
    }

    /**
     * Adds custom columns to the posts admin dashboard
     */
    public static function custom_columns($columns) {
        $columns['shortcode'] = 'Shortcode';
        return $columns;
    }

    /**
     * Display the data for the column of each post
     */
    public static function display_columns_data($column_name, $post_id) {
        if ($column_name === 'shortcode') {
            $shortcode = "[" . Shortcode::$shortcode_name . " id=\"" . $post_id ."\"]";
            ob_start();
            ?>
                <div>
                    <code><?php echo $shortcode ?></code>
                    <!-- TODO: Make Copy Button work -->
                    <div class="button-primary">TODO: Copy</div>
                </div>
            <?php
            echo ob_get_clean();
        }
    }
}
