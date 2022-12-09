#!/bin/bash

myip=$(dig @resolver1.opendns.com myip.opendns.com +short)
myip2=$(curl -s https://api.ipify.org)
myip3=$(curl -s https://ipinfo.io/ip)
myip4=$(curl -s https://ipecho.net/plain)

if [[ "$myip" == "$myip2" ]] && [[ "$myip" == "$myip2" ]] && [[ "$myip" == "$myip3" ]] && [[ "$myip" == "$myip4" ]] ; then
    echo "IPs match"

    curl --insecure \
        -H \
        --location \
        -v \
        POST https://ip.xcrawler.net/api/ip \
        --form "ip=\"$myip\"" \
        --form "wan=\"wan5\""
else
    echo "IPs do not match"
fi

echo "$myip"
echo "$myip2"
echo "$myip3"
echo "$myip4"
