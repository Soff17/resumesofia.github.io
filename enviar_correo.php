<?php
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mailersend = new MailerSend(['api_key' => 'mlsn.95553431f32c9186dbf2bc383b7ed2fa84d460a5582cdaffbb8767b043877451']);

$recipients = [
    new Recipient('your@client.com', 'Your Client'),
];

$variables = [
    new Variable('your@client.com', ['var' => 'value'])
];

$tags = ['tag'];

$emailParams = (new EmailParams())
    ->setFrom('chofasbff@gmail.com')
    ->setFromName('Your Name')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setTemplateId('0r83ql3erp04zw1j')
    ->setVariables($variables)
    ->setTags($tags);

$mailersend->email->send($emailParams);
?>
