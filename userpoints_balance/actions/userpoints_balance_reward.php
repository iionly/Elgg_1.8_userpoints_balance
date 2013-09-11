<?php
/**
 * Gain userpoints for hours worked - a skeletal plugin that might need to get customized according to your needs.
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author iionly
 * @copyright iionly
 */

// get the form input
$params = get_input('params');
$hours_worked = $params['hours_worked'];
$description = $params['description'];

//get GUID and name of user who has entered the hours of revisions
$user_guid = elgg_get_logged_in_user_guid();
$username = elgg_get_logged_in_user_entity()->name;

if(function_exists('userpoints_add')) {

    // Add userpoints
    $userpoints_balance = $hours_worked * USERPOINTS_PER_HOUR;
    if($description == '') {
        $description = elgg_echo('userpoints_balance:no_description', array($username));
    }
    $success = userpoints_add($user_guid, $userpoints_balance, 'Userpoint Balance: '.$description);

    if($success) {
        system_message(elgg_echo('userpoints_balance:pointsuccess', array($userpoints_balance, $hours_worked)));
    } else {
        register_error(elgg_echo('userpoints_balance:pointfail'));
    }

}

forward(REFERER);
