<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_nascimento = $_POST['data_nascimento'];
    $data_atual = date('d-m-Y');


    $date1 = new DateTime($data_nascimento);
    $date2 = new DateTime($data_atual);
    
    $interval = $date1->diff($date2);  

    $dias = $interval->d + 1; // Adiciona 1 para incluir o dia inicial 

    $_SESSION['message'] = "<h1>Resultado:</h1>";
    $_SESSION['message'] = "<p>Idade: {$interval->y} anos, {$interval->m} meses e {$dias} dias.</p>";
    header('Location: index-post.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Idade</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cálculo de Idade</h1>
        <form action="index-post.php" method="post">
            <label for="data">Data de Nascimento:</label>
            <input type="date" id="data" name="data_nascimento" required>
            <button type="submit">Calcular</button>

            <div>
                <?php if ($message): ?>
                    <div class="alert alert-info"><?php echo ($message); ?></div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>