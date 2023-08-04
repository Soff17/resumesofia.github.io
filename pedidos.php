<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $date = $_POST["date"];
    $fees = $_POST["fees"];
    $name = $_POST["name"];
    $total = $_POST["total"];
    $subtotal = $_POST["subtotal"];
    $receipt_id = $_POST["receipt_id"];
    $account_name = $_POST["account_name"];
    $support_email = $_POST["support_email"];

    // Procesar los datos (por ejemplo, guardarlos en una base de datos)
    // Aquí se asume que hay una conexión a la base de datos previamente establecida
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_basededatos";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "INSERT INTO pedidos (date, fees, name, total, subtotal, receipt_id, account_name, support_email) VALUES ('$date', '$fees', '$name', '$total', '$subtotal', '$receipt_id', '$account_name', '$support_email')";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido registrado exitosamente.";
    } else {
        echo "Error al registrar el pedido: " . $conn->error;
    }

    $conn->close();
}
?>

