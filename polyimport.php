<?php

/**
 * Plugin Name:     Polyimport
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     polyimport
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Polyimport
 */

use Riskyworks\Polyimport\Admin\SettingsPage;

// Your code starts here.
//
//
require_once __DIR__ . '/vendor/autoload.php';

define('PCM_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PCM_PLUGIN_URL', plugin_dir_url(__FILE__));

new SettingsPage();
