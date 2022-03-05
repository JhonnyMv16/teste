<?php

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "🇺🇸  *Escolha o tipo:*",
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(                                                        
                                                         array('text'=>' 🔷 HTTP 🔷 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'HTTPUS'])) //botão com callback
                                                      ),
                                                      //linha 2
                                                     array(                                                         
                                                         array('text'=>' 🔶 SOCKS4 🔶 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SOCKS4US'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(                 
                                                         array('text'=>' 🔶 SOCKS5 🔶 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SOCKS5US'])) //botão com callback                                                                                                            
                                                      ),                                                      
                                                     //linha 4
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

?>