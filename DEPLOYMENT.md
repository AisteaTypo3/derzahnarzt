# Deployment

## STRATO Vorbereitung

Dieses Projekt ist ein Composer-basiertes TYPO3-Projekt mit `public/` als Webroot.

Für Produktion auf STRATO solltest du diese Punkte vorbereiten:

1. Server mit PHP 8.2 und SSH-Zugang verwenden.
2. Document-Root auf `public/` zeigen lassen.
3. Composer-Install auf dem Server oder im CI mit `composer install --no-dev --optimize-autoloader`.
4. `config/system/settings.php` nicht aus Entwicklung kopieren, sondern produktionsspezifisch pflegen.
5. Eine produktionsspezifische `config/system/additional.php` oder ein separates Include für:
   - Datenbank-Zugang
   - `trustedHostsPattern`
   - Mail-Transport
   - `SYS.displayErrors = 0`
6. Schreibrechte für `var/` sicherstellen.
7. Nach jedem Deploy TYPO3-Caches leeren.

## Empfohlener Ablauf

1. Code per Git auf den Server bringen.
2. `composer install --no-dev --optimize-autoloader` ausführen.
3. Produktions-Konfiguration hinterlegen.
4. Falls nötig Datenbank-Migrationen ausführen.
5. Cache leeren.
6. Frontend und Backend kurz prüfen.

## Beispiel Befehle

```bash
composer install --no-dev --optimize-autoloader
vendor/bin/typo3 cache:flush
```

## STRATO Script

Für deine STRATO-Umgebung passt ein Deploy über lokales `composer.phar` und festes PHP 8.2 Binary.

Script im Projekt: [deploy.sh](/Users/aistea/PhpstormProjects/derzahnarzt/deploy.sh)

Beispiel auf dem Server:

```bash
cd ~/relaunch
chmod +x deploy.sh
./deploy.sh
```

Falls dein Projekt nicht in `~/relaunch` liegt, kannst du den Pfad überschreiben:

```bash
APP_DIR="$HOME/relaunch" PHP_BIN="/opt/RZphp82/bin/php-cli" ./deploy.sh
```

## Einmaliger Upload ohne Git

Wenn du den ersten Deploy ohne Git machen willst, nutze das lokale Script:

Script im Projekt: [deploy-rsync.sh](/Users/aistea/PhpstormProjects/derzahnarzt/deploy-rsync.sh)

Es macht:

- Upload per `rsync` nach STRATO
- lässt produktive `config/system/settings.php` und `config/system/additional.php` auf dem Server unangetastet
- startet danach auf dem Server automatisch [deploy.sh](/Users/aistea/PhpstormProjects/derzahnarzt/deploy.sh)

Verwendung lokal:

```bash
chmod +x deploy-rsync.sh
./deploy-rsync.sh
```

Optional mit anderen Zielwerten:

```bash
REMOTE_HOST="stu127039249@57330566.ssh.w1.strato.hosting" REMOTE_DIR="relaunch" ./deploy-rsync.sh
```

Voraussetzung:

- `rsync` lokal installiert
- SSH-Zugang zu STRATO
- produktive `config/system/settings.php` auf dem Server vorhanden

## Empfehlung

Wenn STRATO SSH und Composer sauber unterstützt, ist ein Git-basiertes Deployment am stabilsten:

- Repository auf den Server clonen
- `public/` als Webroot konfigurieren
- produktive `config/system/settings.php` auf dem Server pflegen
- Deploy-Skript für Composer-Install und Cache-Flush anlegen

Falls dein STRATO-Paket keinen guten SSH-/Composer-Workflow zulässt, wäre alternativ ein Build lokal oder in CI und anschließend ein Upload des fertig gebauten Releases sinnvoll.
