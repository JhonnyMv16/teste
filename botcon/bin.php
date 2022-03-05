<?php 

error_reporting(0);
set_time_limit(0);

date_default_timezone_set('America/Recife');
$dt_atual = date("Y/m/d H:i:s");
$timestamp_dt_atual = strtotime($dt_atual);

$array_usuariosBlacklist = file("blacklist/usuariosBlacklist.txt");
$total_usuariosBlacklist_registrados = count($array_usuariosBlacklist);

$array_gruposBlacklist = file("blacklist/gruposBlacklist.txt");
$total_gruposBlacklist_registrados = count($array_gruposBlacklist);

for($i=0;$i<count($array_usuariosBlacklist);$i++){
    $explode = explode("|" , $array_usuariosBlacklist[$i]);
     if($user_id == $explode[0]){
         $vencimento = $explode[1];         
     }
}

$timestamp_dt_expira = strtotime($vencimento);

for($i=0;$i<count($array_gruposBlacklist);$i++){
    $grupo_vip = explode("|" , $array_gruposBlacklist[$i]);
     if($chat_id == "-$grupo_vip[0]"){
         $vencimento2 = $grupo_vip[1];        
     }
}

$timestamp_dt_expira2 = strtotime($vencimento2);

if($timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ Você não tem permissão para utilizar esse comando! Pois, você ou o grupo está na Blacklist.*", "reply_to_message_id" => $message_id)); 
} else if($timestamp_dt_atual > $timestamp_dt_expira || $timestamp_dt_atual > $timestamp_dt_expira2){ 

$continuar = false;

if($comando !== "" && strlen($comando) == 6){ 
    $continuar = true;
}

if($continuar){

date_default_timezone_set('America/Sao_Paulo');

function getstr($string,$start,$end){
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$bin = $comando;

unset($comando);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.cardbinlist.com/search.html?bin='.$bin.'');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
$return_dados = curl_exec($ch);
curl_close($ch);

$pais      = trim(strip_tags(getstr($return_dados,'Issuer</th>','</a>')));
$pais 	   = strtoupper($pais);
$pais_code = trim(strip_tags(getstr($return_dados,'Code</th>','</td>')));
$banco     = trim(strip_tags(getstr($return_dados,'Bank Issuer</th>','</td>')));
$banco_url = trim(strip_tags(getstr($return_dados,'Bank Web URL</th>','</td>')));
$banco_url = strtoupper($banco_url);
$banco_tel = trim(strip_tags(getstr($return_dados,'Bank Telephone</th>','</td>')));
$brand     = trim(strip_tags(getstr($return_dados,'Brand (Financial Service)</th>','</a>')));
$tipo      = trim(strip_tags(getstr($return_dados,'Type</th>','</td>')));
$tipo      = strtoupper($tipo);
$level = trim(strip_tags(getstr($return_dados,'Sub Brand</th>','</td>')));

if($level == ""){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.freebinchecker.com/bin-lookup/amp?bin='.$bin.'&hl=pt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
$return_dados = curl_exec($ch);
curl_close($ch);

$split1 = explode('<title>', $return_dados);
$split2 = explode('</title>', $split1[1]);
$titulo = $split2[0];

$separa = explode(' ', $titulo);
$brand = $separa[2];

$split3 = explode('card-bin-list/amp?hl=pt">', $return_dados);
$split4 = explode('</a></td>', $split3[1]);
$tipo = $split4[0];
$tipo = strtoupper($tipo);

$split5 = explode('emitido por ', $titulo);
$split6 = explode('em', $split5[1]);
$banco = $split6[0];

$split7 = explode('(<a target="_blank" href="', $return_dados);
$split8 = explode('">', $split7[1]);
$split9 = explode('</a>', $split8[1]);
$level = $split9[0];

$split10 = explode('<meta property="og:title"', $return_dados);
$split11 = explode('em ', $split10[1]);
$split12 = explode('">', $split11[1]);
$pais = $split12[0];
$pais = strtoupper($pais);

$pais_code = trim(strip_tags(getstr($return_dados,'</amp-img></td>','</a>')));

$banco_url = trim(strip_tags(getstr($return_dados,'город</th>','<td></td>')));
$split13 = explode('                
        ', $banco_url);
$split14 = explode('
        ', $split13[1]);
$banco_url = $split14[0];
$banco_url = strtoupper($banco_url);

$banco_tel = trim(strip_tags(getstr($return_dados,'город</th>','<td></td>')));
$split15 = explode('                
        ', $banco_tel);
$split16 = explode('
        ', $split15[1]);
$banco_tel = $split16[1];

}
if($level == ""){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
$return_dados2 = curl_exec($ch);
curl_close($ch);


$level = trim(strip_tags(getstr($return_dados2,'"brand":"','"')));
$level = strtoupper($level);
$banco = trim(strip_tags(getstr($return_dados2,'"bank":{"name":"','"')));
$banco = strtoupper($banco);
$brand = trim(strip_tags(getstr($return_dados2,'"scheme":"','"')));
$brand = strtoupper($brand);
$tipo = trim(strip_tags(getstr($return_dados2,'"type":"','"')));
$tipo = strtoupper($tipo);
$pais_code = trim(strip_tags(getstr($return_dados2,'"alpha2":"','"')));
$pais = trim(strip_tags(getstr($return_dados2,'"name":"','"')));
$pais = strtoupper($pais);
$banco_tel = trim(strip_tags(getstr($return_dados2,'"phone":"','"')));

}

if(strlen($tipo) > 30){
    $tipo = "N/A";
}

if(strlen($level) > 30){
    $level = "N/A";
}

if(strlen($brand) > 50){
    $brand = "N/A";
}

if(strlen($pais) > 60){
    $pais = "N/A";
}

if($brand == ""){
    $brand = "N/A";
}

if($tipo == ""){
    $tipo = "N/A";
}

if($level == ""){
    $level = "N/A";
}

if($banco == ""){
    $banco = "N/A";
}

if($banco_tel == ""){
    $banco_tel = "N/A";
}

if($banco_url == ""){
    $banco_url = "N/A";
}

if($pais == ""){
    $pais = "N/A";
}

if($pais_code == ""){
    $pais_code = "N/A";
}
        
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE BIN* 🔍

*• BIN:* `$bin`
*• BANDEIRA:* `$brand`
*• TIPO:* `$tipo`
*• NIVEL:* `$level`
*• BANCO:* `$banco`
*• BANCO TEL:* `$banco_tel`
*• BANCO URL:* `$banco_url`
*• PAÍS:* `$pais`
*• ID:* `$pais_code`

*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                               
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback   
                                                      )
                                                          
                                            )
                                    )));

}else{
	
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*BIN Checker* - _Consulta de BIN, obtém os detalhes do emissor (como qual banco ou instituição financeira emitiu o cartão e onde ele está localizado), o tipo, a bandeira e a categoria do cartão.

Formato:_
498408

`/bin 498408`", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Seus créditos acabaram ou o seu plano venceu! Para comprar mais créditos ou renovar o seu plano, chame meu criador: [ @StarkVendasOFC ]. Veja os valores dos créditos e dos planos, logo a baixo.", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 Créditos e Planos 💎',"callback_data"=>'queroservip')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    )));
                                    
} 

?>