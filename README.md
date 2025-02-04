# もぎたて  


## 環境構築  
- git clone git@github.com:misato-kataoka/fruits.git
- cd fruits
- docker-compose up -d --build
- docker-compose exec php bash
- composer install
- .env.example ファイルから.envファイルを作成し、環境変数を変更
- docker-compose exec php bash
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## ER図
![Image](https://github.com/user-attachments/assets/5876df46-97dd-4cc2-a146-8838ae326426)

## 使用技術  
-PHP 7.4.9   
-Laravel (v8.6.12)  
-MySQL 8.0.26  


## URL  
-開発環境 http://localhost/  
-phpMyAdmin http://localhost:8080  
