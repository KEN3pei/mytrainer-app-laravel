#!/bin/sh

sudo yum update -y
echo y | sudo yum install docker
echo y | sudo curl -L https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
sudo service docker start

docker network create ALLHOME-PROJECT-NETWORK

docker-compose -p mytrainer-app-application-server -f /var/app/docker-compose.yml down

docker-compose -p mytrainer-app-application-server -f /var/app/docker-compose.yml up -d