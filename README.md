# Namoro Secreto
### O que é?
A ideia surgiu em uma bela manhã numa véspera de dia dos namorados. Por que sofrer passando essa data só quando podemos desenvolver uma ferramenta que faça casais e nos livre dessa dor?

O programa funciona como um "amigo secreto" ou "amigo oculto". Secretamente seleciona pares diante da lista configurada e os envia por e-mail.

## Features
- Envio de e-mail
- Print no console.

## Como rodar?
Para iniciar o script e formar seus pares é bem simples. Mas primeiro você precisa ter o Composer instalado e uma versão recente do PHP (acho que roda no 5, no 7 é ctza).
1. Instalar dependências do Composer
2. Inserir o nome e email(s) de cada participante na variável `$nomes`
3. Definir sua saída, atualmente o programa tem 2 modos de operação (vc reescreve na mão):
3.1 **E-mail:** Função `enviaEmailDoPar($destino,$par);`, você configura o PHP-MAILER para funcionar de acordo com suas necessidades. O padrão é SMTP que eu particularmente acho mais prático mas se tiver algo melhor na cartola, sinta-se livre
3.2 **Listagem de pares**: Função `mostraPares($pares);`, modo mais simples de mostrar os pares. Você abre mão do segredo dos casais mas tem algo mais rápido e menos custoso.
4. Rodar com `php script.php`, pela linha de comando mesmo. Não testei com navegadores/apache/servidores.

## Considerações finais
- Você pode colocar números ímpares, só acaba que um vai ficar de fora.
