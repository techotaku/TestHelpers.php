git submodule update --init
cd extension
phpize
./configure --enable-test-helpers
make
res=`sudo make install`
echo "zend_extension =${res##*Installing shared extensions:    }test_helpers.so"
echo "zend_extension =${res##*Installing shared extensions:    }test_helpers.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/conf.d/xdebug.ini
cd ..
php --version
