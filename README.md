# Filebrowser

Web interface to view, upload & delete files.

## Quick Start

1. Download `filebrowser` binary.
2. Create `php-custom.ini` file (name as you wish). Put it in the same directory as `filebrowser`.
3. Add php ini configuration, e.g.:
```ini
[php]
upload_max_filesize=5000M
post_max_size=5000M
max_file_uploads=10
```
4. Generate app key:
```bash
./filebrowser php-cli artisan key:generate
```
5. Set File Browser root directory (absolute path):
```bash
./filebrowser php-cli artisan filebrowser:set-root
```
6. Start server:
```bash
env PHP_INI_SCAN_DIR=$(pwd) ./filebrowser php-server 
```
