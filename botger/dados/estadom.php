<?php

apiRequest("editMessageText", array('chat_id' => $chat_id, 'message_id' => $message_id, "parse_mode" => "Markdown", "text" => "*Escolha o Estado:*",
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>' AC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ACM'])), //botão com callback                                                                                                            
                                                         array('text'=>' AL ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ALM'])), //botão com callback
                                                         array('text'=>' AP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'APM'])) //botão com callback
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>' AM ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'AMM'])), //botão com callback                                                                                                            
                                                         array('text'=>' BA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'BAM'])), //botão com callback
                                                         array('text'=>' CE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'CEM'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 3
                                                     array(
                                                         array('text'=>' DF ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'DFM'])), //botão com callback                                                                                                            
                                                         array('text'=>' ES ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ESM'])), //botão com callback
                                                         array('text'=>' GO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'GOM'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 4
                                                     array(
                                                         array('text'=>' MA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MAM'])), //botão com callback                                                                                                            
                                                         array('text'=>' MT ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MTM'])), //botão com callback
                                                         array('text'=>' MS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MSM'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                      //linha 5
                                                     array(
                                                         array('text'=>' MG ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'MGM'])), //botão com callback                                                                                                            
                                                         array('text'=>' PA ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PAM'])), //botão com callback
                                                         array('text'=>' PB ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PBM'])) //botão com callback
                                                      ),
                                                      //linha 6
                                                     array(
                                                         array('text'=>' PR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PRM'])), //botão com callback                                                                                                            
                                                         array('text'=>' PE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PEM'])), //botão com callback
                                                         array('text'=>' PI ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'PIM'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 7
                                                     array(
                                                         array('text'=>' RJ ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RJM'])), //botão com callback                                                                                                            
                                                         array('text'=>' RN ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RNM'])), //botão com callback
                                                         array('text'=>' RS ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RSM'])) //botão com callback                                                                                                            
                                                      ),
                                                      //linha 8
                                                     array(
                                                         array('text'=>' RO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'ROM'])), //botão com callback                                                                                                            
                                                         array('text'=>' RR ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'RRM'])), //botão com callback
                                                         array('text'=>' SC ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SCM'])) //botão com callback                                                                                                                                                              
                                                      ),
                                                       //linha 9
                                                     array(
                                                         array('text'=>' SP ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SPM'])), //botão com callback                                                                                                            
                                                         array('text'=>' SE ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'SEM'])), //botão com callback
                                                         array('text'=>' TO ',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'TOM'])) //botão com callback                                                                                                            
                                                      ),
                                                     //linha 10
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

?>