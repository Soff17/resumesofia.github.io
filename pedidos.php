<?php
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data from $_POST superglobal
    $date = $_POST["date"];
    $fees = $_POST["fees"];
    $name = $_POST["name"];
    $total = $_POST["total"];
    $subtotal = $_POST["subtotal"];
    $receipt_id = $_POST["receipt_id"];
    $account_name = $_POST["account_name"];
    $support_email = $_POST["support_email"];

    // Initialize MailerSend with your API key
    $mailersend = new MailerSend(['api_key' => 'mlsn.a01bab1ddc19e7f8af9686193608e26729c39ca74e21ecd8a33d41d3d81e5789']);

    // Create personalization and recipient objects
    $personalization = [
        new Personalization($support_email, [
            'date' => $date,
            'fees' => $fees,
            'name' => $name,
            'total' => $total,
            'subtotal' => $subtotal,
            'receipt_id' => $receipt_id,
            'account_name' => $account_name,
            'support_email' => $support_email
        ])
    ];

    $recipients = [
        new Recipient($support_email, 'Recipient Name'),
    ];

    // Build email parameters
    $emailParams = (new EmailParams())
        ->setFrom('your@domain.com')
        ->setFromName('Your Name')
        ->setRecipients($recipients)
        ->setSubject('Subject')
        ->setTemplateId('3zxk54v7wqq4jy6v')
        ->setPersonalization($personalization);

    // Send the email
    $mailersend->email->send($emailParams);

    // Optional: Redirect to a success page or display a success message
    header("Location: success.html");
    exit;
}
?>
