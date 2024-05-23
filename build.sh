#!/usr/bin/env bash

source ./docker.env

docker compose --env-file=docker.env up --build -d

echo "Web:        http://localhost:$APP_PORT"
echo "phpMyAdmin: http://localhost:$PMA_PORT"

