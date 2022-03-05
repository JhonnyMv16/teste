<?php

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => '🇺🇸  *HTTP

Escolha a quantidade:*',    
		    'reply_markup' => array('inline_keyboard' => array(
                                                         //linha 1
                                                         array(
                                                             array('text'=>' 10 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'proxyHUS10'])), //botão 1                                                                                                                  
                                                             array('text'=>' 20 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'proxyHUS20'])), //botão 2
                                                             array('text'=>' 30 ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'proxyHUS30'])) //botão 3                                                                                                                                                                                                                           
                                                          ),
                                                           //linha 2
                                                         array(
                                                             array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                                                                      
                                                         )
                                            )
                                    )));
                   
            
?>