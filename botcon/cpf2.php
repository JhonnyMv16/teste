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

$comando = str_replace(".", "", $comando);
$comando = str_replace("-", "", $comando);
	
if(strlen($comando) == 11){
	
$cpf = $comando;
	
function validaCPF($cpf = null) {

	if(empty($cpf)) {
		return false;
	}

	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	if (strlen($cpf) != 11) {
		return false;
	} else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false; 
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

    if(!validaCPF($cpf)){
               
        apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
        
    } else {
       
sleep(5);
       
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://191.252.153.147/MasterTarget/teste.php?token=HhH2BXDKTSyNwhaZzyCh&cpf=$cpf",
	CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
	CURLOPT_TIMEOUT => 10,
	CURLOPT_CUSTOMREQUEST => "GET"
));

$exe = curl_exec($curl);

curl_close($curl);


$json = json_decode($exe, true);

$qtdTelefone = count($json['result'][0]['pessoa']['contato']['telefone']);
$qtdEmail = count($json['result'][0]['pessoa']['contato']['email']);
$qtdEndereco = count($json['result'][0]['pessoa']['contato']['endereco']);
$qtdVeiculo = count($json['result'][0]['pessoa']['patrimonio']['veiculo']);
$qtdImovel = count($json['result'][0]['pessoa']['patrimonio']['imovel']);
$qtdVizinho  = count($json['result'][0]['pessoa']['vinculo']['vizinho']);
$qtdConjuge = count($json['result'][0]['pessoa']['vinculo']['conjuge']);
$qtdHouseHold = count($json['result'][0]['pessoa']['vinculo']['houseHold']);
$qtdParentesco = count($json['result'][0]['pessoa']['vinculo']['parentesco']);
$qtdParticipacaoSocietaria = count($json['result'][0]['pessoa']['vinculo']['participacaoSocietaria']);
$qtdPossiveisColegasTrabalho = count($json['result'][0]['pessoa']['vinculo']['possiveisColegasTrabalho']);
$qtdEmpregador = count($json['result'][0]['pessoa']['vinculo']['empregador']);

$existeMae = $json['report']['mae'];

$nome = $json['result'][0]['pessoa']['cadastral']['nomePrimeiro'].' '.$json['result'][0]['pessoa']['cadastral']['nomeMeio'].' '.$json['result'][0]['pessoa']['cadastral']['nomeUltimo'];
$nomeMae = $json['result'][0]['pessoa']['cadastral']['maeNomePrimeiro'].' '.$json['result'][0]['pessoa']['cadastral']['maeNomeMeio'].' '.$json['result'][0]['pessoa']['cadastral']['maeNomeUltimo'];
$numeroCns = $json['result'][0]['pessoa']['cadastral']['cns'];
$CPF = $json['result'][0]['pessoa']['cadastral']['CPF'];
$maeCPF = $json['result'][0]['pessoa']['cadastral']['maeCPF'];
$vivo = $json['result'][0]['pessoa']['cadastral']['obito'];
$sexoDescricao = $json['result'][0]['pessoa']['cadastral']['sexo'];
$dataNascimento = $json['result'][0]['pessoa']['cadastral']['dataNascimento'];
$nacionalidade = strtoupper($json['result'][0]['pessoa']['cadastral']['nacionalidade']);
$rg = $json['result'][0]['pessoa']['cadastral']['rgNumero'];
$orgaoEmissorNome    = $json['result'][0]['pessoa']['cadastral']['rgOrgaoEmissor'];
$ufRG = $json['result'][0]['pessoa']['cadastral']['rgUf'];
$estadoCivil = strtoupper($json['result'][0]['pessoa']['cadastral']['estadoCivil']);
$statusReceitaFederal = strtoupper($json['result'][0]['pessoa']['cadastral']['statusReceitaFederal']);
$dataAtualizacaoStatusReceitaFederal = $json['result'][0]['pessoa']['cadastral']['dataAtualizacaoStatusReceitaFederal'];
$tituloEleitoral = $json['result'][0]['pessoa']['cadastral']['tituloEleitoral'];
$escolaridade = strtoupper($json['result'][0]['pessoa']['cadastral']['escolaridade']);
$profissao = strtoupper($json['result'][0]['pessoa']['socioDemografico']['profissao']);
$rendaPresumida = strtoupper($json['result'][0]['pessoa']['socioDemografico']['rendaPresumida']);

    $separa = explode("-", $dataNascimento);
    $dia = $separa[2];
    $mes = $separa[1]; 
    $ano = $separa[0];

    $dataNascimento = "$dia/$mes/$ano";

    $separa2 = explode("-", $dataAtualizacaoStatusReceitaFederal);
    $dia2 = $separa2[2];
    $mes2 = $separa2[1]; 
    $ano2 = $separa2[0];

    $dataAtualizacaoStatusReceitaFederal = "$dia2/$mes2/$ano2";

    if($sexoDescricao == "M") {
        $sexoDescricao = 'MASCULINO';   
    } else if ($sexoDescricao == "F") {
        $sexoDescricao = 'FEMININO';   
    } else {
        $sexoDescricao = 'SEM INFORMAÇÃO';   
    }
    if($vivo == "0") {
        $vivo = 'SIM';   
    } else if ($vivo == "1") {
        $vivo = 'NÃO';   
    } else {
        $vivo = 'SEM INFORMAÇÃO';   
    }
    if(!$racaCorDescricao) {
        $racaCorDescricao = 'SEM INFORMAÇÃO';   
    }
    if($existeMae == 0) {    
        $nomeMae = 'SEM INFORMAÇÃO';   
    }
    if(!$ufNascimento) {
        $ufNascimento = 'SEM INFORMAÇÃO';   
    }
    if(!$estadoCivil) {
        $estadoCivil = 'SEM INFORMAÇÃO';   
    }
    if(!$profissao) {
        $profissao = 'SEM INFORMAÇÃO';   
    }
    if(!$escolaridade) {
        $escolaridade = 'SEM INFORMAÇÃO';   
    }
    if(!$rendaPresumida) {
        $rendaPresumida = 'SEM INFORMAÇÃO';   
    }
    if(!$numeroCns) {
        $numeroCns = 'SEM INFORMAÇÃO';   
    }
    if(!$tituloEleitoral) {
        $tituloEleitoral = 'SEM INFORMAÇÃO';   
    }
    if(!$nacionalidade) {
        $nacionalidade = 'SEM INFORMAÇÃO';   
    }

    if(!$rg) {

        $rg = 'SEM INFORMAÇÃO';
        $orgaoEmissorNome = 'SEM INFORMAÇÃO';
        $dataExpedicaoRG = 'SEM INFORMAÇÃO';
        $ufRG = 'SEM INFORMAÇÃO';

    } else {

        $separaDataExpedicaoRG = explode("-", $dataExpedicaoRG);
        $diaDataExpedicaoRG = $separaDataExpedicaoRG[2];
        $mesDataExpedicaoRG = $separaDataExpedicaoRG[1]; 
        $anoDataExpedicaoRG = $separaDataExpedicaoRG[0];
        $dataExpedicaoRG = "$diaDataExpedicaoRG/$mesDataExpedicaoRG/$anoDataExpedicaoRG";

    }
    if ($qtdEmail > 0) {
        $txtEmail = '';
        for ($i=0; $i < $qtdEmail; $i++) {
            $email = $json['result'][0]['pessoa']['contato']['email'][$i]['email'];
            $txtEmail .= "\n`".$email."`";
        }
    }
    if ($qtdEndereco > 0) {
        $txtEndereco = '';
        for ($i=0; $i < $qtdEndereco; $i++) {
            $endereco = $json['result'][0]['pessoa']['contato']['endereco'][$i]['tipoLogradouro'];
            $endereco .= ' '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['logradouro'];
            $endereco .= ', '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['numero'];
            $endereco .= ' '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['complemento'];
            $endereco .= ' - '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['bairro'];
            $endereco .= ', '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['cidade'];
            $endereco .= '/'.$json['result'][0]['pessoa']['contato']['endereco'][$i]['uf'];
            $endereco .= ' - '.$json['result'][0]['pessoa']['contato']['endereco'][$i]['cep']."\n";
            $txtEndereco .= "\n`".$endereco."`";
        }
    }
    if ($qtdTelefone > 0) {
        $txtTelefone = '';
        for ($i=0; $i < $qtdTelefone; $i++) {
            $telefone = '('.$json['result'][0]['pessoa']['contato']['telefone'][$i]['ddd'].')'.$json['result'][0]['pessoa']['contato']['telefone'][$i]['numero'];
            $txtTelefone .= "\n`".$telefone."`";
        }
    }
    if ($qtdParentesco > 0) {
        $txtParentesco = '';
        for ($i=0; $i < $qtdParentesco; $i++) {
            $parentescoCpf = $json['result'][0]['pessoa']['vinculo']['parentesco'][$i]['cpf']."\n";
            $parentescoNome = $json['result'][0]['pessoa']['vinculo']['parentesco'][$i]['nomeCompleto']."\n";
            $parentescoGrau = $json['result'][0]['pessoa']['vinculo']['parentesco'][$i]['grauDeParentesco']."\n";
            $txtParentesco .= "\n`GRAU: ".$parentescoGrau."NOME: ".$parentescoNome."CPF: ".$parentescoCpf."`";
        }
    }
    if ($qtdVizinho > 0) {
        $txtVizinho = '';
        for ($i=0; $i < $qtdVizinho; $i++) {
            $vizinhoCpf = $json['result'][0]['pessoa']['vinculo']['vizinho'][$i]['cpf']."\n";
            $vizinhoNome = $json['result'][0]['pessoa']['vinculo']['vizinho'][$i]['nomePrimeiro'].' '.$json['result'][0]['pessoa']['vinculo']['vizinho'][$i]['nomeMeio'].' '.$json['result'][0]['pessoa']['vinculo']['vizinho'][$i]['nomeUltimo']."\n";
            $txtVizinho .= "\n`NOME: ".$vizinhoNome."CPF: ".$vizinhoCpf."`";
        }
    }
    if ($qtdParticipacaoSocietaria > 0) {
        $txtParticipacaoSocietaria = '';
        for ($i=0; $i < $qtdParticipacaoSocietaria; $i++) {
            $participacaoSocietariaCnpj = $json['result'][0]['pessoa']['vinculo']['participacaoSocietaria'][$i]['nr_cnpj']."\n";
            $participacaoSocietariaNome = $json['result'][0]['pessoa']['vinculo']['participacaoSocietaria'][$i]['razaoSocial']."\n";
            $participacaoSocietariaParticipacao = $json['result'][0]['pessoa']['vinculo']['participacaoSocietaria'][$i]['participacao']."\n";
            $participacaoSocietariaQualificacao = $json['result'][0]['pessoa']['vinculo']['participacaoSocietaria'][$i]['qualificacao']."\n";
            $txtParticipacaoSocietaria .= "\n`CNPJ: ".$participacaoSocietariaCnpj."RAZÃO SOCIAL: ".$participacaoSocietariaNome."`";
        }
    }
    if ($qtdEmpregador > 0) {
        $txtEmpregador = '';
        for ($i=0; $i < $qtdEmpregador; $i++) {
            $empregadorCnpj = $json['result'][0]['pessoa']['vinculo']['empregador'][$i]['cnpj']."\n";
            $empregadorNome = $json['result'][0]['pessoa']['vinculo']['empregador'][$i]['razaoSocial']."\n";
            $empregadorData = $json['result'][0]['pessoa']['vinculo']['empregador'][$i]['dataAdmissao'];

            $separaEmpregador = explode("-", $empregadorData);
            $dia3 = $separaEmpregador[2];
            $mes3 = $separaEmpregador[1]; 
            $ano3 = $separaEmpregador[0];
            $empregadorData = $dia3.'/'.$mes3.'/'.$ano3;
            $txtEmpregador .= "\n`CNPJ: ".$empregadorCnpj."RAZÃO SOCIAL: ".$empregadorNome."DATA DE ADMISSÃO: ".$empregadorData."`";
        }
    }
    if ($qtdVeiculo > 0) {
        $txtVeiculo = '';
        for ($i=0; $i < $qtdVeiculo; $i++) {
            $veiculoMarca = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['marca']."\n";
            $veiculoModelo = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['modelo']."\n";
            $veiculoAno = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['ano']."\n";
            $veiculoCategoria = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['categoria']."\n";
            $veiculoSubCategoria = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['subCategoria']."\n";
            $veiculoClassificacao = $json['result'][0]['pessoa']['patrimonio']['veiculo'][$i]['classificacao']."\n";
            $txtVeiculo .= "\n`MARCA: ".$veiculoModelo."ANO: ".$veiculoAno."MARCA: ".$veiculoMarca."CATEGORIA: ".$veiculoCategoria."CLASSIFICAÇÃO: ".$veiculoClassificacao.'`';
        }
    }

    if(!$txtEmail) {
        $txtEmail = 'SEM INFORMAÇÃO';   
    }
    if(!$txtEndereco) {
        $txtEndereco = 'SEM INFORMAÇÃO';   
    }
    if(!$txtTelefone) {
        $txtTelefone = 'SEM INFORMAÇÃO';   
    }
    if(!$txtParentesco) {
        $txtParentesco = 'SEM INFORMAÇÃO';   
    }
    if(!$txtVizinho) {
        $txtVizinho = 'SEM INFORMAÇÃO';   
    }
    if(!$txtParticipacaoSocietaria) {
        $txtParticipacaoSocietaria = 'SEM INFORMAÇÃO';   
    }
    if(!$txtEmpregador) {
        $txtEmpregador = 'SEM INFORMAÇÃO';   
    }
    if(!$txtVeiculo) {
        $txtVeiculo = 'SEM INFORMAÇÃO';          
    }
    
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$nascido = mktime( 0, 0, 0, $mes, $dia, $ano);
$idade = floor((((($hoje - $nascido) / 60) / 60) / 24) / 365.25);

function signo($dia, $mes) {
    if ($mes == "03"  && $dia >= "20") { 
$signo = "Áries";       
    } elseif ($mes == "04" && $dia <= "20") { 
$signo = "Áries";       
    } elseif ($mes == "04" && $dia >= "21") { 
$signo = "Touro";      
    } elseif ($mes == "05" && $dia <= "20") { 
$signo = "Touro";      
    } elseif ($mes == "05" && $dia >= "21") { 
$signo = "Gêmeos";     
    } elseif ($mes == "06" && $dia <= "20") { 
$signo = "Gêmeos";      
    } elseif ($mes == "06" && $dia >= "21") { 
$signo = "Câncer";     
    } elseif ($mes == "07" && $dia <= "21") { 
$signo = "Câncer";     
    } elseif ($mes == "07" && $dia >= "22") { 
$signo = "Leão";        
    } elseif ($mes == "08" && $dia <= "22") {
 $signo = "Leão";        
    } elseif ($mes == "08" && $dia >= "23") { 
$signo = "Virgem";      
    } elseif ($mes == "09" && $dia <= "22") { 
$signo = "Virgem";      
    } elseif ($mes == "09" && $dia >= "23") { 
$signo = "Libra";       
    } elseif ($mes == "10" && $dia <= "22") { 
$signo = "Libra";       
    } elseif ($mes == "10" && $dia >= "23") { 
$signo = "Escorpião";   
    } elseif ($mes == "11" && $dia <= "21") { 
$signo = "Escorpião";   
    } elseif ($mes == "11" && $dia >= "22") { 
$signo = "Sagitário";  
    } elseif ($mes == "12" && $dia <= "21") { 
$signo = "Sagitário";   
    } elseif ($mes == "12" && $dia >= "22") { 
$signo = "Capricórnio"; 
    } elseif ($mes == "01" && $dia <= "21") { 
$signo = "Capricórnio"; 
    } elseif ($mes == "01" && $dia >= "21") { 
$signo = "Aquário";     
    } elseif ($mes == "02" && $dia <= "18") { 
$signo = "Aquário";     
    } elseif ($mes == "02" && $dia >= "19") { 
$signo = "Peixes";      
    } elseif ($mes == "03" && $dia <= "19") { 
$signo = "Peixes";      
    } else { $signo = "Não Reconhecido"; }
return $signo;
}

$signo = strtoupper(signo($dia, $mes));


If($dataNascimento != '//'){
        
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "🔍 *CONSULTA  DE  CPF 🔍*
	
*• CPF:* `$cpf`
 
*• CNS:* `$numeroCns`
  
*• TITULO ELEITORAL:* `$tituloEleitoral`
 
*• RG:* `$rg` 
*• ORGÃO EXPEDIDOR:* `$orgaoEmissorNome`
 
*• NOME:* `$nome`
*• NASCIMENTO:* `$dataNascimento`
*• VIVO:* `$vivo`
*• IDADE:* `$idade`
*• SIGNO:* `$signo`

*• SEXO:* `$sexoDescricao`
*• COR:* `$racaCorDescricao`

*• MÃE:* `$nomeMae`

*• NACIONALIDADE:* `$nacionalidade`
*• ESCOLARIDADE:* `$escolaridade`

*• ESTADO CIVIL:* `$estadoCivil`

*• PROFISSÃO:* `$profissao`
*• RENDA PRESUMIDA:* `$rendaPresumida`

*• STATUS RECEITA FEDERAL:* `$statusReceitaFederal`
*• DATA DE ATUALIZAÇÃO NA RECEITA:* `$dataAtualizacaoStatusReceitaFederal`
 
*• E-MAILS:* 
$txtEmail
 
*• TELEFONES:* 
$txtTelefone
 
*• ENDEREÇOS:* 
$txtEndereco
 
*• PARENTES:* 
$txtParentesco
 
*• VIZINHOS:* 
$txtVizinho
 
*• VEICULOS:* 
$txtVeiculo
 
*• PARTICIPAÇÃO SOCIETARIA:* 
$txtParticipacaoSocietaria
 
*• VINCULOS EMPREGATICIOS:* 
$txtEmpregador
	
	
*BY:* @VexedTutoriaisbot", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                                                                          
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
	
}else{
    
apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF NÃO ENCONTRADO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));

}}}else{
    
    apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "Markdown", "text" => "*⚠️ CPF INVÁLIDO!*", "reply_to_message_id" => $message_id,
'reply_markup' => array('inline_keyboard' => array(                                                                                                                                                    
                                                      //linha 1
                                                     array(
                                                         array('text'=>'🗑  Apagar  🗑',"callback_data"=>serialize(['id'=>$user_id, 'data'=>'apagar']))//botão com callback                                                   
                                                      )
                                                          
                                            )
                                    )));
              
}} else {
	
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