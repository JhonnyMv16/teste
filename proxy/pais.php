<?php

if($type == 'private') {

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "*Escolha a localidade:*",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🇧🇷  Brasil  🇧🇷',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'proxybrasil']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🇺🇸  Estados Unidos  🇺🇸',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'estadosunidos']))//botão com callback                                                                                                                                                              
                                                      ),
                                                     //linha 3
                                                     array(
                                                         array('text'=>'🔙  Voltar  🔙',"callback_data"=>'menu') //botão 4                                                      
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "*Escolha a localidade:*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🇧🇷  Brasil  🇧🇷',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'proxybrasil']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🇺🇸  Estados Unidos  🇺🇸',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'estadosunidos']))//botão com callback                                                                                                                                                                                       
                                                      ),
                                                     //linha 3
                                                     array(
                                                         array('text'=>'🔙  Voltar  🔙',"callback_data"=>'menu') //botão 4                                                      
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>