#!/bin/bash

IFS=$'\n'
OIFS="$IFS"

dir_in='../texts/Queen - 1991.Innuendo'
dir_in='../texts/Queen - 1991.Innuendo'

files=(\
"01.Innuendo" \
"02.I'm Going Slightly Mad" \
"03.Headlong" \
"04.I Can't Live With You" \
"05.Don't Try So Hard" \
"06.Ride The Wild Wind" \
"07.All God's People" \
"08.These Are The Days Of Our Lives" \
"09.Delilah" \
"10.The Hitman" \
"11.Bijou" \
"12.The Show Must Go On" \
)

[[ ! -d ${dir_in} ]] && mkdir -p ${dir_in}

cd ${dir_in}

for file in "${files[@]}"; do
  echo ${file}
  [[ ! -f "${file}.txt" ]] && touch "${file}.txt"


done




exit


#mono='-ac 1'

mkdir ${dir_out}

cd ${dir_in}
for file in $(find . -name '*.mp3' | sort); do ffmpeg -i ${file} -y -map 0:a -codec:a copy -map_metadata -1 -ab 128k -f mp3 ../${dir_out}/${file}; done
cd ..

cd ${dir_out}
for file in $(find . -name '*.mp3' | sort); do ffmpeg -i ${file} -y -map 0:a:0 -b:a 96k -f mp3 ../${dir_in}/${file}; done
cd ..

rm -fR ${dir_out}
