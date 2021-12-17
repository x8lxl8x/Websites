#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./texts'
ext='*.txt'

#str="s/^(.*?)<div id='idContent'>\n//sg"
#str="s/\n<\/div>\n<\/div>\n<\/body>\n<\/html>//sg"
#str="s/<h1>\d\d - (.*?)<\/h1>/# \1/sg"
#str="s/<h1>(\d\d\d) - (.*?)<\/h1>/# \1 - \2/sg"
#str="s/<div class='clSrc'>(.*?)<\/div><div class='clDst'>(.*?)<\/div>/\|\|\1\n\2\n/sg"
#str="s/<div class='clSrc'>(.*?)<\/div><div class='clDst'>(.*?)<\/div>/\|\1\|\|\2/sg"
#str="s/<div class='clWrd'>(.*?)<span class='clIpa'>\[(.*?)\]<\/span><div class='clDef'>(.*?)<\/div><\/div>/\|\1\|\2\|\3/sg"
#str="s/^(.*?)(\n+)$/\1/sg"
#str="s/- Mots fréquents\n\n/- Mots fréquents\n/sg"


cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
