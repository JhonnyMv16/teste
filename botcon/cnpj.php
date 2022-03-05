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

$comando = str_replace(".", "", $comando);
$comando = str_replace("/", "", $comando);
$comando = str_replace("-", "", $comando);

if(strlen($comando) == 14){

$cnpj = $comando;

function validaCNPJ($cnpj = null) {
	
	if(empty($cnpj)) {
		return false;
	}

	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
	
	if (strlen($cnpj) != 14) {
		return false;
	} else if ($cnpj == '00000000000000' || 
		$cnpj == '11111111111111' || 
		$cnpj == '22222222222222' || 
		$cnpj == '33333333333333' || 
		$cnpj == '44444444444444' || 
		$cnpj == '55555555555555' || 
		$cnpj == '66666666666666' || 
		$cnpj == '77777777777777' || 
		$cnpj == '88888888888888' || 
		$cnpj == '99999999999999') {
		return false;
		 
	 } else {   
	 
		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

			$soma2 += ($cnpj{$i} * $k);

			if ($i < 12) {
				$soma1 += ($cnpj{$i} * $j);
			}

			$k--;
			$j--;

		}

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

		return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
	 
	}
}

    if(!validaCNPJ($cnpj)){
        if($type == 'private') {
            
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CNPJ INVÁLIDO!*",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                 
                                                      )
                                                          
                                            )
                                    )));
        }else{
            
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CNPJ INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                                          
                                                      )
                                                          
                                            )
                                    ))); 
        }
    } else {
   
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/$cnpj");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);

curl_close($ch);

$json = json_decode($data, true);

$atividade_principal = $json["atividade_principal"][0]["code"]." - ".$json["atividade_principal"][0]["text"];


$atividades_secundarias = $json["atividades_secundarias"];
foreach($atividades_secundarias as $items){
    $secundarias = $items["code"]." - ".$items["text"];

    $atividades = $atividades."\n".$secundarias;
}

$n = 1;
$qsa = $json['qsa'];
foreach($qsa as $items){
	if($n > 50) break;
    $qualificacao = "NOME: ".$items["nome"]."\nQUALIFICAÇÃO: ".$items["qual"];

    $qualificacao_nome = $qualificacao_nome."\n\n".$qualificacao;

    $n++;
}

$status = $json["status"];
$data_situacao = $json["data_situacao"];
$nome = $json["nome"];
$uf = $json["uf"];
$telefone = $json["telefone"];
$situacao = $json["situacao"];
$bairro = $json["bairro"];
$logradouro = $json["logradouro"];
$numero = $json["numero"];
$cep = $json["cep"];
$municipio = $json["municipio"];
$porte = $json["porte"];
$abertura = $json["abertura"];
$natureza_juridica = $json["natureza_juridica"];
$fantasia = $json["fantasia"];
$cnpj = $json["cnpj"];
$ultima_atualizacao = $json["ultima_atualizacao"];
$tipo = $json["tipo"];
$complemento = $json["complemento"];
$email = $json["email"];
$efr = $json["efr"];
$motivo_situacao = $json["motivo_situacao"];
$situacao_especial = $json["situacao_especial"];
$data_situacao_especial = $json["data_situacao_especial"];
$capital_social = $json["capital_social"];

if($fantasia == "") {
	$fantasia = "******";
}
if($complemento == "") {
	$complemento = "******";
}
if($email == "") {
	$email = "******";
}
if($efr == "") {
	$efr = "******";
}
if($motivo_situacao == "") {
	$motivo_situacao = "******";
}
if($situacao_especial == "") {
	$situacao_especial = "******";
}
if($data_situacao_especial == "") {
	$data_situacao_especial = "******";
}

if($status != 'ERROR'){
	
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA DE CNPJ* 🔍

*• CNPJ:*  `$cnpj`
*• TIPO:*  `$tipo`

*• ABERTURA:*  `$abertura`

*• NOME:*  `$nome`

*• NOME FANTASIA:*  `$fantasia`
*• PORTE:*  `$porte`

*• CÓDIGO E ATIVIDADE PRINCIPAL:* `$atividade_principal`

*• CÓDIGO E ATIVIDADES SECUNDÁRIAS:* `$atividades`

*• CÓDIGO E NATUREZA JURÍDICA:*  `$natureza_juridica`

*• QUADRO DE SÓCIOS E ADMINISTRADORES:*  `$qualificacao_nome`

*• LOGRADOURO:*  `$logradouro`
*• NÚMERO:*  `$numero`
*• COMPLEMENTO:*  `$complemento`

*• CEP:*  `$cep`
*• BAIRRO/DISTRITO:*  `$bairro`
*• MUNICÍPIO:*  `$municipio`
*• ESTADO:*  `$uf`

*• TELEFONE:*  `$telefone`
*• EMAIL:*  `$email`

*• STATUS:*  `$status`

*• ÚLTIMA ATUALIZAÇÃO:*  `$ultima_atualizacao`

*• EFR:*  `$efr`

*• SITUAÇÃO CADASTRAL:*  `$situacao`

*• MOTIVO DE SITUAÇÃO CADASTRAL:*  `$motivo_situacao`

*• SITUAÇÃO ESPECIAL:*  `$situacao_especial`
*• DATA DA SITUAÇÃO ESPECIAL:*  `$data_situacao_especial`

*• CAPITAL SOCIAL:*  `R$ $capital_social`


*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                              
                                                      )
                                                          
                                            )
                                    )));

}else{
    
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA  DE  CNPJ* 🔍

*• CNPJ NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                                          
                                                      )
                                                          
                                            )
                                    )));

}}}else{
    if($type == 'private') {
            
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CNPJ INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                    
                                                      )
                                                          
                                            )
                                    )));
        }else{
            
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CNPJ INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    ))); 
        }
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