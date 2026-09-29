<?php

require_once __DIR__ . '/../../negocio/Ticket.php';
require_once __DIR__ . '/../../datos/TicketRepository.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($titulo === '' || $descripcion === '') {
        $mensaje = 'Completá todos los campos.';
    } else {
        try {
            $ticket = new Ticket($titulo, $descripcion);
            (new TicketRepository())->guardar($ticket);
            $mensaje = 'Ticket creado correctamente.';
        } catch (Exception $e) {
            $mensaje = 'No se pudo crear el ticket.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Ticket</title>
</head>
<body>
    <h1>Nuevo Ticket</h1>
    <?php if ($mensaje): ?>
        <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Título <input type="text" name="titulo" required></label><br><br>
        <label>Descripción <textarea name="descripcion" required></textarea></label><br><br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>