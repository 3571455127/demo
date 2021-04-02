 <?php 
$the_host = $_SERVER['HTTP_HOST'];//取得进入所输入的域名 
//echo $the_host;
$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';//判断后面的请求部分 
//echo $request_uri;exit;
if(strpos($request_uri,'blog/')){ 
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$the_host.'/news.html');
exit(); 
} 
if(strpos($request_uri,'admin/')){ 
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$the_host.'/');
exit(); 
} 
if(strpos($request_uri,'product-detail')){ 
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$the_host.'/product.html');
exit(); 
}
if(strpos($request_uri,'productGroupList')){ 
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$the_host.'/product.html');
exit(); 
}
if(strpos($request_uri,'products/')){ 
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$the_host.'/product.html');
exit(); 
}
?> 

