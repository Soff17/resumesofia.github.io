<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar los datos del formulario
    $recipient = $_POST["recipient"];
    $date = $_POST["date"];
    $fees = $_POST["fees"];
    $name = $_POST["name"];
    $total = $_POST["total"];
    $subtotal = $_POST["subtotal"];
    $receipt_id = $_POST["receipt_id"];
    $account_name = $_POST["account_name"];
    $support_email = $_POST["support_email"];

    // Ejecutar el código Python usando el comando shell_exec
    $command = "python3 correo.py";
    $output = shell_exec($command);

    // Imprimir la salida del código Python (para verificar si todo está funcionando correctamente)
    echo "<pre>$output</pre>";
}
?>
