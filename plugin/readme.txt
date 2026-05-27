=== Finkashi Companion ===

Contributors: Sligou
Tags: mascot, gamification, interactive, custom
Requires at least: 7.0
Tested up to: 7.0
Requires PHP: 8.2
Stable tag: 0.1.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Interactive mascot for Finkashi: contextual dialogues, anecdotes, and gamified visitor experience while preserving privacy.

== Description ==

Finkashi Companion adds an interactive companion to the Finkashi.fr website. The mascot reacts to user navigation, time spent on pages, and game-specific context to deliver contextual dialogues and anecdotes about the games reviewed on the site.

Designed with privacy-by-design principles: no cookies, no third-party tracking. Visitor progression is stored locally via localStorage, with optional JSON export/import for cross-device persistence.

== Features ==

* Contextual dialogues based on current page and visitor history
* Game-specific anecdotes attached to reviews
* Affinity system: deeper dialogues unlock as visitors return
* Time-of-day awareness (the mascot sleeps at night)
* Anti-repetition system to keep interactions fresh
* GDPR-compliant: no consent banner required (localStorage as service feature)
* Full JSON save/import system

== Installation ==

1. Upload the `finkashi-companion/` folder to `/wp-content/plugins/`
2. Activate the plugin via the Plugins menu in WordPress
3. Configure dialogues and anecdotes in **Companion → Dialogues** in the WordPress admin

== Changelog ==

= 0.1.0 =
* Initial development version