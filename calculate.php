<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

if (isset($_GET['data_nascimento'])) {
    $data_nascimento = $_GET['data_nascimento'];
    $data_atual = date('Y-m-d');

    $date1 = new DateTime($data_nascimento);
    $date2 = new DateTime($data_atual);

    // Calcula a diferença
    $interval = $date1->diff($date2);

    $dias = $interval->d + 1; // Adiciona 1 para incluir o dia inicial

    // Inclui o dia inicial
    $diasIncluindoInicial = $interval->days + 1; // Adiciona 1 para incluir o dia inicial

    // Sem incluir o dia inicial
    $diasExcluindoInicial = $interval->days; // Apenas a diferença exata

    // Cria a mensagem de resultado
    $_SESSION['message'] = "<h1>Resultado:</h1>";
    $_SESSION['message'] .= "<p>Idade: {$interval->y} anos, {$interval->m} meses e {$dias} dias.</p>";
    //$_SESSION['message'] .= "<p>Idade: {$interval->y} anos, {$interval->m} meses e {$diasIncluindoInicial} dias (incluindo o dia inicial).</p>";
    //$_SESSION['message'] .= "<p>Idade: {$interval->y} anos, {$interval->m} meses e {$diasExcluindoInicial} dias (excluindo o dia inicial).</p>";
}

// Redireciona de volta para o index.php
header('Location: index.php');
exit();
?>
