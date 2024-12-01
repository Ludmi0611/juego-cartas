<?php
session_start();

// Verificar la acción solicitada
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'draw') {
        // Verificar que quedan cartas en el mazo
        if (count($_SESSION['deck']) < 2) {
            $_SESSION['message'] = '¡El mazo está vacío! Reinicia el juego.';
            header('Location: index.php');
            exit;
        }

        // Sacar cartas para cada jugador
        $_SESSION['card1'] = array_pop($_SESSION['deck']);
        $_SESSION['card2'] = array_pop($_SESSION['deck']);

        // Determinar el ganador de la ronda
        if ($_SESSION['card1'] > $_SESSION['card2']) {
            $_SESSION['score1']++;
            $_SESSION['message'] = 'Jugador 1 gana esta ronda.';
        } elseif ($_SESSION['card2'] > $_SESSION['card1']) {
            $_SESSION['score2']++;
            $_SESSION['message'] = 'Jugador 2 gana esta ronda.';
        } else {
            $_SESSION['message'] = 'Empate en esta ronda.';
        }
    } elseif ($action === 'reset') {
        // Reiniciar el juego
        session_destroy();
        header('Location: index.php');
        exit;
    }
}

header('Location: index.php');
