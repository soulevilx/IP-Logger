#!/bin/bash

speedtestData=$(speedtest -f json --output-header -p no)

curl --insecure -X POST https://ip.xcrawler.net/api/speedtest \
--header 'Content-Type: application/json' \
--data-raw "$speedtestData"
