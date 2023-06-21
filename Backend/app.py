from flask import Flask,request,redirect, session
from flask_session import Session
from flask import Flask, render_template, request,jsonify
from flask_mysqldb import MySQL
import mysql.connector as ms
import json
from flask_mail import Mail, Message
from flask_cors import CORS

app = Flask(__name__)
app.config['MAIL_SERVER'] = 'smtp.gmail.com'
app.config['MAIL_PORT'] = 465
app.config['MAIL_USERNAME'] = 'jeanphilippesara225@gmail.com'
app.config['MAIL_PASSWORD'] = 'odltnhiljkgbcxtx'
app.config['MAIL_USE_TLS'] = False
app.config['MAIL_USE_SSL'] = True
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
Session(app)
mail = Mail(app)
database = ms.connect(host='localhost', user='root', passwd='root',port="8889", database='LadThomasDB')

def send_newsletter(name,email,message):
    try:
        sender = app.config['MAIL_USERNAME']
        recipients =[email]
        send_request = Message(f'{name}', sender = f'{sender}', recipients = recipients)
        send_request.body = f'{message}\n\n\n\nCeci est un test de messagerie , destiner à {email}'
        mail.send(send_request)
        print("Message envoyé aux abonnés de la newsletter")
        session["mail_send"] = True
    except:
        session["error"] = True
        print("An exception occurred")

@app.route('/')
def form():
    session["mail_send"] = False
    session["error"] = False
    try:
        cursor=database.cursor(buffered=True)
        query="SELECT * FROM Subscribe_Nl"
        cursor.execute(query)
        database.commit()
        fname = cursor.fetchall()
    except:
        session["error"] = True
        return
    return render_template('form.html',data=fname,count=len(fname))


@app.route('/login', methods=['POST', 'GET'])
def login():
    if request.method == 'GET':
        return "Login via the login Form"
    if request.method == 'POST':
        try:
            print(json.dumps(request.form))
            name = request.form['object']
            message = request.form['Message']
            cursor=database.cursor(buffered=True)
            query="SELECT * FROM Subscribe_Nl"
            cursor.execute(query)
            database.commit()
            fname = cursor.fetchall()
            for text in fname:
                send_newsletter(name,text[1],message)
            session["error"] = False
        except:
             session["error"] = True
        return render_template('form.html',data=fname)


app.run(host='0.0.0.0', port=5002,debug=True)