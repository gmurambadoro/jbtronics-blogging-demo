#!/usr/bin/env bash

# NB: This script must be run from inside the jbtronics-demo container

rm -rf var/ vendor/
symfony composer install \
  && symfony console doctr:migra:sync -n \
  && symfony console doctr:migra:migr -n \
  && symfony console doctr:fix:load -n

echo ""
echo "_> Installation complete "
echo "=> Website: http://localhost:6680"
echo "=> Database: http://localhost:6681"
echo ""


