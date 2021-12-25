#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./html'
ext='*.html'

str="s/<h5>(.*?)<\/h5>/<div><b><i>\1<\/i><\/b><\/div>/sg"

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
