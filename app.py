from flask import Flask, request, render_template
from mailersend import emails
import os

app = Flask(__name__)

# Ruta para mostrar el formulario HTML
@app.route('/')
def show_form():
    return render_template('form.html')

# Ruta para manejar el envío del formulario
@app.route('/send_email', methods=['POST'])
def send_email():
    # Obtiene los datos del formulario
    date = request.form['date']
    fees = request.form['fees']
    name = request.form['name']
    total = request.form['total']
    subtotal = request.form['subtotal']
    receipt_id = request.form['receipt_id']
    account_name = request.form['account_name']
    support_email = request.form['support_email']

    # Código para enviar el correo usando mailersend
    mailer = emails.NewEmail(os.getenv('mlsn.8c0262e5612c1749b40a8d4119197e18855c2e442b044eafcc69326569876930'))
    # Aquí sigue el resto de tu código para enviar el correo, usando los datos capturados del formulario

    return "Correo enviado exitosamente"  # Puedes redireccionar a una página de confirmación si lo deseas

if __name__ == '__main__':
    app.run(debug=True)
