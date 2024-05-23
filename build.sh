#!/usr/bin/env bash

docker compose up --build -d

echo "Web:        http://localhost:6680"
echo "phpMyAdmin: http://localhost:6681"

