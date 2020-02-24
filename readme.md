![Image of DesignHub](https://github.com/Mira-Qiu/Laravel-Shopping-platform/blob/master/image/Screen%20Shot%202020-02-19%20at%2011.22.00%20AM.png)
![frontPage](https://github.com/Mira-Qiu/DesignHub/blob/master/image/frontPage.png)
![cartPage](https://github.com/Mira-Qiu/DesignHub/blob/master/image/cartPage.png)
![checkout](https://github.com/Mira-Qiu/DesignHub/blob/master/image/checkout.png)
Clone code first:
```
git clone .....
```
Set up Homestead:
```
- map: ~/DesignHub                 ##folders
   to: /home/vagrant/DesignHub
   
- map: www.DesignHub.com           ##sites
   to: /home/vagrant/DesignHub/public
```
Set up host: 
```
cd /etc
sudo vim hosts
192.168.**.** www.DesignHub.com
```
Run up Vagrant:
```
vagrant reload --provision
vagrant ssh
```
Get into Laravel:
```
cp .env.example .env ##set up environment
composer install  
php artisan key:generate ##set up App_Key
```
Set up database:
```
Create database designhub

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=designhub
DB_USERNAME=root
DB_PASSWORD=
```
PHP 7.4 not compatitable problem:
```
nginx
```

