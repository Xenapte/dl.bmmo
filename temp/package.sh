#! /bin/bash
cp --preserve=timestamps ../files/$1 ../temp/BallanceMMOClient.bmod
[[ -f ../files/${1}p ]] && cp --preserve=timestamps ../files/${1}p ../temp/BallanceMMOClient.bmodp
cd ../temp
zip -j BallanceMMO_$2.zip BallanceMMOClient.bmod* $3/*.dll
rm -f BallanceMMOClient.bmod*
mv BallanceMMO_$2.zip ../packages/
