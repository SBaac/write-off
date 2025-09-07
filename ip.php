<?php  
//https://www.w3resource.com/php-exercises/php-basic-exercise-5.php
//whether ip is from share internet
function  f_get_ip(){
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   
			  {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			  }
			//whether ip is from proxy
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
			  {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			  }
			//whether ip is from remote address
			else
			  {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			  }
			  
			return $ip_address;
}
?>