#!/usr/bin/env bash
set -euo pipefail

APP_DIR="${APP_DIR:-$HOME/relaunch}"
PHP_BIN="${PHP_BIN:-/opt/RZphp82/bin/php-cli}"
COMPOSER_PHAR="${COMPOSER_PHAR:-$APP_DIR/composer.phar}"

cd "$APP_DIR"

if [ ! -x "$PHP_BIN" ]; then
  echo "PHP binary not found: $PHP_BIN" >&2
  exit 1
fi

if [ ! -f "$COMPOSER_PHAR" ]; then
  echo "Composer PHAR not found, installing locally in $APP_DIR ..."
  curl -sS https://getcomposer.org/installer | "$PHP_BIN"
fi

if [ ! -f "composer.json" ]; then
  echo "composer.json not found in $APP_DIR" >&2
  exit 1
fi

if command -v git >/dev/null 2>&1 && [ -d ".git" ]; then
  echo "Updating repository..."
  git pull --ff-only
fi

echo "Installing Composer dependencies..."
"$PHP_BIN" "$COMPOSER_PHAR" install --no-dev --optimize-autoloader

if [ -f "vendor/bin/typo3" ]; then
  echo "Flushing TYPO3 caches..."
  "$PHP_BIN" vendor/bin/typo3 cache:flush || true
fi

echo "Deployment finished."
