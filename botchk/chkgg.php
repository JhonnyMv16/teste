<?php
  
error_reporting(0);
set_time_limit(0);
DeletarCookies();
  
function deletarCookies() {
  if (file_exists(getcwd() . ('/cookie_" . rand(1, 1) . ".txt'))){
	@unlink('/cookie_" . rand(1, 1) . ".txt');
  }
}

date_default_timezone_set('America/Recife');
$dt_atual = date("Y/m/d H:i:s");
$timestamp_dt_atual = strtotime($dt_atual);

$array_usuarios = file("botcon/usuarios.txt");
$total_usuarios_registrados = count($array_usuarios);

$array_grupos = file("botcon/grupos.txt");
$total_grupos_registrados = count($array_grupos);

$continuar = false;
for($i=0;$i<count($array_usuarios);$i++){
    $explode = explode("|" , $array_usuarios[$i]);
     if($user_id == $explode[0]){
         $vencimento = $explode[1];
         $continuar = true;
     }
}

$timestamp_dt_expira = strtotime($vencimento);

if(!$continuar){
$continuar2 = false;
for($i=0;$i<count($array_grupos);$i++){
    $grupo_vip = explode("|" , $array_grupos[$i]);
     if($chat_id == "-$grupo_vip[0]"){
         $vencimento2 = $grupo_vip[1];
         $continuar2 = true;
     }
}

$timestamp_dt_expira2 = strtotime($vencimento2);
}

if(!$continuar && !$continuar2){
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Você não tem permissão para utilizar esse comando! Para se tornar um usuário VIP e ter acesso as consultas e os checkers, entre em contato com o meu desenvolvedor e contrate um plano.*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 PLANOS 💎',"callback_data"=>'queroservip')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    ))); 
                                    
} else if($timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){ 
	
if(strpos($comando,"|") !== false ){
	
function dados($string,$start,$end){
     $str = explode($start, $string);
     $str = explode($end, $str[1]);
    return $str[0];
}

function getstr($string,$start,$end){
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$lista = explode('
', $comando);  

if($type == 'private') {
	$nl = '1 linha';
}else{
    $nl = '1 linha';
}

if(count($lista) <= $nl){

foreach($lista as $line){

$line = str_replace(" " , "", $line);
$separar = explode("|", $line);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];

if(substr($cc,0,1) == 4){
	$bandeira = 'Visa';
}else if(substr($cc,0,1) == 5){
	$bandeira = 'MasterCard';
}

$dataCorreta = false;
if($mes > date("m") && $mes <= 12 && $ano == date("Y")){
    $dataCorreta = true;
}else if($mes >= 01 && $mes <= 12 && $ano > date("Y") && $ano <= date("Y") + 5){
	$dataCorreta = true;
}

$cvvCorreto = false;
if(strlen($cvv) == 3){
    if($cvv !== '000'){
       $cvvCorreto = true;
    }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.4devs.com.br/ferramentas_online.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=validar_cc&txt_cc='.$cc.'&bandeira='.$bandeira);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie_" . rand(1, 1) . ".txt");
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie_" . rand(1, 1) . ".txt");
$r0 = curl_exec($ch);

if(strpos($r0,"Verdadeiro") !== false && $dataCorreta !== false && $cvvCorreto !== false){
    
$bin = substr($cc,0,6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.cardbinlist.com/search.html?bin='.$bin.'');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
$return_dados = curl_exec($ch);
curl_close($ch);

$pais = trim(strip_tags(getstr($return_dados,'Issuer</th>','</a>')));
$pais = strtoupper($pais);
$banco = trim(strip_tags(getstr($return_dados,'Bank Issuer</th>','</td>')));
$brand = trim(strip_tags(getstr($return_dados,'Brand (Financial Service)</th>','</a>')));
$tipo = trim(strip_tags(getstr($return_dados,'Type</th>','</td>')));
$tipo = strtoupper($tipo);
$level = trim(strip_tags(getstr($return_dados,'Sub Brand</th>','</td>')));

if($level == "" || $tipo == ""){

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

}
if($level == "" || $tipo == ""){

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
$pais = trim(strip_tags(getstr($return_dados2,'"name":"','"')));
$pais = strtoupper($pais);

}

if(strlen($tipo) > 30 || $tipo == ""){
    $tipo = "N/A";
}else if($tipo == "CREDIT"){
    $tipo = "CREDITO";
}else{
	$tipo = "DEBITO";
}

if(strlen($level) > 30 || $level == ""){
    $level = "N/A";
}

if(strlen($brand) > 50 || $brand == ""){
    $brand = "N/A";
}

if(!$banco){
    $banco = "N/A";
}

if(strlen($pais) > 60 || $pais == ""){
    $pais = "N/A";
}else if($pais == 'BRAZIL'){
	$pais = 'BRASIL';
}

$unidade = "✅ #APROVADA ⇨ ".$cc."|".$mes."|".$ano."|".$cvv." | BANDEIRA: ".$brand." | TIPO: ".$tipo." | NÍVEL: ".$level." | BANCO: ".$banco." | PAÍS: ".$pais;

$titulos = $titulos."\n\n".$unidade;
  
} else {
	      
$unidade = "❌ #REPROVADA ⇨ ".$cc."|".$mes."|".$ano."|".$cvv." | RESPOSTA: Cartão Inválido!";
	
$titulos = $titulos."\n\n".$unidade;

}}

apiRequest("sendMessage", array('chat_id' => $chat_id, "text" =>

$titulos, "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else {

    if($type == 'private') {

        apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "⚠️ *Você tem que testar no maxímo $nl de cada vez*", 
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

    }else {

        apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "⚠️ *Você tem que testar no maxímo $nl de cada vez*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}}}else {                                        
     
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => '*Checker GG* - _Testador de Cartões de Crédito ou Débito gerados, testa a validade do cartão e obtém os detalhes do emissor (como onde ele está localizado) e os detalhes do cartão (como tipo, a bandeira e a categoria).

Bandeiras Suportadas:_
MASTERCARD e VISA

_Formato:_
4984069234151378|02|2022|377

`/chkgg 4984069234151378|02|2022|377`', "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "O seu plano venceu! Por favor, entre em contato com o meu desenvolvedor e renove o seu plano para continuar utilizando todas as consultas.", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 PLANOS 💎',"callback_data"=>'autorizados')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    ))); 

}

?>