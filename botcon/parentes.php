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

    
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://191.252.153.147/buscasjl.php?token=Pg6ZKyXcrYfzSG2TKqc1&parentes=$cpf",
	CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
	CURLOPT_TIMEOUT => 15,
	CURLOPT_CUSTOMREQUEST => "GET"
));

$exe = curl_exec($curl);

curl_close($curl);

$pesquisa = explode('<td><button onclick=', $exe);
for ($i=1; $i < 16; $i++) { 

    $CPF = getStr($pesquisa[$i], 'produto-id="','"');

    $dados = explode('<td>', $pesquisa[$i]);

    $dadosNome = explode('</td>', $dados[2]);
    $nome = $dadosNome[0];
    
    $dadosGrau = explode('</td>', $dados[3]);
    $grau = $dadosGrau[0];
    
    $dadosIdade = explode('</td>', $dados[4]);
    $idade = $dadosIdade[0];
    
    $dadosTelefone = explode('</td>', $dados[5]);
    $telefone = $dadosTelefone[0];
   
      
    if($CPF == "") break;

    $dados = "*• CPF:* `".$CPF."`\n*• NOME:* `".$nome."`\n*• GRAU DE PARENTESCO:* ".$grau."\n*• IDADE:* ".$idade."\n*• TELEFONE:* `".$telefone."`\n\n";
    
    $titulos = $titulos."\n".$dados;
 
}

If($titulos != ""){

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*🔍 CONSULTA DE PARENTES 🔍*
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

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ PARENTES NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
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