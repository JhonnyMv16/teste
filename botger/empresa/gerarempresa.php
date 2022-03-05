<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.4devs.com.br/ferramentas_online.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"acao=gerar_empresa&pontuacao=S&estado=$estado&idade=5");

$output = curl_exec($ch);
curl_close ($ch);

$va1 = explode('<input type="text" title="Nome" id="nome" value="', $output);
$va2 = explode('"', $va1[1]);

$va3 = explode('<input type="text" title="CNPJ" id="cnpj" value="', $output);
$va4 = explode('"', $va3[1]);

$va5 = explode('<input type="text" title="Inscrição Estadual" id="ie" value="', $output);
$va6 = explode('"', $va5[1]);

$va7 = explode('<input type="text" title="Data de Abertura" id="data_abertura" value="', $output);
$va8 = explode('"', $va7[1]);

$va9 = explode('<input type="text" title="Site" id="site" value="', $output);
$va10 = explode('"', $va9[1]);

$va11 = explode('<input type="text" title="E-Mail" id="email" value="', $output);
$va12 = explode('"', $va11[1]);

$va13 = explode('<input type="text" title="CEP" id="cep" value="', $output);
$va14 = explode('"', $va13[1]);

$va15 = explode('<input type="text" title="Endereço" id="endereco" value="', $output);
$va16 = explode('"', $va15[1]);

$va17 = explode('<input type="text" title="Número" id="numero" value="', $output);
$va18 = explode('"', $va17[1]);

$va19 = explode('<input type="text" title="Bairro" id="bairro" value="', $output);
$va20 = explode('"', $va19[1]);

$va21 = explode('<input type="text" title="Cidade" id="cidade" value="', $output);
$va22 = explode('"', $va21[1]);

$va23 = explode('<input type="text" title="Estado" id="estado" value="', $output);
$va24 = explode('"', $va23[1]);

$va25 = explode('<input type="text" title="Telefone Fixo" id="telefone_fixo" value="', $output);
$va26 = explode('"', $va25[1]);

$va27 = explode('<input type="text" title="Celular" id="celular" value="', $output);
$va28 = explode('"', $va27[1]);

if($va2[0] == ""){
	
apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE EMPRESAS* ⚙

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
              
apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "⚙ *GERADOR DE EMPRESAS* ⚙

*• NOME:*  `$va2[0]`
*• CNPJ:*  `$va4[0]`
*• INSCRIÇÃO ESTADUAL:*  `$va6[0]`
*• DATA DE ABERTURA:*  `$va8[0]`
*• SITE:*  `$va10[0]`
*• EMAIL:*  `$va12[0]`

*• ENDEREÇO:*  `$va16[0]`
*• NÚMERO:*  `$va18[0]`
*• BAIRRO:*  `$va20[0]`
*• CIDADE:*  `$va22[0]`
*• ESTADO:*  `$va24[0]`
*• CEP:*  `$va14[0]`
*• TELEFONE:*  `$va26[0]`
*• CELULAR:*  `$va28[0]`

*BY:* @StarkConsultasbot",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                           
                                                     //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>