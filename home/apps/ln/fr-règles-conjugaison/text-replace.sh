#!/bin/bash
#--------------------------------------------------------------------------------
# -i -- modifies input file
# -0 -- input record separator ($/) - octal
# -e -- program as argument, not in file
# -p -- places printing loop around command
# -w -- warnings
#--------------------------------------------------------------------------------

dir='./html'
ext='*.html'

#--------------------------------------------------------------------------------

#regexs=("s///sg")
#regexs=("s/<div id='idContent'>/<div id='idContent'>\n<div class='clOverflow'>/sg")
regexs=("s/<\/div>\n<\/div>\n\n<\/div>\n\n\n<\/div>\n<\/div>\n<\/body>\n<\/html>/<\/div>\n<\/div>\n<\/body>\n<\/html>/sg")



#--------------------------------------------------------------------------------

cd ${dir}

for file in $(find . -name "${ext}" | sort); do
#  echo $file
    for regex in "${regexs[@]}"; do
#      echo $regex
      perl -i -0pe "${regex}" "${file}";
  done
done

#--------------------------------------------------------------------------------
