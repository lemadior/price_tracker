# price_tracker
Track and parse the price from OLX specified by link and send email if price has been changed

# Installation notes

1. Clone the repository

  git clone git@github.com:lemadior/price_tracker.git

  After cloning type the next commands:

  _**cd < Tracker folder >**_

2. Configure the docker (create containers):

run command:

_**sh ./first_start.sh**_

  NOTE: The script will ask about user's password because it run sudo for some command.

        To check works just type in browser localhost:5000

3. Start with Tracker
    - URL: localhost:5000
    - DB: works on 8100 port
    - DB settings for .env:
      - DB_CONNECTION=mysql
      - DB_HOST=db
      - DB_PORT=3306
      - DB_DATABASE=parser
    - MAIL works on localhost:1025 port (to send)
    - MAIL wed dashboard works on localhost:8025

4. To check the result go to URL: localhost:5000

5. Set proper DB user and password in .env file
