#!/usr/bin/env bash
set -euo pipefail

REMOTE_HOST="${REMOTE_HOST:-stu127039249@57330566.ssh.w1.strato.hosting}"
REMOTE_DIR="${REMOTE_DIR:-relaunch}"
SSH_PORT="${SSH_PORT:-22}"

if ! command -v rsync >/dev/null 2>&1; then
  echo "rsync is required but not installed." >&2
  exit 1
fi

echo "Syncing project to ${REMOTE_HOST}:${REMOTE_DIR} ..."
rsync -az --delete \
  --exclude ".git" \
  --exclude ".ddev" \
  --exclude ".idea" \
  --exclude "var/*" \
  --exclude "vendor" \
  --exclude "composer.phar" \
  --exclude "public/fileadmin/_processed_" \
  --exclude "public/fileadmin/_temp_" \
  --exclude "config/system/settings.php" \
  --exclude "config/system/additional.php" \
  -e "ssh -p ${SSH_PORT}" \
  ./ "${REMOTE_HOST}:${REMOTE_DIR}/"

echo "Running remote deployment ..."
ssh -p "${SSH_PORT}" "${REMOTE_HOST}" "cd ${REMOTE_DIR} && chmod +x deploy.sh && ./deploy.sh"

echo "Rsync deployment finished."
