## Cách cài đặt
download giải nén 
vào thư mục vừa giải nén chạy Terminal
# Chạy lần lượt các lệnh : 
composer install
npm install 
cp .env.example .env
php artisan key:generate

# Tạo csdl có tên là : vaccination

php artisan migrate
php artisan db:seed

# Chạy project
php artisan serve

### Tài khoản ADMIN
email: admin@gmail.com
pass: admin
