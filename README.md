# Finkashi Companion

[![CI](https://github.com/alexandre-imbernon/finkashi-companion/actions/workflows/ci.yml/badge.svg)](https://github.com/alexandre-imbernon/finkashi-companion/actions/workflows/ci.yml)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4)
![WordPress](https://img.shields.io/badge/WordPress-7.0-21759B)
![License](https://img.shields.io/badge/License-MIT-green)

Interactive companion plugin for [finkashi.fr](https://finkashi.fr), a niche gaming review website. The mascot reacts to user navigation, time spent on pages, and game-specific context to deliver contextual dialogues and anecdotes — without using cookies or any third-party tracking.

## Project context

This plugin is developed as a portfolio project for the French RNCP-5 *Développeur Web et Web Mobile* (DWWM) certification. It demonstrates modern WordPress plugin development with strict POO architecture, full test coverage, static analysis, and CI/CD.

## Tech stack

- **PHP 8.3** with strict typing
- **WordPress 7.0** as host platform
- **MariaDB 11** for relational storage
- **Redis 7** for NoSQL caching
- **Composer** with PSR-4 autoloading
- **PHPUnit 11** for unit testing
- **PHPStan level 8** for static analysis
- **PHP_CodeSniffer** for PSR-12 style enforcement
- **Docker Compose** for the development environment
- **GitHub Actions** for continuous integration

## Local setup

Prerequisites: [Docker Desktop](https://www.docker.com/products/docker-desktop) installed.

\`\`\`bash
# Clone the repository
git clone https://github.com/alexandre-imbernon/finkashi-companion.git
cd finkashi-companion

# Start the development environment
cd docker
docker compose up -d

# Install PHP dependencies (from plugin/ directory)
cd ../plugin
docker run --rm -v "${PWD}:/app" -w /app composer:latest install
\`\`\`

Then visit:
- WordPress: http://localhost:8080
- PHPMyAdmin: http://localhost:8081 (login: `root` / `root_dev_pwd`)

Complete the WordPress installation wizard, then activate the **Finkashi Companion** plugin in *Plugins → Installed Plugins*.

## Development commands

All commands run inside the Composer Docker container. Run from the `plugin/` directory:

\`\`\`bash
# Run unit tests
docker run --rm -v "${PWD}:/app" -w /app composer:latest run test

# Run static analysis (PHPStan level 8)
docker run --rm -v "${PWD}:/app" -w /app composer:latest run phpstan

# Run code style check (PSR-12)
docker run --rm -v "${PWD}:/app" -w /app composer:latest run phpcs

# Auto-fix code style issues
docker run --rm -v "${PWD}:/app" -w /app composer:latest run phpcbf
\`\`\`

## Project structure

\`\`\`
finkashi-companion/
├── .github/workflows/      # GitHub Actions CI configuration
├── docker/                 # Docker Compose for local dev environment
├── plugin/                 # The actual WordPress plugin
│   ├── src/                # PHP classes (POO)
│   ├── tests/              # PHPUnit tests
│   │   ├── Unit/           # Unit tests
│   │   └── Integration/    # Integration tests (DB, API)
│   ├── composer.json       # PHP dependencies
│   ├── phpunit.xml         # PHPUnit configuration
│   ├── phpstan.neon        # PHPStan configuration
│   └── finkashi-companion.php  # Plugin entry point
├── docs/                   # Project documentation (coming)
└── README.md
\`\`\`

## Roadmap

- [x] **Phase 0** — Development environment, Composer, PHPUnit, PHPStan, CI/CD
- [ ] **Phase 1** — Specification, ERD, Figma mockups, dialogue writing
- [ ] **Phase 2** — Database layer with custom tables and migrations
- [ ] **Phase 3** — Repository pattern with `$wpdb->prepare()` and security
- [ ] **Phase 4** — Service layer with business logic and full unit tests
- [ ] **Phase 5** — REST API endpoints with validation and nonces
- [ ] **Phase 6** — WordPress admin back-office
- [ ] **Phase 7** — Frontend JavaScript module with state management
- [ ] **Phase 8** — Security audit, GDPR compliance, deployment procedure
- [ ] **Phase 9** — Production deployment on finkashi.fr

## Privacy by design

This plugin uses **localStorage** to persist visitor state and progression. No cookies are set, no personal data is collected, no third-party tracking occurs. Visitors can:

- Disable the mascot at any time (and clear all local data)
- Export their progression as a JSON file
- Import a previously exported progression on any device

This approach is exempted from GDPR consent requirements under the CNIL/ePrivacy framework for "strictly necessary to the service" mechanisms.

## License

[MIT](LICENSE) © 2026 Sligou — [finkashi.fr](https://finkashi.fr)