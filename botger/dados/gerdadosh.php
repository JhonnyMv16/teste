<?php

$idades = array('20', '25', '30', '35', '40', '45', '50', '55');
$idade = $idades[mt_rand(0, sizeof($idades) - 1)];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.4devs.com.br/ferramentas_online.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"acao=gerar_pessoa&cep_cidade=&cep_estado=$estado&idade=$idade&pontuacao=S&sexo=H");

$output = curl_exec($ch);
curl_close ($ch);

$json_r = json_decode($output);

$pai = explode(' ', $json_r->pai);

if($pai[6] == "") {
	$sobrenome = $pai[5];
}
if($pai[5] == "") {
	$sobrenome = $pai[4];
}
if($pai[4] == "") {
	$sobrenome = $pai[3];
}
if($pai[3] == "") {
	$sobrenome = $pai[2];
}
if($pai[2] == "") {
	$sobrenome = $pai[1];
} 
if($pai[5] == "da" || $pai[5] == "de" || $pai[5] == "do" || $pai[5] == "dos") {
    $sobrenome = $pai[5]." ".$sobrenome;
}else if($pai[4] == "da" || $pai[4] == "de" || $pai[4] == "do" || $pai[4] == "dos") {
    $sobrenome = $pai[4]." ".$sobrenome;
}else if($pai[3] == "da" || $pai[3] == "de" || $pai[3] == "do" || $pai[3] == "dos") {
    $sobrenome = $pai[3]." ".$sobrenome;
}else if($pai[2] == "da" || $pai[2] == "de" || $pai[2] == "do" || $pai[2] == "dos") {
    $sobrenome = $pai[2]." ".$sobrenome;
}else if($pai[1] == "da" || $pai[1] == "de" || $pai[1] == "do" || $pai[1] == "dos") {
    $sobrenome = $pai[1]." ".$sobrenome;
}

if($json_r->nome == ""){
	
apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE PESSOAS* ⚙

*• NÃO FOI POSSÍVEL GERAR!*

*BY:* @StarkConsultasbot",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                         
                                                     //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
	
}else{
      
apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE PESSOAS* ⚙

*• NOME:*  `$json_r->nome`
*• DT DE NASC:*  `$json_r->data_nasc`
*• CPF:*  `$json_r->cpf`
*• RG:*  `$json_r->rg`
*• MÃE:*  `$json_r->mae $sobrenome`
*• PAI:*  `$json_r->pai`
*• ALTURA:*  `$json_r->altura`
*• PESO:*  `$json_r->peso`
*• TIPO SANG:*  `$json_r->tipo_sanguineo`
*• SIGNO:*  `$json_r->signo`

*• ENDEREÇO:*  `$json_r->endereco`
*• NÚMERO:*  `$json_r->numero`
*• BAIRRO:*  `$json_r->bairro`
*• CIDADE:*  `$json_r->cidade`
*• ESTADO:*  `$json_r->estado`
*• CEP:*  `$json_r->cep`
*• TELEFONE:*  `$json_r->telefone_fixo`
*• CELULAR:*  `$json_r->celular`
*• EMAIL:*  `$json_r->email`
*• SENHA:*  `$json_r->senha`

*BY:* @StarkConsultasbot",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🔁  Atualizar  🔁',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'gerardadosdehomem']))//botão com callback                                                   
                                                      ),
                                                     //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>