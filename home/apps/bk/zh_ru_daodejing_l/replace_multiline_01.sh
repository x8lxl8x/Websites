#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./texts'
ext='*.txt'

#str="s/\n\n<span id='en'>(.*?)<\/span>\n//sg"
#str="s/<span id='fr'>//sg"
#str="s/<\/span>\n//sg"
#str="s/\n\n---(.*)//sg"
#str="s/\|\](.*?)---/\|\]\n\n/sg"
str="s/\|\]\n/\|\]/sg"

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
