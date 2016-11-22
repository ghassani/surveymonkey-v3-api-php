#!/bin/bash

SERVER_ADDRESS=$1
SERVER_PORT=$2

if [ -z "$SERVER_ADDRESS" ] 
	then
  		SERVER_ADDRESS='localhost'
fi

if [ -z "$SERVER_PORT" ] 
	then
  		SERVER_PORT='8080'
fi

php -S "$SERVER_ADDRESS:$SERVER_PORT"