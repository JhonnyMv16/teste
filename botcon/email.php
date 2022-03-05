<?php 

error_reporting(0);
set_time_limit(0);

date_default_timezone_set('America/Recife');
$dt_atual = date("Y/m/d H:i:s");
$timestamp_dt_atual = strtotime($dt_atual);

$array_usuarios = file("botcon/usuarios.txt");
$total_usuarios_registrados = count($array_usuarios);

$array_grupos = file("botcon/grupos.txt");
$total_grupos_registrados = count($array_grupos);

$continuar = false;
for($i=0;$i<count($array_usuarios);$i++){
    $explode = explode("|" , $array_usuarios[$i]);
     if($user_id == $explode[0]){
         $vencimento = $explode[1];
         $continuar = true;
     }
}

$timestamp_dt_expira = strtotime($vencimento);

if(!$continuar){
$continuar2 = false;
for($i=0;$i<count($array_grupos);$i++){
    $grupo_vip = explode("|" , $array_grupos[$i]);
     if($chat_id == "-$grupo_vip[0]"){
         $vencimento2 = $grupo_vip[1];
         $continuar2 = true;
     }
}

$timestamp_dt_expira2 = strtotime($vencimento2);
}

if(!$continuar && !$continuar2){
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Você não tem permissão! Se quiser se tornar um usuário VIP, chame meu criador: [ @StarkVendasOFC ]. Veja os valores dos planos, logo a baixo.*", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'COMPRAR PARA MIM',"callback_data"=>'vipprivado'), //botão 1
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'COMPRAR PARA MEU GRUPO',"callback_data"=>'vipgrupo'), //botão 1
                                                      )
                                                          
                                            )
                                    )));
                                    
} else if($timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){ 

$email = $comando;
	
if(strpos($email,"@") === false) {
    
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ EMAIL INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}else{
	
function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}


$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://191.252.153.147/buscasjl.php?token=Pg6ZKyXcrYfzSG2TKqc1&email=$email",
	CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
	CURLOPT_TIMEOUT => 15,
	CURLOPT_CUSTOMREQUEST => "GET"
));

$exe = curl_exec($curl);

curl_close($curl);


$cpf = getStr($exe, 'produto-id="','"');

$dados = getStr($exe, 'Detalhes</button></td>','</tr></table>');

$nome = getStr($dados, '<td>','</td>');
$nascimento = getStr($dados, '</td>','/td>');
$nascimento = getStr($nascimento, '<td>','<');
$idade = getStr($dados, '</td>','/td>');
$idade = getStr($idade, '<td>','<');

$info = explode('<td>', $dados);

$idade = $info[3];
$idade = explode('</td>', $idade);
$idade = $idade[0];
$local = $info[4];
$local = explode('</td>', $local);
$local = $local[0];

If($nascimento){

apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*🔍 CONSULTA DE EMAIL 🔍*

*• CPF:* `$cpf`

*• NOME:* `$nome`
*• NASCIMENTO:* `$nascimento`
*• IDADE:* `$idade`
*• LOCAL:* `$local`


*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                             
                                                      )
                                                          
                                            )
                                    )));

}else{
    
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ EMAIL NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Seu plano venceu! Para ou renovar o seu plano, chame meu criador: [ @vexedoficial ]. Veja os valores dos planos, logo a baixo.", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'COMPRAR PARA MIM',"callback_data"=>'vipprivado'), //botão 1
                                                      ),
                                                      //linha 2
                                                     array(
                                                         array('text'=>'COMPRAR PARA MEU GRUPO',"callback_data"=>'vipgrupo'), //botão 1
                                                      )
                                                          
                                            )
                                    )));

}  
	
?>