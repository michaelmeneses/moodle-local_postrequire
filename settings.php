<?php

/**
 * PostRequire Local
 *
 * @package    local_postrequire
 * @copyright  2017 FAMASA
 * @license    Commercial
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN) {

    $settings = new admin_settingpage('local_postrequire', get_string('pluginname', 'local_postrequire'));
    $ADMIN->add('localplugins', $settings);

    // Enable
    $name = 'local_postrequire/enabled';
    $title = get_string('enabled', 'local_postrequire');
    $description = get_string('enableddesc', 'local_postrequire');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0, true, false);
    $settings->add($setting);

}
