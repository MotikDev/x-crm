# How to start the project

## Clone this repository
```bash
git clone https://github.com/MotikDev/x-crm.git
```

# Setup
## Run the below command and update your 'MAIL_USERNAME' and 'MAIL_PASSWORD' for local testing
```bash
cp .env.example .env
```

## Open your terminal and run the below command to build the backend containers using the docker-compose file
```bash
cd app && docker-compose up
```

## Run the below command to install the composer packages
```bash
docker-compose run --rm composer-crm install
```

## Run the below command to install the node packages
```bash
docker-compose run --rm npm-crm install
```
```bash
docker-compose run --rm npm-crm run build
```

## Run the below command for migration
```bash
docker exec -it crm_back_end /bin/bash
```
## Then, in the interactive terminal, run the below command
```bash
php artisan config:cache && php artisan optimize:clear && php artisan migrate && php artisan storage:link
```

# Assuming CPanel is being used to host this application
## Kindly create a cron job to check for users without profile image so reminder emails can be sent with three (3) days intervals between emails.
```bash
0	0	*	*	*	usr/local/bin/php /path/to/directory/public/artisan reminder:upload-profile-image
```

## On Localhost, kindly run the below command to send reminder emails
```bash
php artisan reminder:upload-profile-image
```