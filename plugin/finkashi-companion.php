<?php
/**
 * Plugin Name:       Finkashi Companion
 * Plugin URI:        https://finkashi.fr
 * Description:       Interactive mascot for Finkashi: contextual dialogues, anecdotes, and gamified visitor experience while preserving privacy.
 * Version:           0.1.0
 * Requires at least: 7.0
 * Requires PHP:      8.2
 * Author:            Sligou
 * Author URI:        https://finkashi.fr
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       finkashi-companion
 * Domain Path:       /languages
 */

declare(strict_types=1);

// Prevent direct file access (basic security)
if (!defined('ABSPATH')) {
    exit;
}

// Plugin-wide constants
define('FINKASHI_COMPANION_VERSION', '0.1.0');
define('FINKASHI_COMPANION_PATH', plugin_dir_path(__FILE__));
define('FINKASHI_COMPANION_URL', plugin_dir_url(__FILE__));

// Composer autoloader
$autoloader = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloader)) {
    add_action('admin_notices', function (): void {
        echo '<div class="notice notice-error"><p>';
        echo '<strong>Finkashi Companion:</strong> Composer dependencies are not installed. ';
        echo 'Run <code>composer install</code> in the plugin directory.';
        echo '</p></div>';
    });
    return;
}
require_once $autoloader;

// Activation hook: runs once when the plugin is activated
register_activation_hook(__FILE__, function (): void {
    // Later: create DB tables, default options, etc.
    flush_rewrite_rules();
});

// Deactivation hook: runs once when the plugin is deactivated
register_deactivation_hook(__FILE__, function (): void {
    // Later: clean caches, unregister crons
    flush_rewrite_rules();
});

// Visible test notice to confirm the plugin loads properly
add_action('admin_notices', function (): void {
    if (get_current_screen()?->id === 'plugins') {
        $plugin = new \Finkashi\Companion\Plugin(FINKASHI_COMPANION_VERSION);

        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>' . esc_html($plugin->getName()) . '</strong> ';
        echo 'is loaded — version ' . esc_html($plugin->getVersion()) . '</p>';
        echo '</div>';
    }
});