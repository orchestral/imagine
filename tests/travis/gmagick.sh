sudo apt-get install -y graphicsmagick libgraphicsmagick1-dev;
wget http://pecl.php.net/get/gmagick-1.1.7RC2.tgz;
tar -xzf gmagick-1.1.7RC2.tgz;
cd gmagick-1.1.7RC2;
phpize;
./configure --with-gmagick=/usr/local;
make -j;
sudo make install;
echo "extension=gmagick.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`;
php --ri gmagick;
