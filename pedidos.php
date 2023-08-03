<?php
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mailersend = new MailerSend(['api_key' => 'mlsn.8c0262e5612c1749b40a8d4119197e18855c2e442b044eafcc69326569876930']);

$recipients = [
    new Recipient('recipient@example.com', 'Recipient Name'),
];

$email = (new EmailParams())
    ->setFrom('sender@example.com')
    ->setFromName('Sender Name')
    ->setRecipients($recipients)
    ->setSubject('Test Email')
    ->setHtml('<p>Hello world!</p>')
    ->setText('Hello world!');

$mailerSend->email->send($email);
?>
