#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./html'
ext='*.html'

#str="s/<p><img(.*?)><\/p>/<img\1>/sg"
#str="s/<img(.*?)src='(.*?)'(.*?)>/<img src='\2'>/sg"
#str="s/<img src='(.*?)'>/\n\n<a href='\1'><img class='clImageThumb' src='\1'><\/a>\n\n/sg"
#str="s/\n\n\n\n<a/\n\n<a/sg"
str="s/<\/a>\n\n\n\n/<\/a>\n\n/sg"

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
