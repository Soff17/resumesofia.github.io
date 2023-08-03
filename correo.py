from mailersend import emails
mailer = emails.NewEmail(os.getenv('mlsn.8c0262e5612c1749b40a8d4119197e18855c2e442b044eafcc69326569876930'))

# define an empty dict to populate with mail values
mail_body = {}

mail_from = {
    "name": "Your Name",
    "email": "your@domain.com",
}

recipients = [
    {
        "name": "Recipient",
        "email": "recipient@email.com",
    }
]

personalization = [
    {
        "email": "recipient@email.com",
        "data": {
            "date": "",
            "fees": "",
            "name": "",
            "total": "",
            "subtotal": "",
            "receipt_id": "",
            "account_name": "",
            "support_email": ""
        }
    }
]

mailer.set_mail_from(mail_from, mail_body)
mailer.set_mail_to(recipients, mail_body)
mailer.set_subject("Hello from {$company}", mail_body)
mailer.set_template("3zxk54v7wqq4jy6v", mail_body)
mailer.set_advanced_personalization(personalization, mail_body)

mailer.send(mail_body)