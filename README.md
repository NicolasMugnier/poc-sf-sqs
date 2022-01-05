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

## Transport

Messages are push and consume from Amazon SQS through the AWS API. 

## AWS settings

- create an aws account
- create a new user with only SQS permissions (AmazonSQSFullAccess)
- copy / paste AWS credentials (accountID, AccessKey, SecretKey) in .env.local file
- create a new queue called oc-async-poc and set the new created user as main sender and receiver
