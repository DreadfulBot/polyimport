<?php

/**
 * Plugin Name:     Polyimport
 * Plugin URI:      git@github.com:DreadfulBot/polyimport.git
 * Description:     Polylang + WpAllImport Integration
 * Author:          Artem Krivoshchekov
 * Author URI:      roxl.ru
 * Text Domain:     polyimport
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Polyimport
 */

use Riskyworks\Polyimport\Admin\SettingsPage;
use Riskyworks\Polyimport\CustomFields\LanguageCF;
use Riskyworks\Polyimport\SetProductLanguage\SetProductLanguageAction;

// Your code starts here.
//
//
require_once __DIR__ . '/vendor/autoload.php';

define('PI_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PI_PLUGIN_URL', plugin_dir_url(__FILE__));

new SetProductLanguageAction();
new SettingsPage();
new LanguageCF();
