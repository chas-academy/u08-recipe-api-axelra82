# CHAS ACADEMY | ASSIGNMENT U08

This app has been updated to work with [the API from assignment u08](https://github.com/chas-academy/u08-recipe-api-axelra82). Make sure to include the new `AUTH_API_URL` in your `.env` file. If you want to run a local version of the API from u08 the URL is `http://localhost/api/auth`.

[Live app preview](https://relaxed-shirley-9bed8f.netlify.app/)

## Introduction

This assignment requires the developer to create an API, for an [existing recipe app](https://github.com/chas-academy/u07-recipe-app-axelra82), using [Laravel](https://laravel.com).

Once the API is active via docker you can run the Recipe app for the frontend to make requests with the API.

### Prerequisites

**Docker & Docker Compose**

[Docker Desktop](https://www.docker.com/get-started)

**NOTE** Docker Compose is included with Docker Desktop by default. If for whatever reason it is not installed, please follow instructions [here](https://docs.docker.com/compose/install/)

**Local environment**

On deploy this project looks for an environment. Since environment variables are secret and should never be shared in public repos you will need to set it up yourself. Create a new file called `.env` in the project root. You can do this several ways, e.g.:

-   vsc file browser: right-click -> new file and name it `.env`
-   macOS/Linux: `touch .env`
-   windows (cmd): `type nul > .env`

_For the purpose of this assignment the env variables will be included below (never do this in real world applications)_

Edit `.env` file and insert:

-   `APP_NAME=axelra82-cau08`
-   `APP_ENV=local`
-   `APP_KEY=base64:v+XnnpDaDBFjKvhDEjsBYXU2cbq441gqcl7FHU4bD6s=`
-   `APP_DEBUG=true`
-   `APP_URL=http://localhost`

-   `LOG_CHANNEL=stack`
-   `LOG_LEVEL=debug`

-   `DB_CONNECTION=pgsql`
-   `DB_HOST=database`
-   `DB_PORT=5432`
-   `DB_DATABASE=recipesapi`
-   `DB_USERNAME=root`
-   `DB_PASSWORD=root`
-   `JWT_SECRET=miIkIYBqNLU3NfjNGHKwvKlIAnSYSw6f3qCxjiSqEwWNfZWw0qZPtLUts4LGZSSF`

Then save and exit. Your environment setup is now done!

### Local setup

1. download repo
2. navigate to folder
3. run `docker-compose build app` to build the main docker app.
4. run `docker-compose up -d` to start the app in detached mode. **NOTE** The first time you run this it takes some time. Subsequent launches will be faster.
5. run `docker-compose exec app composer i && php artisan migrate`to install dependencies and run initial migration for database.

## API

### Requirements

-   [x] register account, login & logout
-   [x] use JWT for authentication
-   [x] user must be able to save recipe lists. Minimum requirements for list:
    -   [x] name of list
    -   [x] what recipes are included
-   [x] user must be able to creat, read, update, delete (CRUD) lists
-   [x] lists must belong to a specific user and can only be read/managed be the same
-   [x] recipes (id) must be unique in a list but may occure in multiple lists
-   [x] recipe data must still come from external API (i.e. as in previous, u07, assignment)

### New for frontend

-   [x] user must be able to create user, login & logout
-   [x] user must be able to CRUD their recipe lists

# Hand in

**Due date:** May 13th 2021

[Github repo](https://github.com/chas-academy/u08-recipe-api-axelra82)
and link to repo in LMS
