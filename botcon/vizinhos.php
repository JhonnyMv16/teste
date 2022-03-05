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

$comando = str_replace(".", "", $comando);
$comando = str_replace("-", "", $comando);
	
if(strlen($comando) == 11){
	
$cpf = $comando;
	
function validaCPF($cpf = null) {

	if(empty($cpf)) {
		return false;
	}

	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	if (strlen($cpf) != 11) {
		return false;
	} else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false; 
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

    if(!validaCPF($cpf)){               
        apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF INVÁLIDO!*", "reply_to_message_id" => $message_id,
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    ))); 
     
    } else {

    
$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_URL => "https://tudosobretodos.info/$cpf",
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_HTTPHEADER => array(
        'Host: tudosobretodos.info',
        'cache-control: max-age=0',
        'upgrade-insecure-requests: 1',
        'save-data: on',
        'user-agent: Mozilla/5.0 (Linux; Android 10; SM-A107M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'sec-fetch-site: cross-site',
        'sec-fetch-mode: navigate',
        'sec-fetch-user: ?1',
        'sec-fetch-dest: document',
        'accept-encoding: gzip, deflate, br',
        'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
        'cookie: __cfduid=dc3ac236c5f39888dbd7f585eedf6feb11596724421',
        'cookie: _ga=GA1.2.971515152.1596724424',
        'cookie: _gid=GA1.2.109978583.1596724424'
    ),
    CURLOPT_HEADER => 1,
    CURLOPT_SSL_VERIFYPEER => 0, 
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_COOKIESESSION => 1,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_COOKIEJAR => getcwd()."/cookie.txt",
    CURLOPT_COOKIEFILE => getcwd()."/cookie.txt",
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_ACCEPT_ENCODING => ''
));

$resultado = curl_exec($ch);

$n = 1;

$pesquisa = explode("<div class='itemMoradores", $resultado);
for ($i=1; $i < 7; $i++) { 

    $nome = getStr($pesquisa[$i], '>','</div');
    
    $nome = trim($nome);
    
    if($nome == "") break;
    
    $dados = "*• NOME:* `".$nome."`\n";
    
    $titulos = $titulos."\n".$dados;

    $n++;
 
}

If($titulos != ""){

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*🔍 CONSULTA DE VIZINHOS 🔍*

$titulos

*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                          
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ VIZINHOS NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                  
                                                      )
                                                          
                                            )
                                    )));

}}}else{       

        apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF INVÁLIDO!*", "reply_to_message_id" => $message_id,
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