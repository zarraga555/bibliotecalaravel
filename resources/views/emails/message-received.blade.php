<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mensaje Enviado</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $msg['nombre'] }} </p>
    <p>Correo: {{ $msg['email'] }}</p>
    <p>Asunto: {{ $msg['asunto'] }}</p>
    <p>Mensaje: {{ $msg['mensaje'] }}</p>
</body>
</html>
