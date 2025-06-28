#!/bin/bash

echo "running"

for file in ../migrations/*.php; do
	echo "running $file"
	php "$file"
	if [$? -eq 0 ]; then
		echo "$file successful"
	else
		echo "error in $file"
		exit 1
	fi
done
echo "done"
