# Sample time tracking application in Laravel

## Installation

 - clone the repo
 - open a terminal
 - navigate to the /project directory
 - `docker-compose up -d`
 - wait for everything to build (go get a drink of some sort)
 - `docker-compose run appserver bash`
 - `./entrypoint.sh`

## Review

 - `./vendor/bin/phpunit`
 - Or, you can open a browser and point it to http://localhost:8000/component-metadata and http://localhost:8000/user-timelogs

## Misc

I created both API and web routes for the functionality as the test file was called `APITest.php`, but used web routes (no /api/).