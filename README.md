# price_tracker
Track and parse the price from OLX specified by link and send email if price has been changed

# Installation notes

1. Clone the repository

  git clone git@github.com:lemadior/price_tracker.git

  After cloning type the next commands:

  _**cd < Tracker folder >**_

2. Copy ```.env.exapmle``` to the ```.env```

3. Fill the corresponds variables in the ```.env```:

        DB_CONNECTION=mysql
        DB_HOST=db
        DB_PORT=3306
        DB_DATABASE=calendar
        DB_USERNAME=<username>
        DB_PASSWORD=<user_password>
        DB_ROOT_PASSWORD=<root_password>

4. Change access rights for the current folder:

```sudo chown -R 1000:33 $(pwd)```

5. Create the containers:

```docker-compose up -d```

6. Update the composer

```docker exec -it app composer install```

4. To check the result go to URL: localhost:5000

    - MAIL works on localhost:1025 port (to send)
    - MAIL wed dashboard works on localhost:8025

5. Set proper DB user and password in .env file
