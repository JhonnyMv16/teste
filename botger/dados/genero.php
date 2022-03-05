<?php

if($type == 'private') {

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha uma das opções:*",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🙎🏻‍♂ Dados de Homem 🙎🏻‍♂',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'homem']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🙍🏻‍♀ Dados de Mulher 🙍🏻‍♀',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'mulher']))//botão com callback                                                                                                                                                              
                                                      ),
                                                     //linha 3
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha uma das opções:*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🙎🏻‍♂ Dados de Homem 🙎🏻‍♂',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'homem']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'🙍🏻‍♀ Dados de Mulher 🙍🏻‍♀',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'mulher']))//botão com callback                                                                                                                                                              
                                                      ),
                                                     //linha 3
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>