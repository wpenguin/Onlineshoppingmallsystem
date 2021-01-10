<?php
	$begin = 0;
	$end = 20;
	$limt = 5;
	$rand_array = range($begin,$end);
	shuffle($rand_array);
	$rst = array_slice($rand_array,0,$limt);
	$info = $rst[0].$rst[1].$rst[2].$rst[3].$rst[4];
	if(!empty($_FILES['pic'])){	
		$pic_info = $_FILES['pic'];
		if($pic_info['error'] >0){
			$error_msg = '上传错误:';
			switch($pic_info['error']){
				case 1: $error_msg .= '文件大小超过了php.ini中upload_max_filesize选项限制的值！'; break;
				case 2: $error_msg .= '文件大小超过了表单中max_file_size选项指定的值！'; break;
				case 3: $error_msg .= '文件只有部分被上传！'; break;
				case 4: $error_msg .= '没有文件被上传！'; break;
				case 6: $error_msg .= '找不到临时文件夹！'; break;
				case 7: $error_msg .= '文件写入失败！'; break;
				default: $error_msg .='未知错误！'; break; 
			}
			echo $error_msg;
			return false;
		}
		$type = substr(strrchr($pic_info['name'],'.'),1);
		if($type !== 'jpg'){
			echo '图像类型不符合要求，允许的类型为:jpg';
			return false;
		}
		list($width, $height) = getimagesize($pic_info['tmp_name']);
		$maxwidth = $maxheight= 100;
		if($width > $height){
			$newwidth = $maxwidth;
			$newheight = round($newwidth*$height/$width);
		}else{
			$newheight = $maxheight;
			$newwidth = round($newheight*$width/$height);
		}
		$thumb = imageCreateTrueColor($newwidth,$newheight);
		$source = imagecreatefromjpeg($pic_info['tmp_name']);
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		$new_file = '../user/img/'.$info.'.jpg';
		imagejpeg($thumb,$new_file,100);
	}
?>