<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
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
        <form action="calculate.php" method="get">
            <label for="data">Data de Nascimento:</label>
            <input type="date" id="data" name="data_nascimento" required>
            <button type="submit">Calcular</button>
        </form>

        <div>
            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo ($message); ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
