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

$comando = str_replace("-", "", $comando);

if(strlen($comando) == 8){
   
function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$cep = $comando;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://viacep.com.br/ws/$cep/json");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close ($ch);

$cep = getStr($data, '"cep": "', '",');
$logradouro = getStr($data, '"logradouro": "', '",');
$complemento = getStr($data, '"complemento": "', '",');
$bairro = getStr($data, '"bairro": "', '",');
$localidade = getStr($data, '"localidade": "', '",');
$uf = getStr($data, '"uf": "', '",');
$ibge = getStr($data, '"ibge": "', '",');

if($cep == ""){
     
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE CEP* 🔍

*• CEP NÃO ENCONTRADO!*

🔛 *BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

} else if($complemento == ""){
	            
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE CEP* 🔍

*• Cep:*  `$cep`
*• Logradouro:*  `$logradouro`
*• Bairro:*  `$bairro`
*• Cidade:*  `$localidade`
*• Estado:*  `$uf`
*• Ibge:*  `$ibge`

*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
                                    
}else{
       
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE CEP* 🔍

*• Cep:*  `$cep`
*• Logradouro:*  `$logradouro`
*• Complemento:*  `$complemento`
*• Bairro:*  `$bairro`
*• Cidade:*  `$localidade`
*• Estado:*  `$uf`
*• Ibge:*  `$ibge`

*BY:* @StarkConsultasbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
                                    
}}else{
	
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*CEP Checker* - _Consulta de CEP, obtém informações sobre os logradouros (como nome de rua, avenida, alameda, beco, travessa, praça etc), nome de bairro, cidade e estado onde ele está localizado.

Formato:_
70040010
_ou_
70040-010

`/cep 70040010`", "reply_to_message_id" => $message_id,
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