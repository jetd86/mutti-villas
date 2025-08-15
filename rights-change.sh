#!/bin/bash
sudo chown -R www-data:www-data ./app
find ./app -type d -exec chmod 755 {} \;
find ./app -type f -exec chmod 644 {} \;
