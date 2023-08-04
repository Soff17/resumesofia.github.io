import com.mailersend.sdk.Email;
import com.mailersend.sdk.MailerSend;
import com.mailersend.sdk.MailerSendResponse;
import com.mailersend.sdk.exceptions.MailerSendException;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/sendEmail")
public class SendEmailServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    public SendEmailServlet() {
        super();
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Obtener los valores del formulario
        String recipientName = request.getParameter("recipient_name");
        String recipientEmail = request.getParameter("recipient_email");
        String subject = request.getParameter("subject");
        String emailText = request.getParameter("email_text");

        // Aquí deberías llamar a tu función sendEmail() con los datos obtenidos
        sendEmail(recipientName, recipientEmail, subject, emailText);

        // Puedes redireccionar a una página de éxito o mostrar un mensaje en el mismo formulario
        response.sendRedirect("success.html");
    }

    private void sendEmail(String recipientName, String recipientEmail, String subject, String emailText) {
        Email email = new Email();

    email.setFrom("name", "chofasbff@gmail.com");
    email.addRecipient("name", "your@recipient.com");

    // you can also add multiple recipients by calling addRecipient again
    email.addRecipient("name 2", "your@recipient2.com");

    // there's also a recipient object you can use
    Recipient recipient = new Recipient("name", "your@recipient3.com");
    email.addRecipient(recipient);
    
    email.setSubject("Email subject");

    email.setPlain("This is the text content");
    email.setHtml("<p>This is the HTML content</p>");

    MailerSend ms = new MailerSend();

    ms.setToken("mlsn.8c0262e5612c1749b40a8d4119197e18855c2e442b044eafcc69326569876930");

    try {
    
        MailerSendResponse response = ms.send(email);
        System.out.println(response.messageId);
    } catch (MailerSendException e) {

        e.printStackTrace();
    }
    }
}

