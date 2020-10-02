# installation:
### 1 .composer install
### 2 .update .env file with database parameters 
### 3 .Database and migrations
#### a. php bin/console doctrine:database:create
#### b. php bin/console make:migration
#### c. php bin/console doctrine:migrations:migrate
### 4 .Fixtures
#### a. php bin/console doctrine:fixtures:load

login with user credentials in database:
message with username for signing

login with unknown credentials:
message with "mystery" for signing
