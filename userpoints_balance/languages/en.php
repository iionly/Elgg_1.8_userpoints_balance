<?php
/**
 * Gain userpoints for hours worked - a skeletal plugin that might need to get customized according to your needs.
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author iionly
 * @copyright iionly
 */

$english = array(
    'userpoints_balance:menu' => 'Userpoint balance',
    'userpoints_balance:title' => 'Userpoint balance',

    'userpoints_balance:overview' => 'On this page you can report how many hours you have worked on revisions. For every hour you will be rewarded with %s userpoints.',
    'userpoints_balance:hours_worked' => 'How many hours have you worked on revisions? ',
    'userpoints_balance:description' => 'Optionally you can describe briefly what you have been working on: ',
    'userpoints_balance:proceed' => 'Reward me!',

    'userpoints_balance:no_description' => '%s hasn\'t added an accompanying text.',

    'userpoints_balance:pointfail' => "An error occured within the userpoints api!",
    'userpoints_balance:pointsuccess' => "You have been rewarded with %s userpoints for %s hours of revisions.",
);

add_translation("en",$english);
