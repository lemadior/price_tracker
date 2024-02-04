#!/bin/sh

if [ ! -e "/usr/bin/docker-compose" ] || [ ! -e "/usr/bin/docker-compose" ]; then
    echo "\n'docker-compose' command wasn't found!\n Please install it and try again"
    exit 1
fi

sudo /usr/bin/chown -R 1000:33 $(pwd) || exit 1

docker-compose up -d

php_container_running=$(docker ps | grep '[-_]app');

if [ ! -z "$php_container_running" ]; then
    echo -n "Composer update..."
    /usr/bin/docker exec -it app composer install >/dev/null;

#    echo -n "Install mailpit..."
#    /usr/bin/docker exec -it app /bin/bash < <(curl -sL https://raw.githubusercontent.com/axllent/mailpit/develop/install.sh);
#    /usr/bin/docker exec -it app /bin/bash 

    if [ $? -ne 0 ] ; then
        echo "Some error occured!"
        exit 1
    else
        echo 'Ok';
    fi
fi

echo "done."

exit 0
