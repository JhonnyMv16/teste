<?php

if($type == 'private') {

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha o Banco:*",
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' Banco do Brasil ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'brasil']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' Bradesco ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'bradesco']))//botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' Caixa E. Federal ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'caixa']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' Itaú ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'itau']))//botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 5
                                                     array(
                                                         array('text'=>' Santander ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'santander']))//botão com callback                                                                                                            
                                                      ),
                                                     //linha 6
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha o Banco:*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' Banco do Brasil ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'brasil']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' Bradesco ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'bradesco']))//botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' Caixa E. Federal ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'caixa']))//botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' Itaú ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'itau']))//botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 5
                                                     array(
                                                         array('text'=>' Santander ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'santander']))//botão com callback                                                                                                            
                                                      ),
                                                     //linha 6
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>