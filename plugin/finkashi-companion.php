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

// Empêche un accès direct au fichier (sécurité de base)
if (!defined('ABSPATH')) {
    exit;
}

// Constantes utiles dans tout le plugin
define('FINKASHI_MASCOT_VERSION', '0.1.0');
define('FINKASHI_MASCOT_PATH', plugin_dir_path(__FILE__));
define('FINKASHI_MASCOT_URL', plugin_dir_url(__FILE__));

// Hook d'activation : appelé une seule fois quand on active le plugin
register_activation_hook(__FILE__, function (): void {
    // Plus tard : créer les tables BDD, options par défaut, etc.
    flush_rewrite_rules();
});

// Hook de désactivation : appelé une seule fois quand on désactive le plugin
register_deactivation_hook(__FILE__, function (): void {
    // Plus tard : nettoyer les caches, désinscrire les crons
    flush_rewrite_rules();
});

// Petit test visible pour valider que le plugin charge bien
add_action('admin_notices', function (): void {
    if (get_current_screen()?->id === 'plugins') {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>Finkashi Mascot</strong> is loaded — version ' . esc_html(FINKASHI_MASCOT_VERSION) . '</p>';
        echo '</div>';
    }
});