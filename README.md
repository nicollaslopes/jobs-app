## Demonstration:

https://github.com/user-attachments/assets/e1a05a5e-b46c-4bde-bcd1-4bd142409b83

## Requirements

- PHP v8.1+
- Composer
- Docker

## How to test

- Install the extensions: `sudo apt-get install -y php8.3-mysql php8.1-cli php8.3-common php8.3-mysql php8.3-zip php8.3-gd php8.3-mbstring php8.3-curl php8.3-xml php8.3-bcmath`
- To download the project dependencies, run the command `composer install`
- Run the following command to start the containers:  `docker compose up -d`
- To find the MySQL container IP, run: `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' jobs-app-phpmyadmin-1`
- To find the phpMyAdmin container IP, run: `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' jobs-app-db-1`
- Create a `.env` file and copy the contents from `.env.example`, updating the connection details.
- Once the containers are up, the jobs-app database will be created automatically.
- Run the command to create the migrations `php artisan migrate`
- Run the command to seed the database with records (optional) `php artisan db:seed`
- To start the project, run the command `php artisan serve`
- Visit the URL `http://localhost:8000`

## Configuring Mailtrap

- Go to `https://mailtrap.io/signin` and create an account.
- In the side menu, go to "Email Testing" -> "Inboxes" -> "My Inbox".
- Update the configuration with the following information:

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<MAILTRAP-USERNAME>
MAIL_PASSWORD=<MAILTRAP-PASSWORD>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME=test@gmail.com
```

## Receiving email in Mailtrap

![image](https://github.com/user-attachments/assets/c5441372-6ca8-4106-b216-5a18afe88304)
