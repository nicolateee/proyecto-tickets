# Alta de Ticket - Arquitectura en tres capas

Aplicación web en PHP que permite registrar un Ticket (título y descripción) en una base de datos MySQL, separando presentación, negocio y persistencia.

## Capas

- **Presentación:** `public/tickets/crear.php`. Muestra el formulario, recibe
  los datos, inicia la creación del ticket y muestra el mensaje de resultado.

- **Negocio:** `negocio/Ticket.php`. Representa el ticket y sus reglas.

- **Persistencia:** `datos/Conexion.php` y `datos/TicketRepository.php`.
  Acceden a la base de datos.

## Por qué el INSERT está en TicketRepository

Porque el acceso a la base es responsabilidad exclusiva de la capa de persistencia. Si mañana cambia la base o la consulta, se toca un solo lugar, y el formulario y la clase Ticket ni se enteran.


## Por qué "pendiente" es una regla de negocio

es una decisión del sistema sobre cómo nace un ticket, no algo que el usuario elige. Si estuviera en el formulario, cualquiera podría manipular el request y crear un ticket "resuelto". Al estar en el constructor de Ticket, la regla se cumple siempre, sin importar desde dónde se cree el ticket

## Cómo ejecutarlo

1. Copiar `config/config.example.php` como `config/config.php` y completar los datos.
2. Importar `base_de_datos.sql` en phpMyAdmin.
3. Colocar el proyecto en `htdocs` de XAMPP y abrir
   `http://localhost/proyecto-tickets/public/tickets/crear.php`.
