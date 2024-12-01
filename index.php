<?php
session_start();

// Inicializamos el mazo si no existe
if (!isset($_SESSION['deck'])) {
    $_SESSION['deck'] = range(1, 10); // Mazo de cartas (números del 1 al 10)
    shuffle($_SESSION['deck']);
    $_SESSION['score1'] = 0; // Puntaje jugador 1
    $_SESSION['score2'] = 0; // Puntaje jugador 2
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas con PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="game">
        <h1>Juego de Cartas</h1>
        <div id="players">
            <div class="player">
                <h2>Jugador 1</h2>
                <div class="card"><?php echo $_SESSION['card1'] ?? 'Sin carta'; ?></div>
                <p>Puntaje: <?php echo $_SESSION['score1']; ?></p>
            </div>
            <div class="player">
                <h2>Jugador 2</h2>
                <div class="card"><?php echo $_SESSION['card2'] ?? 'Sin carta'; ?></div>
                <p>Puntaje: <?php echo $_SESSION['score2']; ?></p>
            </div>
        </div>
        <div id="controls">
            <form action="logica.php" method="POST">
                <button type="submit" name="action" value="draw">Sacar carta</button>
                <button type="submit" name="action" value="reset">Reiniciar juego</button>
            </form>
            <p id="winnerMessage">
                <?php echo $_SESSION['message'] ?? '¡Empieza el juego!'; ?>
            </p>
        </div>
    </div>
</body>
</html>
