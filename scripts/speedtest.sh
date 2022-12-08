#!/bin/bash

speedtestData=$(speedtest -f json --output-header -p no)

curl -X POST http://127.0.0.1:8000/api/speedtest -H "Content-Type: application/json"  \
--header 'Content-Type: application/json' \
--data-raw "$speedtestData"
