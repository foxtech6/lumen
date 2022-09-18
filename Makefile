build:
	./make/build.sh

up:
	./make/up.sh

down:
	./make/down.sh

composer-install:
	./make/composer_install.sh

test:
	./make/test.sh

copy:

all:
	./make/build.sh
	./make/up.sh
	./make/composer_install.sh

