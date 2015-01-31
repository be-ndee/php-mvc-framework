run:
	php -S 127.0.0.1:8017 -c xdebug.ini

doc:
	phpdoc -d ./src -t ./docs/api --template="responsive"

test:
	## TODO testing