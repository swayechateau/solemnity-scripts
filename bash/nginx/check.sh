#!/bin/bash

# Define the output file path
output_file="nginx_check_output.txt"

# Check nginx configuration with nginx -t and redirect the output to the file
nginx -t &> "$output_file"

# Check if the output file contains the desired phrases using grep
if grep -qE "syntax is ok|test is successful" "$output_file"; then
    echo "nginx configuration test passed. Continue with other commands here."
else
    echo "nginx configuration test failed. Stopping script."
    exit 1
fi

# If nginx configuration test passed, continue with other commands...
