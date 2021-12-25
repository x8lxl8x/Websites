#!/bin/bash

dir_in='../sounds/Queen - 1991.Innuendo'
dir_out='tmp'

#mono='-ac 1'

mkdir ${dir_out}

cd ${dir_in}
for file in $(find . -name '*.mp3' | sort); do ffmpeg -i ${file} -y -map 0:a -codec:a copy -map_metadata -1 -ab 128k -f mp3 ../${dir_out}/${file}; done
cd ..

cd ${dir_out}
for file in $(find . -name '*.mp3' | sort); do ffmpeg -i ${file} -y -map 0:a:0 -b:a 96k -f mp3 ../${dir_in}/${file}; done
cd ..

rm -fR ${dir_out}
