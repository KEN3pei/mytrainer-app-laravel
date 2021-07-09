#!/bin/sh

docker network create ALLHOME-PROJECT-NETWORK

docker-compose -p mytrainer-app-application-server -f /var/app/docker-compose.yml down

docker-compose -p mytrainer-app-application-server -f /var/app/docker-compose.yml up -d