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

Note that the database tables can be rehydrated at any time from a browser. Navigate to these endpoints to refresh/rehydrate the data:

 - http://localhost:8000/hydrate/issucomponents - issue_components table
 - http://localhost:8000/hydrate/components - components table
 - http://localhost:8000/hydrate/users - users table
 - http://localhost:8000/hydrate/timelogs - timelogs table


All the above also work when targeting the /api/ endpoints as well. Note that the hydration step is taken care of on container build - the ./entrypoint.sh script includes a `php artisan migrate:refresh --seed` command so you should be good to go once you're up and running.

You can access phpMyAdmin from http://localhost:8181.