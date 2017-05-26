#!/bin/bash
echo "Starting Memcashed..."
memcached -u daemon -S -l 0.0.0.0 $@
