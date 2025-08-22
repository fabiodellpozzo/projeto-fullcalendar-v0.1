<?php

// Incluir o arquivo com a conexão com banco de dados
include_once 'conexao.php';


// Boa prática nomear os campos do SELECT que precisa ser invocado do banco evitando o uso do *

// QUERY para recuperar os eventos
$query_events = "SELECT id, title, color, start, end FROM events";

//Prepara a query 
//$conn (Pega a variável da sessão) prepare(preparar a query) $query_events(variável setada acima onde invoca a requisição de seleção ao banco de dados) $result_events(variável para executar a listagem)

// Prepara a QUERY
$result_events=$conn->prepare($query_events);

//  execute (setada com a variável que executa a lista já setada com a query aciona a ação da listagem para a leitura do banco)

// Executa a QUERY
$result_events->execute();

//while(fazer a leitura utilizando o laço de repetição) cria a variável $row_events recebe o que vem da variável $resulta_events recebe todos os eventos do banco e row_events recebe apenas de um unico evento de um unico registro  fetch (para conseguir ler em seguida faz a ligação com a requisição do banco de dados pelo método PDO) PDO::FETCH_ASSOC caso queira executar um  extrate caso queira imprimir com nome da coluna

//Criar o array que recebe os eventos
//variável que recebe o array vazio
$eventos = [];

//Percorrer a lista de registros retornado do banco de dados
while($row_events = $result_events->fetch(PDO::FETCH_ASSOC)){
    //Extrair o array
    extract($row_events);
    // como esta utilizando o extract pode utiliza o nome da coluna para recuparar o valor

    //pegar a variável $eventos que recebe o array vazio e recebe array no qual tera os valores recebendo pelo extract as colunas como $id 'title' => $title, 'color' => $color, por exemplo para definir como variável.
    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end,
    ];
}
//retornando como objeto os dados da variável eventos que está recebendo os dados do array
echo json_encode($eventos);
?>