<?php
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mailersend = new MailerSend(['api_key' => 'key']);

$personalization = [
    new Personalization('recipient@email.com', [
            'date' => '',
            'fees' => '',
            'name' => '',
            'total' => '',
            'subtotal' => '',
            'receipt_id' => '',
            'account_name' => '',
            'support_email' => ''
    ])
];

$recipients = [
    new Recipient('recipient@email.com', 'Recipient'),
];

$emailParams = (new EmailParams())
    ->setFrom('your@domain.com')
    ->setFromName('Your Name')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setTemplateId('3zxk54v7wqq4jy6v')
    ->setPersonalization($personalization);

$mailersend->email->send($emailParams);
?>
