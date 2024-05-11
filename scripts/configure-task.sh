#!/bin/bash

# Get the path of the current directory
PROJECT_PATH=$(dirname "$(realpath "$0")")

# Add the scheduled task to cron
(crontab -l ; echo "*/5 * * * * php $PROJECT_PATH/artisan schedule:run >> $PROJECT_PATH/storage/logs/cron.log 2>&1") | crontab -


