#! /bin/bash
cp --preserve=timestamps ../files/$1 ../temp/BallanceMMOClient.bmod
cd ../temp
zip -j BallanceMMO_$2.zip BallanceMMOClient.bmod $3/*.dll
rm BallanceMMOClient.bmod
mv BallanceMMO_$2.zip ../packages/