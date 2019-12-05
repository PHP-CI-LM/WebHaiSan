==========================================================
Project demo cuối kỳ: Nghiên cứu framework PHP CodeIgniter
==========================================================

:Phiên bản dùng: 3.1.1
:Đề tài: Website bán hải sản trực tuyến

---------
Chuẩn bị
---------
1. Apache Server 
2. MySQL Server 8.0
3. PHP 7.3 trỏ lên
:Chú ý: Có thể thay thế những lựa chọn trên bằng các phần mềm có chức năng tạo và hỗ trợ chạy local server như: WAMPP, XAMPP,...

------------------
Các bước cài đặt
------------------
1. Chạy các file script (nằm ở thư mục scriptSQL) theo thứ tự sau để chuẩn bị cơ sở dữ liệu cho website
    - create_Table_View.sql
    - create_Func_Proc.sql
    - insertData.sql

2. Cấu hình project để có thể kết nối đến csdl vừa cài đặt
    - :Bước 1: Mở project, truy cập đến file có đường dẫn sau: application/config/database.php
    - :Bước 2: Thay đổi các thông tin như: hostname, username, password dựa theo thông tin cấu hình ở máy mỗi người
    - :Bước 3: Thay đổi base_url thành locahost ở file application/config/config.php
    - :Bước 4: Dùng trình duyệt truy cập đến đường dẫn localhost/<TenProject> để chạy thử


-------------------
Demo ứng dụng
-------------------
`<https://chohaisan.herokuapp.com/>`


