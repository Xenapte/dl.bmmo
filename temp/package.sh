#! /bin/bash
cp ../files/$1 ../temp
cd ../temp
zip BallanceMMO_$2.zip $1 GameNetworkingSockets.dll libcrypto-1_1.dll libprotobuf.dll
rm $1
mv BallanceMMO_$2.zip ../packages/