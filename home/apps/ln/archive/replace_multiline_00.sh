#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir='./html'
ext='*.html'

#str="s/\.\.\/css\/global\.css/\.\.\/\.\.\/\.\.\/\.\.\/css\/global\.css/sg"
#str="s/global\.js'><\/script>\n<\/head>/local\.js'><\/script>\n<\/head>/sg"
#str="s/  <script type='text\/javascript' src='\.\.\/js\/local\.js'><\/script>\n//sg"
#str="s/\.\.\/js\/global/\.\.\/\.\.\/\.\.\/\.\.\/js\/global/sg"
#str="s/funcPlayTrackZh\( (.*?) \)/fncPlayTrackZh\(\1\)/sg"
#str="s/    <a href='\.\.\/\.\.\/\.\.\/index.html'>&ensp;&#xf0ca&ensp;<\/a>&ensp;/    <a href='\.\.\/\.\.\/\.\.\/\.\.\/index\.html'><span class='clNavHome'><span><\/a>/sg"
#str="s/&ensp;&#xf060;&ensp;<\/a>&ensp;/<span class='clNavLeft'><span><\/a>/sg"
#str="s/&ensp;&#xf061;&ensp;<\/a>&ensp;/<span class='clNavRight'><span><\/a>/sg"
#str="s/<span onclick/<span class='clNavPlay' onclick/sg"
#str="s/;\)'>&ensp;&#xf04b;&ensp;<\/span>&emsp;&emsp;&emsp;/;\)'><\/span>/sg"
#str="s/    <a href='\.\.\/index\.html'>&ensp;&#xf062;&ensp;<\/a>&ensp;/    <a href='\.\.\/index\.html'><span class='clNavUp'><span><\/a>/sg"
#str="s/\)'><\/span>\n    <span>/\)'><\/span>\n    <span id='idRadicalInfo'>/sg"
#str="s/clNavHome'><span><\/a>\n/clNavHome'><span><\/a>\n    <a href='\.\.\/\.\.\/index\.html'><span class='clNavIndex'><span><\/a>\n/sg"
#str="s/fncPlayTrackZh/fncPlayFileZh/sg"
#str="s/'\.\.\/js\/global\.js'/'\.\.\/\.\.\/\.\.\/\.\.\/js\/global\.js'/sg"


cd ${dir}

for file in $(find . -name "${ext}" | sort); do
  perl -i -0pe "${str}" "${file}"
done
