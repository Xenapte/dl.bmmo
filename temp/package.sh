#! /bin/bash
cp --preserve=timestamps ../files/$1 ../temp/BallanceMMOClient.bmod
cd ../temp
zip BallanceMMO_$2.zip BallanceMMOClient.bmod GameNetworkingSockets.dll libcrypto-1_1.dll libprotobuf.dll
rm BallanceMMOClient.bmod
mv BallanceMMO_$2.zip ../packages/