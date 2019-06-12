<?php
function enviaEmailDoPar($destino,$par){

$mensagem = <<<EOT
Eae %nome%, tudo bem? Seu par para o "NAMORO SECRETO" é: %nome1%.<br/>
<br/>
Agora não tem desculpas para passar o dia dos namorados sozinho!!<br/>
<br/>
E-mail enviado por um script de "namoro secreto". Todos créditos para @Mozz4rt (github) e os pombos do saara.<br/>
*Lembre-se que o namoro secreto é uma brincadeira de dia dos namorados! Mas caso queira ir em frente com o par dado desejamos boa sorte ;)<br/>
EOT;

	$msgEnvio = str_replace("%nome%", $destino['nome'], $mensagem);
	$msgEnvio = str_replace("%nome1%", $par['nome'], $msgEnvio);

    // Envio de e-mail
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Usando PHP-MAILER (consultar docs oficiais caso tenha dúvidas)
        // CONFIGURAÇÕES padrões para SMTP, pode usar outra se vc quiser.. O que importa em teoria é o corpo que foi adaptado em $msgEnvio;
        // Caso você não saiba o que é SMTP vale a pena pesquisar um pouco. É rápido e prático utilizar isso com os grandes provedores de e-mail autais.

        $mail->isSMTP();                                // Utilizar protocolo SMTP
        $mail->SMTPAuth = true;                         // Utilizar autenticação SMTP
        $mail->SMTPDebug = 0;                           // Configuração de debug
        $mail->Host = '';                               // Endereço do Host SMTP
        $mail->Username = 'example@example.com';        // Seu usuário SMTP
        $mail->Password = 'password';                   // Sua senha SMTP
        $mail->SMTPSecure = 'tls';                      // Protocolo de segurança do SMTP
        $mail->Port = 000;                              // Porta do SMTP
        $mail->CharSet = 'UTF-8';                       // Charset padrão (recomendável UTF-8)
        $mail->setFrom('your-email.com', 'your name');  // Remetente: e-mail e nome       
        // FIM CONFIGURAÇÕES;

        $mail->Subject = 'Seu par para o NAMORO SECRETO está aqui';
        //Recipients
        if(is_array($destino['email']))
            foreach ($destino['email'] as $email) 
                $mail->addAddress($email, $destino['nome']);           
            
        else 
            $mail->addAddress($destino['email'], $destino['nome']);           

        //Content
        $mail->isHTML(true);
        $mail->Body    = $msgEnvio;
        $msgEnvio = str_replace("<br/>","\n",$msgEnvio);
        $mail->AltBody = $msgEnvio;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function mostraPares($pares){
    $i = 1;
    print("\n");
    foreach($pares as $par){
        print("Par ".$i.": ".$par[0]['nome']." e ".$par[1]['nome']."\n");
        $i++;
    }
    print("\n");
}