<?php

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "*Escolha o Estado:*",
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' AC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AC4'])), //botão com callback                                                                                                            
                                                         array('text'=>' AL ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AL4'])), //botão com callback
                                                         array('text'=>' AP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AP4'])) //botão com callback
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' AM ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AM4'])), //botão com callback                                                                                                            
                                                         array('text'=>' BA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'BA4'])), //botão com callback
                                                         array('text'=>' CE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'CE4'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' DF ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'DF4'])), //botão com callback                                                                                                            
                                                         array('text'=>' ES ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ES4'])), //botão com callback
                                                         array('text'=>' GO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'GO4'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' MA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MA4'])), //botão com callback                                                                                                            
                                                         array('text'=>' MT ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MT4'])), //botão com callback
                                                         array('text'=>' MS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MS4'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                      //linha 5
                                                     array(
                                                         array('text'=>' MG ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MG4'])), //botão com callback                                                                                                            
                                                         array('text'=>' PA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PA4'])), //botão com callback
                                                         array('text'=>' PB ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PB4'])) //botão com callback
                                                      ),
                                                      //linha 6
                                                     array(
                                                         array('text'=>' PR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PR4'])), //botão com callback                                                                                                            
                                                         array('text'=>' PE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PE4'])), //botão com callback
                                                         array('text'=>' PI ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PI4'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 7
                                                     array(
                                                         array('text'=>' RJ ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RJ4'])), //botão com callback                                                                                                            
                                                         array('text'=>' RN ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RN4'])), //botão com callback
                                                         array('text'=>' RS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RS4'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 8
                                                     array(
                                                         array('text'=>' RO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RO4'])), //botão com callback                                                                                                            
                                                         array('text'=>' RR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RR4'])), //botão com callback
                                                         array('text'=>' SC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SC4'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 9
                                                     array(
                                                         array('text'=>' SP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SP4'])), //botão com callback                                                                                                            
                                                         array('text'=>' SE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SE4'])), //botão com callback
                                                         array('text'=>' TO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'TO4'])) //botão com callback                                                                                                            
                                                      ),
                                                     //linha 10
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

?>