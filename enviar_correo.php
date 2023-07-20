<?php
require 'vendor/autoload.php'; // Asegúrate de incluir la librería MailerSend

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $recipientEmail = $_POST["recipientEmail"];
  $recipientName = $_POST["recipientName"];
  $orderTotal = $_POST["orderTotal"];
  $orderSubtotal = $_POST["orderSubtotal"];
  $orderNumber = $_POST["orderNumber"];
  $shippingDay = $_POST["shippingDay"];
  $deliveryMethod = $_POST["deliveryMethod"];
  $trackingNumber = $_POST["trackingNumber"];
  $deliveryMethodFee = $_POST["deliveryMethodFee"];
  $productSize = $_POST["productSize"];
  $productColor = $_POST["productColor"];
  $productPrice = $_POST["productPrice"];
  $productImage = $_POST["productImage"];
  $customerName = $_POST["customerName"];
  $customerPhone = $_POST["customerPhone"];
  $customerAddress1 = $_POST["customerAddress1"];
  $customerAddress2 = $_POST["customerAddress2"];
  $accountName = $_POST["accountName"];

  // Configura MailerSend con tu clave de API
  $mailerSend = new MailerSend(['api_key' => 'mlsn.b0eacfc1545781cabc9f2d0eb5212a4b09e059907558214aa2ddbbf2c8e83485']);

  // Configura la personalización del correo
  $personalization = [
    new Personalization($recipientEmail, [
      'name' => $recipientName,
      'order' => [
        'total' => $orderTotal,
        'subtotal' => $orderSubtotal,
        'order_number' => $orderNumber,
        'shipping_day' => $shippingDay,
        'delivery_method' => $deliveryMethod,
        'tracking_number' => $trackingNumber,
        'delivery_method_fee' => $deliveryMethodFee
      ],
      'product' => [
        [
          'size' => $productSize,
          'color' => $productColor,
          'price' => $productPrice,
          'imagen1' => base64_encode(file_get_contents($productImage))
        ]
      ],
      'customer' => [
        'name' => $customerName,
        'phone' => $customerPhone,
        'address_1st_line' => $customerAddress1,
        'address_2nd_line' => $customerAddress2
      ],
      'account_name' => $accountName
    ])
  ];

  // Configura los destinatarios del correo
  $recipients = [
    new Recipient($recipientEmail, $recipientName)
  ];

  // Configura los parámetros del correo
  $emailParams = (new EmailParams())
    ->setFrom('chofasbff@gmail.com')
    ->setFromName('Your Name')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setTemplateId('0r83ql3erp04zw1j')
    ->setPersonalization($personalization);

  // Envía el correo con MailerSend
  $response = $mailerSend->email->send($emailParams);

  // Devuelve la respuesta del servidor
  echo json_encode($response);
}
?>
