import com.mailersend.sdk.MailerSend;
import com.mailersend.sdk.MailerSendResponse;
import com.mailersend.sdk.email.Email;

public class sendEmail {
    public String handleRequest(String recipientName, String recipientEmail, String subject, String emailText) {
        try {
            // Aquí deberías agregar el código que utilizas para enviar correos con MailerSend
            MailerSend ms = new MailerSend();
            ms.setToken("mlsn.8c0262e5612c1749b40a8d4119197e18855c2e442b044eafcc69326569876930");

            Email email = new Email();
            email.subject = subject;
            email.text = emailText;
            email.addRecipient(recipientName, recipientEmail);
            email.setFrom("Sender name", "sender@example.com");

            MailerSendResponse msResponse = ms.emails().send(email);

            return "Correo enviado exitosamente. Código de respuesta: " + msResponse.responseStatusCode;
        } catch (Exception e) {
            return "Error al enviar el correo: " + e.getMessage();
        }
    }
}
