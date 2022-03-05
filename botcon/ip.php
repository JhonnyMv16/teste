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

if(strpos($comando,".") !== false ){

$ip = $comando;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.localizaip.com.br/localizar-ip.php?ip=$ip");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close ($ch);

$var1 = explode('id="ip" value="', $data);
$var2 = explode('">', $var1[1]);

$var3 = explode('[countryName] => ', $data);
$var4 = explode('
    ', $var3[1]);

$var5 = explode('Estado:<b>', $data);
$var6 = explode('</b><br>', $var5[1]);

$var7 = explode('Cidade:<b>', $data);
$var8 = explode('</b><br><br>', $var7[1]);

$var9 = explode('[latitude] => ', $data);
$var10 = explode('
    ', $var9[1]);

$var11 = explode('[longitude] => ', $data);
$var12 = explode('
    ', $var11[1]);

$var15 = explode('[isp] => ', $data);
$var16 = explode('
)', $var15[1]);

$var17 = explode('IP-Reverso:<b>', $data);
$var18 = explode('</b><br>', $var17[1]);


if($var4[0] == "" && $var6[0] == "") {

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE IP* 🔍

*• IP NÃO ENCONTRADO!*

*BY:* @StarkConsultasbot", "reply_to_message_id"=> $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                   
                                                      )
                                                          
                                            )
                                    )));

}else{
 
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE IP* 🔍

*• IP:* `$var2[0]`
*• PAÍS:* `$var4[0]`
*• ESTADO:* `$var6[0]`
*• CIDADE:* `$var8[0]`
*• LATITUDE:* `$var10[0]`
*• LONGITUDE:* `$var12[0]`
*• PROVEDOR:* `$var16[0]`
*• IP REVERSO:* `$var18[0]`

*BY:* @VexedTutoriaisbot", "reply_to_message_id"=> $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                                                                                             
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                         
                                                      )
                                                          
                                            )
                                    )));
                                    
if($var10[0] != 0 || $var12[0] != 0) {
 
apiRequest("sendLocation", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, 'latitude' => $var10[0], 'longitude' => $var12[0],
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                                                                                             
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                     
                                                      )
                                                          
                                            )
                                    )));

}}
}else{
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*IP Checker* - _Consulta o número de IP, obtém dados do IP, como qual é o provedor, ip reverso, país, estado, cidade e as coordenadas de onde ele está localizado.

Formato:_
204.152.203.157

`/ip 204.152.203.157`", "reply_to_message_id"=> $message_id,
   'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                               
                                                      )
                                                          
                                            )
                                    )));
}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Seus créditos acabaram ou o seu plano venceu! Para comprar mais créditos ou renovar o seu plano, chame meu criador: [ @vexedoficial ]. Veja os valores dos créditos e dos planos, logo a baixo.", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 Créditos e Planos 💎',"callback_data"=>'queroservip')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    )));

} 
   
?>