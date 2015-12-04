sudo apt-get install -y graphicsmagick libgraphicsmagick1-dev;
pecl install gmagick;
echo "extension=gmagick.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini;
php --ri gmagick;
