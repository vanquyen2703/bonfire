<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'bonfire' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e#/6uEn*~,Hqjss0N:zY(_F)dR*lKnH gyRLZ~0&|E31w%ZcBX~:fvd+?wGsD|{)' );
define( 'SECURE_AUTH_KEY',  '71CR|,CP]eX1Rgh zp@)f+1~!58`A?3xVUAI#!hPq1%NWha%VYv,G_g^3{kOO@R_' );
define( 'LOGGED_IN_KEY',    'rthdzg{9ljXk:ru#9h#1%lHIYgWO/74=de{=DAI-*bLCPK3a$=Csr@,4NEe@jN^N' );
define( 'NONCE_KEY',        'Hh&[&Y,TNtezDtb{?Te+tek]l0UJEk&<{|lX/c!>=lu#Y9J9-A<hc1VHgmOwmuNo' );
define( 'AUTH_SALT',        'rB ntX3zy SPH@]5b _iT$tk]fD@P#,,{[]aiBX5xd?zN=V%U3@o/`R0nEGDhRG0' );
define( 'SECURE_AUTH_SALT', 'G?iV^NX6@Fq7V!yF,]0k?{F^H3VE;JB,7.t/A(e{#2%4tR%=Kj0jX5lpS((p>WXS' );
define( 'LOGGED_IN_SALT',   ')VTs`Vlo6vZy%AhMg?EKL:2xA4OH5fF<[us,Cu@kKLv~1]5R@drEIZ!Q`=Gs$%&-' );
define( 'NONCE_SALT',       'rQp@YSAd%l,Yy+U6+go)mY0$(X9)#tY^.eEeva=Qiwi*t?:7<Ffwx&3(RU <nrDg' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
