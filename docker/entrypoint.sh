#!/usr/bin/env bash
set -e

# Update composer.
su developer -c 'composer update --no-interaction'

# Original entrypoint
/usr/local/bin/docker-php-entrypoint

exec "$@"