<?php

/**
 * @Project NUKEVIET 3.4
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

define( 'NV_IS_MOD_DIEMEX', true );

//Chuyen ky tu in hoa thanh ky tu thuong
function chuthuong ($text) {
//Tìm các ký tự chữ IN HOA tiếng việt trong chuỗi
$timthay=array(
'Á','À','Ả','Ã','Ạ','Â','Ấ','Ầ','Ậ','Ẩ','Ẫ','Ă','Ắ','Ằ','Ặ','Ẵ','Ẳ','Đ','Ê','Ế','Ề','Ệ','Ể','Ễ',
'Ô','Ố','Ồ','Ộ','Ổ','Ỗ','Ơ','Ớ','Ờ','Ợ','Ỡ','Ở','Ư','Ứ','Ừ','Ự','Ữ','Ử','Ị','Ì','Í','Ĩ','Ỉ',
'Ý','Ỳ','Ỵ','Ỷ','Ỹ','Ù','Ú','Ụ','Ũ','Ủ'
);
//Thay thế bằng chữ thường ương ứng, nếu các bạn thấy còn thiếu ký tự nào thì cứ thêm vào vị trí tương ứng
$thaythe = array(
'á','à','ả','ã','ạ','â','ấ','ầ','ậ','ẩ','ẫ','ă','ắ','ằ','ặ','ẵ','ẳ','đ','ê','ế','ề','ệ','ể','ễ',
'ô','ố','ồ','ộ','ổ','ỗ','ơ','ớ','ờ','ợ','ỡ','ở','ư','ứ','ừ','ự','ữ','ử','ị','ì','í','ĩ','ỉ',
'ý','ỳ','ỵ','ỷ','ỹ','ù','ú','ụ','ũ','ủ',
);

$text = str_replace($timthay,$thaythe, $text);
return strToLower($text);
} 
//Loai bo dau tieng viet
function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
return $str;
    }
