## Cách cài đặt

<p>Cài đặt xampp <p>
    https://www.apachefriends.org/download.html
<p>Cài đặt composer <p>
    https://getcomposer.org/
<p>download giải nén or git clone</p>
<p>vào thư mục vừa giải nén chạy Terminal</p>

# Chạy lần lượt các lệnh : 

<p>composer install</p>
<p>npm install</p>
<p>copy .env.example .env</p>
<p>php artisan key:generate</p>

# Tạo csdl có tên là : vaccination
<p>Truy cập http://localhost/phpmyadmin/ và tạo cơ sở dữ liệu có tên là vaccination </p>
<p>Sau đó vào lại terminal chạy các lệnh sau :</p>
    <p>php artisan migrate</p>
    <p>php artisan db:seed</p>

# Chạy project

php artisan serve

## Tài khoản ADMIN

<p>email: admin@gmail.com</p>
<p>pass: admin</p>
