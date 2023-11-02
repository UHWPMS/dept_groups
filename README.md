<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Manage Department Groups
Managing Department Groups is one of the functionalities of the White Pages System. This allows for administrators to edit and delete existing Department Groups.
As of 9/27/2023, Manage Department Groups is capable of listing and filtering records. The Edit and Delete functionalities have yet to be implemented.
## Dependencies
The environment setup:
```
sudo apt install build-essential
sudo apt install geany
sudo apt install openjdk-17-jdk
sudo apt install chromium-browser
```

### Use nvm and Node.js
```
sudo apt install curl  
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
source ~/.bashrc
nvm list-remote
nvm install 18.18.0
nvm use 18.18.0
node -v
npm -v
```

### Installing MySQL
Let's install the MySQL server. Start with the following command:
                  
```
sudo apt install mysql-server                        
```                                    
This should start the mysqld service running. But, if you get a message that the service is not running, you can start it with:
```                  
sudo systemctl start mysql.service                      
```                     
                  
To fix the root password, you can start by running the following:
```
sudo mysql                     
```                     
                  
At the mysql> prompt do the following to set the root password to 'mysql.nimd@' (This is just an example password. Remember to change 'mysql.nimd@' to your own password):
```                  
mysql> alter user 'root'@'localhost' identified with mysql_native_password by 'mysql.nimd@';
Query OK, 0 rows affected (0.00 sec)

mysql> exit
Bye
```                   
                     
                  
Now run the following command:

```                    
sudo mysql_secure_installation
```
Type 'n' for the validate password plugin and for changing the password for root. Type 'y' for the rest of the prompts. Now, you can login as the root user and create a regular user for accessing a database.

### Installing PHP
Since php8.1-fpm may not be avaliable for everyone, please do the following commands before intall it.
```
sudo apt update
apt search php | grep fpm
sudo apt install php8.1-fpm php-mysql
```
The second command above is using for searching which version is avaliable on the system. You need to make sure your PHP version is 8.1 or higher in order to continue otherwise you will run into errors later. 

If PHP is lower than 8.1, do the following commands:
```
sudo apt update
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.1
```
Then install php8.1-fpm with the following:
```
sudo apt install php8.1-fpm php-mysql
```

### Installing Composer
To install Composer install the following packages:

```                     
sudo apt install php-cli unzip
```               
                  
Go to your home directory and run the following curl command:

```                 
cd ~
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php                         
```                  
Then run the following to help with a verification step:

```                     
HASH=`curl -sS https://composer.github.io/installer.sig`                     
```                    
                  
To test that you obtained a value you can run:

```                    
echo $HASH                   
```                    
                  
You will see a long hex string as the output. Now, run the following command:

```                    
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"                   
```                    
                  
You should see
Installer verified

If the output says Installer corrupt, you’ll need to download the installation script again and double check that you’re using the correct hash. Then, repeat the verification process. When you have a verified installer, you can continue.

With the installer verified, we can install composer globally as a system-side command named composer inside of /usr/local/bin:

```                     
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer                                          
```                  
You should see the following output:

                     
All settings correct for using Composer
Downloading...

Composer (version 2.6.3) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer                       
                     
                  
To test your composer installation just run composer at the command line:

```                     
composer
```

### Installing extra packages for Laravel
```
sudo apt install php-mbstring php-xml php-bcmath php-curl
```

### Get the project from GitHub
Change your local directory to where you want to install the Laravel application.
```
git clone https://github.com/UHWPMS/dept_groups.git

```
If 'git' gives you error, use the following to install git then clone it again:
```
sudo apt install git
git clone https://github.com/UHWPMS/dept_groups.git
```
### Create a regular user for the database

```
mysql -u root -p
mysql> create database white_pages;
mysql> create user 'tarynet'@'localhost' identified by 'tarynpass';
mysql> grant all privileges on white_pages.* to 'tarynet'@'localhost';
mysql> exit

cd <path>/dept_groups (replace <path> with your path to the 'dept_groups' directory)
ls (check for init.sql, add_test_data.sql and reload.sql)

mysql -u tarynet -p white_pages
mysql> \. reload.sql
you should see  13 records then 8 records inserted.
mysql> exit
```
### Create an .env file
```
cd <path>/dept_groups
geany .env 
```

Copy the following contents into the .env file. Adjust as needed for your own database name, username and password.
```
APP_NAME=white_pages
APP_ENV=development
APP_KEY=base64:GKpfzVt+tOvQVZd/3+qANuQ1e44EbR0LHYxCd9lLDhA=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=white_pages
DB_USERNAME=tarynet
DB_PASSWORD=tarynpass

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
### Change the write permissions
```
cd <path>/dept_groups
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```
### Run the program

```
cd <path>/dept_groups
php artisan serve
```

With a browser (e.g. Chromium), go to localhost:8000 
you should see the table.
