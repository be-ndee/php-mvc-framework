run:
	php -S 127.0.0.1:8017

doc:
	phpdoc -d ./src -t ./docs/api --template="responsive-twig"

test:
	## TODO testing