# PROJECT README

## Requirements
* [git](https://git-scm.com/)
* [make (3.81 or later)](https://savannah.gnu.org/projects/make/)
* [docker (19.03.12 or later)](https://docs.docker.com/engine/install/)
* [docker-compose (1.26.0 or later)](https://docs.docker.com/compose/install/)

## Install

### 1. Clone the repo
```bash
git clone git@github.com:mtereschenko/monobank_currency_client.git
```

## Usage

* Open a new terminal window and CD to your projects directory
  ```bash
  cd ${PROJECT_PATH}/environment
  ```

* This command builds an environment.
  ```bash
  make build
  ```

* This command runs the environment and the applications inside. 
  ```bash
  make start
  ```

* This command "teleports" you to the **php** command shell where you can execute **php**, **artisan**, etc. commands.
  ```bash
  make shell
  ```
 
* This command "teleports" you to the **node** command shell where you can execute **npm**, **npx**, etc. commands.
  ```bash
  make shell c=node
  ```

* Trigger the ws event (you better to use mock. To do so you should set `APP_ENV` to the `test`)
```bash
  make shell
  php artisan currencies:fetch
```

After that your project will be able to visit by `http://${PROJECT_NAME}.localhost`. By default, it's `http://monobank_currency_client.localhost`.
