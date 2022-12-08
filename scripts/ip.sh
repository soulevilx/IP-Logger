#!/bin/bash

myip=$(dig @resolver1.opendns.com myip.opendns.com +short)

curl -X POST http://127.0.0.1:8000/api/ip \
--form "ip=\"$myip\""
