<?php
/**
 * Gain userpoints for hours worked - a skeletal plugin that might need to get customized according to your needs.
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author iionly
 * @copyright iionly
 */


/**
 * Are more elegant way would be to allow for configuring the number of userpoints to be gained per hour of work via a plugin setting
 * but defining it here is the lazy way...
 */
define("USERPOINTS_PER_HOUR", 10);


/**
 * Get it going
 */
elgg_register_event_handler('init', 'system', 'userpoints_balance_init');

/**
 * Initialize Plugin
 */
function userpoints_balance_init() {

    // Show in Menu
    if (elgg_is_logged_in()) {
        elgg_register_menu_item('site', array('name' => elgg_echo('userpoints_balance:menu'),
                                              'text' => elgg_echo('userpoints_balance:menu'),
                                              'href' => elgg_get_site_url() . 'userpoints_balance/userpoints_balance'));
    }

    // routing of urls
    elgg_register_page_handler('userpoints_balance', 'userpoints_balance_page_handler');

    // register the action
    elgg_register_action('userpoints_balance/userpoints_balance_reward', elgg_get_plugins_path() . 'userpoints_balance/actions/userpoints_balance_reward.php', 'logged_in');
}

/**
 * Page handler
 */
function userpoints_balance_page_handler($page) {

    if (!isset($page[0])) {
        $page[0] = 'userpoints_balance';
    }

    $page_type = $page[0];
    switch ($page_type) {
        case 'userpoints_balance':
            $area2 = elgg_view_title(elgg_echo('userpoints_balance:title'));
            // Add the form to this section
            $area2 .= elgg_view('userpoints_balance/userpoints_balance');
            break;
        default:
            return false;
    }

    // Format page
    $body = elgg_view('page/layouts/one_sidebar', array('content' => $area2));

    // Draw it
    echo elgg_view_page(elgg_echo('userpoints_balance:title'), $body);

    return true;
}
