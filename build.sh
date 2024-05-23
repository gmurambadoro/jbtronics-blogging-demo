#!/usr/bin/env bash

docker compose up --build -d

echo "Website:    http://localhost:6680"
echo "phpMyAdmin: http://localhost:6681"

