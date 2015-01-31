run:
	php -S 127.0.0.1:8017 -c xdebug.ini

build:
	mkdir build
	cp -R src/ build/src/
	cp build-config.php build/config.php
	cp build-index.php build/index.php
	cp build-Makefile build/Makefile

doc:
	phpdoc -d ./src -t ./docs/api --template="responsive"

test:
	## TODO testing