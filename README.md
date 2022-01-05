# POC Symfony + SQS

## Run the application

Install dependencies

```
composer install
```

Run basic PHP server on port 8000

```
php -S 127.0.0.1:8000 public/index.php
```

Then the following endpoint should be available

```
POST http://127.0.0.1:8000/async/bulk/invitations/send -d [{"id":1},{"id":2},...]
```

Note : a postman collection is available in the project

## What does it do ?

The API call will just write data into a log file : `var/log/post_invitations.log`

## Database

A simple SQLite is used, it's located into `var/data.db`
