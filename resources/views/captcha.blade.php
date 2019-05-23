{{
session_start(); // Khởi tạo session
$ranStr = md5(microtime());	// Lấy chuỗi rồi mã hóa md5
$ranStr = substr($ranStr, 0, 6);	// Cắt chuỗi lấy 6 ký tự
$_SESSION['cap_code'] = $ranStr; // Lưu giá trị vào session
$newImage = imagecreatefromjpeg("Web/images/bg_captcha.jpg"); // Tạo hình ảnh từ bg_captcha.jpg
$txtColor = imagecolorallocate($newImage, 0, 0, 0); // Thêm màu sắc cho hình ảnh 
imagestring($newImage, 5, 5, 5, $ranStr, $txtColor); // Vẽ ra chuỗi string
header("Content-type: Web/image/jpeg");	//Khai báo định dạng file trả về từ Server ,Xuất định dạng là hình ảnh
imagejpeg($newImage); // Xuất hình ảnh ra trình như 1 file
}}