#!/usr/bin/env bash

docker run -p 80:80 -p 443:443 -p 443:443/udp -v $PWD:/app --name filebrowser dunglas/frankenphp
