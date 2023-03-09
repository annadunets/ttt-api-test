#!/bin/bash
echo " Custom script | Mysql"

echo "Log into DB and show users:"
mysql --user=root --password=qwerty -e "SELECT User from mysql.user;"
mysql --user=root --password=qwerty -e "CREATE DATABASE ttt;"
mysql --user=root --password=qwerty -e "USE ttt;';"
