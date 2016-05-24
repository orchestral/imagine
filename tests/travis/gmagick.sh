wget http://78.108.103.11/MIRROR/ftp/GraphicsMagick/1.3/GraphicsMagick-1.3.23.tar.xz;
tar -xf GraphicsMagick-1.3.23.tar.xz;
cd GraphicsMagick-1.3.23;
./configure --prefix=/opt/gmagick --enable-shared --with-lcms2;
make -j;
sudo make install;
