# もぎたて  


## 環境構築  
### Docker ビルド
1. git clone git@github.com:misato-kataoka/fruits.git
2. cd fruits
3. docker-compose up -d --build

### Laravel環境の構築
1. docker-compose exec php bash
2. composer install
3. .env.example ファイルから.envファイルを作成し、環境変数を以下の通りに変更
   >DB_CONNECTION=mysql 
   >DB_HOST=mysql 
   >DB_PORT=3306 
   >DB_DATABASE=laravel_db 
   >DB_USERNAME=laravel_user 
   >DB_PASSWORD=laravel_pass 
4. docker-compose exec php bash
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed

## ER図
![Image](https://github.com/user-attachments/assets/5876df46-97dd-4cc2-a146-8838ae326426)

## 使用技術  
-PHP 7.4.9   
-Laravel (v8.6.12)  
-MySQL 8.0.26  


## URL  
-開発環境 http://localhost/  
-phpMyAdmin http://localhost:8080  
