<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.invertexto.com/ajax/gerar-conta-bancaria.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"banco=2&estado=".$estado);

$output = curl_exec($ch);
curl_close ($ch);

$json_r = json_decode($output);

if($json_r->banco == ""){
	
apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE CONTAS* ⚙

*• NÃO FOI POSSÍVEL GERAR!*

*BY:* @StarkConsultasbot",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                          
                                                     //linha 2
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
	
} else {

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE CONTAS* ⚙

*• BANCO:*  `$json_r->banco`
*• AGÊNCIA:*  `$json_r->agencia`
*• CONTA:*  `$json_r->conta`
*• CIDADE:*  `$json_r->cidade`
*• ESTADO:*  `$json_r->estado`

*BY:* @StarkConsultasbot",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                          
                                                     //linha 2
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>