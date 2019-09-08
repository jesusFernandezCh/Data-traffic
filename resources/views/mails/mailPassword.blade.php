<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Cambio de Password</title>
</head>
<body>
    <p>Hola! Informamos que su password a sido cambiado.</p>
    <p>Estos son los datos:</p>
    <ul>
        <li>Usuario: {{ $distributor->login }}</li>
        <li>Password: {{ $distributor->password }}</li>
    </ul>
    <p>Gracias por su atención</p>
</body>
</html>