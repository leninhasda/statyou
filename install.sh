#!/bin/bash

composer install
cp .env.example .env
php artisan key:generate

echo "================================================="
echo "Laravel installation complete"
echo "================================================="
echo "Update DB details in .env file the run:"
echo ""
echo " php artisan migrate"
echo " php artisan faker:run"
