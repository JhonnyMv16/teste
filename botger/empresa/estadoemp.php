<?php

if($type == 'private') {

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha o Estado:*",
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' AC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ACE'])), //botão com callback                                                                                                            
                                                         array('text'=>' AL ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ALE'])), //botão com callback
                                                         array('text'=>' AP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'APE'])) //botão com callback
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' AM ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AME'])), //botão com callback                                                                                                            
                                                         array('text'=>' BA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'BAE'])), //botão com callback
                                                         array('text'=>' CE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'CEE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' DF ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'DFE'])), //botão com callback                                                                                                            
                                                         array('text'=>' ES ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ESE'])), //botão com callback
                                                         array('text'=>' GO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'GOE'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' MA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MAE'])), //botão com callback                                                                                                            
                                                         array('text'=>' MT ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MTE'])), //botão com callback
                                                         array('text'=>' MS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MSE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                      //linha 5
                                                     array(
                                                         array('text'=>' MG ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MGE'])), //botão com callback                                                                                                            
                                                         array('text'=>' PA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PAE'])), //botão com callback
                                                         array('text'=>' PB ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PBE'])) //botão com callback
                                                      ),
                                                      //linha 6
                                                     array(
                                                         array('text'=>' PR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PRE'])), //botão com callback                                                                                                            
                                                         array('text'=>' PE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PEE'])), //botão com callback
                                                         array('text'=>' PI ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PIE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 7
                                                     array(
                                                         array('text'=>' RJ ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RJE'])), //botão com callback                                                                                                            
                                                         array('text'=>' RN ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RNE'])), //botão com callback
                                                         array('text'=>' RS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RSE'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 8
                                                     array(
                                                         array('text'=>' RO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ROE'])), //botão com callback                                                                                                            
                                                         array('text'=>' RR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RRE'])), //botão com callback
                                                         array('text'=>' SC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SCE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 9
                                                     array(
                                                         array('text'=>' SP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SPE'])), //botão com callback                                                                                                            
                                                         array('text'=>' SE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SEE'])), //botão com callback
                                                         array('text'=>' TO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'TOE'])) //botão com callback                                                                                                            
                                                      ),
                                                     //linha 10
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

} else {

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Escolha o Estado:*", "reply_to_message_id" => $message_id,
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' AC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ACE'])), //botão com callback                                                                                                            
                                                         array('text'=>' AL ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ALE'])), //botão com callback
                                                         array('text'=>' AP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'APE'])) //botão com callback
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' AM ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AME'])), //botão com callback                                                                                                            
                                                         array('text'=>' BA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'BAE'])), //botão com callback
                                                         array('text'=>' CE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'CEE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' DF ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'DFE'])), //botão com callback                                                                                                            
                                                         array('text'=>' ES ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ESE'])), //botão com callback
                                                         array('text'=>' GO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'GOE'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' MA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MAE'])), //botão com callback                                                                                                            
                                                         array('text'=>' MT ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MTE'])), //botão com callback
                                                         array('text'=>' MS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MSE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                      //linha 5
                                                     array(
                                                         array('text'=>' MG ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MGE'])), //botão com callback                                                                                                            
                                                         array('text'=>' PA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PAE'])), //botão com callback
                                                         array('text'=>' PB ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PBE'])) //botão com callback
                                                      ),
                                                      //linha 6
                                                     array(
                                                         array('text'=>' PR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PRE'])), //botão com callback                                                                                                            
                                                         array('text'=>' PE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PEE'])), //botão com callback
                                                         array('text'=>' PI ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PIE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 7
                                                     array(
                                                         array('text'=>' RJ ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RJE'])), //botão com callback                                                                                                            
                                                         array('text'=>' RN ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RNE'])), //botão com callback
                                                         array('text'=>' RS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RSE'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 8
                                                     array(
                                                         array('text'=>' RO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ROE'])), //botão com callback                                                                                                            
                                                         array('text'=>' RR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RRE'])), //botão com callback
                                                         array('text'=>' SC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SCE'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 9
                                                     array(
                                                         array('text'=>' SP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SPE'])), //botão com callback                                                                                                            
                                                         array('text'=>' SE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SEE'])), //botão com callback
                                                         array('text'=>' TO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'TOE'])) //botão com callback                                                                                                            
                                                      ),
                                                     //linha 10
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}

?>