<?php 

error_reporting(0);
set_time_limit(0);

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
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Você não tem permissão! Se quiser se tornar um usuário VIP, chame meu criador: [ @StarkVendasOFC ]. Veja os valores dos planos, logo a baixo.*", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'COMPRAR PARA MIM',"callback_data"=>'vipprivado'), //botão 1
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'COMPRAR PARA MEU GRUPO',"callback_data"=>'vipgrupo'), //botão 1
                                                      )
                                                          
                                            )
                                    )));
                                    
} else if($timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){ 
	
function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}
	
$l1 = substr($comando,0,1); 
$l2 = substr($comando,1,1);
$l3 = substr($comando,2,1);

$n1 = substr($comando,3,1); 
$n3 = substr($comando,5,1);
$n4 = substr($comando,6,1);

if(strlen($comando) == 7 && is_numeric($l1) == false && is_numeric($l2) == false && is_numeric($l3) == false && is_numeric($n1) == true && is_numeric($n3) == true && is_numeric($n4) == true) {
	
$placa = $comando;
	
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://apicarros.com/v1/consulta/$placa/json",
	CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false, 
    CURLOPT_SSL_VERIFYHOST => false,
	CURLOPT_TIMEOUT => 10,
	CURLOPT_CUSTOMREQUEST => "GET"
));

$exe = curl_exec($curl);

curl_close($curl);

$exe = str_replace("\u00e1", "á", $exe);
$exe = str_replace("\u00e0", "à", $exe);
$exe = str_replace("\u00e2", "â", $exe);
$exe = str_replace("\u00e3", "ã", $exe);
$exe = str_replace("\u00e9", "é", $exe);
$exe = str_replace("\u00e8", "è", $exe);
$exe = str_replace("\u00ea", "ê", $exe);
$exe = str_replace("\u00ed", "í", $exe);
$exe = str_replace("\u00f3", "ó", $exe);
$exe = str_replace("\u00f2", "ò", $exe);
$exe = str_replace("\u00f4", "ô", $exe);
$exe = str_replace("\u00f5", "õ", $exe);
$exe = str_replace("\u00fa", "ú", $exe);
$exe = str_replace("\u00f9", "ù", $exe);
$exe = str_replace("\u00e7", "ç", $exe);
                      
$ano = getStr($exe,'ano": "','"');
$anoModelo = getStr($exe,'anoModelo": "','"');
$chassi = getStr($exe,'chassi": "','"');
$codigoRetorno = getStr($exe,'codigoRetorno": "','"');
$codigoSituacao = getStr($exe,'codigoSituacao": "','"');
$cor = getStr($exe,'cor": "','"');
$cor = strtoupper($cor);
$data = getStr($exe,'data": "','"');
$dataAtualizacaoAlarme = getStr($exe,'dataAtualizacaoAlarme": "','"');
$dataAtualizacaoCaracteristicasVeiculo = getStr($exe,'dataAtualizacaoCaracteristicasVeiculo": "','"');
$dataAtualizacaoRouboFurto = getStr($exe,'dataAtualizacaoRouboFurto": "','"');
$marca = getStr($exe,'marca": "','"');
$mensagemRetorno = getStr($exe,'mensagemRetorno": "','"');
$modelo = getStr($exe,'modelo": "','"');
$municipio = getStr($exe,'municipio": "','"');
$placa = getStr($exe,'placa": "','"');
$situacao = getStr($exe,'situacao": "','"');            
$situacao = strtoupper($situacao);
$uf = getStr($exe,'uf": "','"');
                 
If($modelo != ""){
	              
    if(stripos($data, "T")) {
        $dataDia = explode('T', $data);
        $dataHora = explode('.', $dataDia[1]);
        $dataCorreta = explode('-', $dataDia[0]);
        $data = "$dataCorreta[2]/$dataCorreta[1]/$dataCorreta[0] às $dataHora[0]";
    }
    if(!$data) {
        $data = 'SEM INFORMAÇÃO';                   
    }
    if(!$dataAtualizacaoAlarme) {
        $dataAtualizacaoAlarme = '
SEM INFORMAÇÃO';   
    }
    if(!$dataAtualizacaoCaracteristicasVeiculo) {
        $dataAtualizacaoCaracteristicasVeiculo = '
SEM INFORMAÇÃO';                  
    }
    if(!$dataAtualizacaoRouboFurto) {
        $dataAtualizacaoRouboFurto = '
SEM INFORMAÇÃO';   
    }
    if($situacao == 'SEM RESTRIçãO') {
        $situacao = 'SEM RESTRIÇÃO';                   
    }
                                             
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA  DE  PLACA 🔍*

*• PLACA:* `$placa`
*• SITUAÇÃO:* `$situacao`

*• ANO - FABRICAÇÃO:* `$ano`
*• ANO - MODELO:* `$anoModelo`

*• MARCA:* `$marca`
*• MODELO:* `$modelo`

*• COR:* `$cor`

*• CHASSI:* `$chassi`

*• CÓDIGO - RETORNO:* `$codigoRetorno`
*• CÓDIGO - SITUAÇÃO:* `$codigoSituacao`

*• DATA:* `$data`

*• DATA - ATUALIZAÇÃO - ALARME:* `$dataAtualizacaoAlarme`

*• DATA - ATUALIZAÇÃO - ROUBO/FURTO:* `$dataAtualizacaoRouboFurto`

*• CIDADE:* `$municipio`
*• ESTADO:* `$uf`


*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                          
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{
    
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ PLACA NÃO ENCONTRADA!*", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}}else{       
	
      apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ PLACA INVÁLIDA!*", "reply_to_message_id" => $message_id,
      'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    ))); 
       
}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Seu plano venceu! Para ou renovar o seu plano, chame meu criador: [ @vexedoficial ]. Veja os valores dos planos, logo a baixo.", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'COMPRAR PARA MIM',"callback_data"=>'vipprivado'), //botão 1
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'COMPRAR PARA MEU GRUPO',"callback_data"=>'vipgrupo'), //botão 1
                                                      )
                                                          
                                            )
                                    )));

}  
	
?>
