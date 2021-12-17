#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./html'
ext='*.html'

#str="s/<h1>/\n<h1>/sg"
#str="s/<h1>(.*?)<\/h1>/<h2>\1<\/h2>/sg"
#str="s/<h2>(.*?)<\/h2>/<h3>\1<\/h3>/sg"
str="s/<p>\n<span class='clFormula'>(.*?)<\/span><\/p>/\n<div class='clFormula'>\1<\/div>\n/sg"

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
