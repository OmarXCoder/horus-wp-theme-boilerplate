<?php



/**
 * Determines if post thumbnail can be displayed.
 */
function ox_can_show_post_thumbnail()
{
    return apply_filters('ox_can_show_post_thumbnail', !post_password_required() && !is_attachment() && has_post_thumbnail());
}

/**
 * Get a list of top level (parents) menu items for a
 * specific theme location
 * 
 * @param $location theme location
 * @return array $menu_items if any
 */
function ox_get_top_level_menu_items($location)
{
    $items = [];
    if (($location) && ($locations = get_nav_menu_locations()) && isset($locations[$location])) {
        $menu = get_term($locations[$location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == 0) {
                $items[] = [
                    'url' => $menu_item->url,
                    'title' => $menu_item->title
                ];
            }
        }
    }
    return $items;
}
