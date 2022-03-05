<?php


class Curl
{

public $url;
public $headers;
public $method;
public $post;
public $data;

public function deleteCookies():void
{
   if(file_exists("cookie.txt")){
       unlink("cookie.txt");
    }
} 


public function Request() :string
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $this->url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER, 
$this->headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
if($this->method == 'POST'){
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $this->post);
} 
$this->data = curl_exec($ch);
return $this->data;
} 


public function getStr($string,$start,$end):string
{
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

function multiexplode($string){
    $delimiters = array(",","|",":","'"," ","~",";","»","/");
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], trim($ready));
    $launch = array(
         trim($launch[0]),
         trim($launch[1])
          );
    return $launch;
}


} 



?>