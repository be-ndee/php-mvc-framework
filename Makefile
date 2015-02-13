run:
	php -S 127.0.0.1:8017 -c xdebug.ini

doc:
	phpdoc -d ./src -t ./docs/api --template="responsive"

test:
	phpunit --bootstrap bootstrap.php --log-json tests/test_log.json tests
