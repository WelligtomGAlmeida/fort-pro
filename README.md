<h1 style="color:#2c6be0;">Fort-Pro</h1>
<h6>A software to control your financials </h6>
<a href="http://expressdev.com.br" target="_blank">Oficial Website</a>
<br>

## Installation

To install this project you have to perform the following steps:
* Select a path to store de project
* Execute the following command in the selected path
```
    git clone https://github.com/WelligtomGAlmeida/FortPro.git
```
* Create a database
* Configure the database in the .env file
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=user_name
    DB_PASSWORD=password
```
* Execute the following commands in the project root path
```
    composer install
```
```
    php artisan migrate:fresh
```
```
    php artisan db:seed
```
* To run the project, execute the following command in the project root path
```
    artisan serve
```
## Requirements

* [Composer](https://getcomposer.org/download/)
* [PHP 7.x](https://www.php.net/downloads.php)
* [Git Bash](https://git-scm.com/downloads)

## Credits

Welligtom Gomes de Almeida - Developer and Owner
E-mail: welligtomgalmeida@gmail.com

![Alt ou título da imagem](https://www.hardware.com.br/1078x516/smart/filters:format:(jpeg)/@/static/wp/2019/09/12/vpn.jpg?fit=crop)
