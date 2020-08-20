<?php
/**
 * WordPress Meetups Widget
 *
 * The WordPress Meetups Widget is a widget for displaying Official WordPress meetups on the front end,
 * similarly to how the dashboard widget displays events.
 *
 * @package   wordpress-meetups-widget
 * @author    Matt Graham <m@mattgraham.ca>
 * @license   GPL-3.0+
 * @link      http://example.com
 * @copyright 2011 - 2019 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Meetups Widget
 * Plugin URI:        https://github.com/tommcfarlin/wordpress-widget-boilerplate
 * Description:       The WordPress Meetups Widget is a widget for displaying Official WordPress meetups on the front end.
 * Version:           1.0
 * Author:            Matt Graham
 * Author URI:        https://mattgraham.ca
 * Text Domain:       wordpress-meetups-widget
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:       /languages
 */

namespace WordPressMeetupsWidget;

use WordPressMeetupsWidget\Utilities\Registry;
use WordPressMeetupsWidget\Plugin;
use WordPressMeetupsWidget\Subscriber\WidgetSubscriber;
use WordPressMeetupsWidget\Subscriber\DeleteWidgetCacheSubscriber;

// Prevent this file from being called directly.
defined('WPINC') || die;

// Include the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

// Setup a filter so we can retrieve the registry throughout the plugin.
$registry = new Registry();
add_filter('wpwBoilerplateRegistry', function () use ($registry) {
    return $registry;
});

// Add subscribers.
$registry->add('deleteWidgetCacheSubscriber', new DeleteWidgetCacheSubscriber('flush_widget_cache'));

// Add the Widget base class to the Registry.
$registry->add('widgetSubscriber', new WidgetSubscriber('widgets_init'));

// Start the machine.
(new Plugin($registry))->start();
