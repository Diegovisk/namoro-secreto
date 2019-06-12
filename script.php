<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/aux_functions.php';

/*
Script simples para sorteio de namoro secreto
Adicione os participantes no Array $nomes, rode o script e voalá :)

Créditos: https://github.com/podoom/amigo-secreto # serviu como base pra que eu não passasse horas fazendo essa parada
*/
$nomes = array(
    // Nome + e-mail
    array(
		'nome' => 'Fulano',
		'email' => 'example@example.com'
    ),
    // Nome + e-mails
	array(
		'nome' => 'Cicrano',
		'email' => array(
            'example1@example.com',
            'example2@example.com',
        ),
	),
);
$participantes = $nomes;


$envio = 0;
$pares = array();
while(sizeof($participantes) >= 2){
    $par = array();

    for($i = 0; $i < 2; $i++){
        $index = array_rand($participantes);
        array_push($par,$participantes[$index]);
        array_splice($participantes,$index,1);
    }

    array_push($pares,$par);

}
echo "Carregando o amor...\n";
foreach($pares as $par){
    // enviaEmailDoPar($par[0],$par[1]);
    // enviaEmailDoPar($par[1],$par[0]);
}
mostraPares($pares);
echo "Tudo feito!\n";