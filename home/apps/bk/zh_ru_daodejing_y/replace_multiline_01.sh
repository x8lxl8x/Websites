#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./texts'
ext='*.txt'

#str="s/\n\n<span id='en'>(.*?)<\/span>\n//sg"
#str="s/<span id='fr'>//sg"
#str="s/<\/span>\n//sg"
#str="s/\[\|(.*?)\|\]\n//sg"
#str="s/# (.*?)\n/# \1/sg"
#str="s/# (\d\d)\./# \1@/sg"
#str="s/\. /\.\n\n/sg"
#str="s/, /,\n/sg"
#str="s/; /;\n/sg"
str="s/# (\d\d)\./# <small>\1\.<\/small>/sg"

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
