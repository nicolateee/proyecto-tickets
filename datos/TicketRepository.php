<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/../negocio/Ticket.php';

class TicketRepository
{
    public function guardar(Ticket $ticket): bool
    {
        $sql = "INSERT INTO ticket (titulo, descripcion, estado)
                VALUES (:titulo, :descripcion, :estado)";
        $stmt = Conexion::obtener()->prepare($sql);
        return $stmt->execute([
            ':titulo'      => $ticket->getTitulo(),
            ':descripcion' => $ticket->getDescripcion(),
            ':estado'      => $ticket->getEstado(),
        ]);
    }
}