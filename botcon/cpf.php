<?php 

error_reporting(0);
set_time_limit(0);

date_default_timezone_set('America/Recife');
$dt_atual = date("Y/m/d H:i:s");
$timestamp_dt_atual = strtotime($dt_atual);

$array_usuarios = file("botcon/usuarios.txt");
$total_usuarios_registrados = count($array_usuarios);

$grupo = '-1001357422890';

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
     if($chat_id == $grupo || $chat_id == "-$grupo_vip[0]"){
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
                                    
} else if($chat_id == $grupo || $timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){ 

sleep(3);

function dados($string, $start, $end){
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$comando = str_replace(".", "", $comando);
$comando = str_replace("-", "", $comando);
	
if(strlen($comando) == 11){
	
$cpf = $comando;
unset($comando);
	
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
    CURLOPT_URL => 'https://oc-129-150-70-222.compute.oraclecloud.com/rest/venda-online/v2/propostas/ConsultaBaseCpf?cpf='.$cpf.'',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FOLLOWLOCATION => 1,        
    CURLOPT_HTTPHEADER => array(
        'Host: oc-129-150-70-222.compute.oraclecloud.com',
        'Accept: */*',
        'Authorization: Basic c29hY3NpbnRlZ3JhdGlvbnVzZXI6Y2Y3WlB4VlY2ajZLeEx3VA==',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
        'Accept-Language: pt-BR,pt;q=0.9'
    ),
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_CUSTOMREQUEST => 'GET',
));
         
$r4 = curl_exec($ch);

curl_close($ch);


$nomeCompleto = dados($r4,'"NomeCompleto" : "','"');
$dataNascimento = dados($r4, '"DataNascimento" : "','"');
$sexo = dados($r4,'"Sexo" : "','"');
$telefoneCelular = dados($r4,'"TelefoneCelular" : "','"');
$nomeMae = dados($r4,'"NomeMae" : "','"');
$logradouro = dados($r4,'"Logradouro" : "','"');
$numero = dados($r4,'"Numero" : "','"');
$bairro = dados($r4,'"Bairro" : "','"');
$cidade = dados($r4,'"Cidade" : "','"');
$estado = dados($r4,'"Estado" : "','"');
$mensagemRetorno = dados($r4,'"mensagemRetorno" : "','"');

if($mensagemRetorno == 'A CHAMADA AO SERVIÇO DA SISAMIL RETORNOU SEM CRÍTICA DE NEGÓCIO'){
	$situacao = 'REGULAR';
}else{
	$situacao = 'IRREGULAR';
}

unset($r4);

If($nomeCompleto != ""){

$separa = explode("/", $dataNascimento);
$dia = $separa[0]; 
$mes = $separa[1];
$ano = $separa[2];

$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$nascido = mktime( 0, 0, 0, $mes, $dia, $ano);
$idade = floor((((($hoje - $nascido) / 60) / 60) / 24) / 365.25);

if(!$nomeMae) {
    $nomeMae = 'SEM INFORMAÇÃO';   
}
if(!$telefoneCelular) {
    $telefoneCelular = 'SEM INFORMAÇÃO';   
}

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*
🔍 CONSULTA DE CPF 🔍*

*• CPF:* `$cpf`

*• SITUAÇÃO:* `$situacao`

*• NOME:* `$nomeCompleto`
*• NASCIMENTO:* `$dataNascimento`
*• IDADE:* `$idade anos`
*• SEXO:* `$sexo`

*• MÃE:* `$nomeMae`

*• LOGRADOURO:* `$logradouro`
*• NÚMERO:* `$numero`
*• BAIRRO:* `$bairro`
*• CIDADE:* `$cidade`
*• ESTADO:* `$estado`

*• TELEFONE:* `$telefoneCelular`

*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{
  
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
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
                                                         array('text'=>'🗑  Apagar  ??',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
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