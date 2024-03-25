# How to start the project

### Clone this repository
```bash
git clone https://github.com/MotikDev/x-crm.git
```

## Setup
### Run the below command and update your 'MAIL_USERNAME' and 'MAIL_PASSWORD' for local testing
```bash
cp .env.example .env
```

### Then, run the below command to build the containers using the docker-compose file
```bash
cd x-crm && docker-compose up
```

### Run the below command to install the composer packages
```bash
docker-compose run --rm composer-crm install
```
##### NOTE: If token is requested while running the above command, on your GitHub account, Goto "Settings" > "Developer Settings". Then, create a personal token and paste it into the terminal.


### Run the below command to install the node packages
```bash
docker-compose run --rm npm-crm install
```
```bash
docker-compose run --rm npm-crm run build
```


### Run the below command to interact with the container
```bash
docker exec -it crm_back_end /bin/bash
```
### Then, in the interactive terminal, run the below command
```bash
php artisan key:generate && php artisan config:cache && php artisan migrate && php artisan storage:link && php artisan optimize:clear
```


### Copy the below URL and paste in your browser to use the application or use the port you assigned in the docker-compose file
```bash
http://localhost:8080
```


## Assuming CPanel is being used to host this application
### Kindly create a cron job to check for users without profile image so reminder emails can be sent with three (3) days intervals between emails.
```bash
0	0	*	*	*	usr/local/bin/php /path/to/directory/public/artisan reminder:upload-profile-image
```

### On Localhost, kindly run the below command to send reminder emails
```bash
php artisan reminder:upload-profile-image
```

