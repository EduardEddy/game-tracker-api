<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\RegisterUserMail;
use Resend\Laravel\Facades\Resend;
use Illuminate\Support\Facades\Mail;

class RegisterUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        Resend::emails()->send([
            'from' => 'Play Time Monitor <hello@playtimemonitor.com>',
            'to' => "doble_e87@hotmail.com",
            //'to' => [$notifiable->email],
            'subject' => 'hello',
            'html' => $this->email(),
        ]);
        //Mail::to('eduardeddyacevedo@gmail.com')->send(new RegisterUserMail($notifiable));
        //return (new RegisterUserMail($notifiable))->to($notifiable);
        /*return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    private function email() {
        return "
        <!DOCTYPE html>
        <html lang='es'>
        
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Bienvenido a [Nombre de la Aplicación]</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    padding: 20px;
                }
        
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
        
                h1 {
                    color: #007bff;
                }
        
                p {
                    line-height: 1.6;
                }
        
                .cta-button {
                    display: inline-block;
                    padding: 10px 20px;
                    margin-top: 20px;
                    font-size: 16px;
                    color: #fff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 3px;
                }
            </style>
        </head>
        
        <body>
            <div class='container'>
                <h1>Bienvenido a [Nombre de la Aplicación]</h1>
                <p>Querido [Nombre del Usuario],</p>
                <p>¡Bienvenido a [Nombre de la Aplicación]! Estamos emocionados de tenerte como parte de nuestra comunidad.</p>
                <p>En [Nombre de la Aplicación], nos esforzamos por brindarte la mejor experiencia posible. Con nuestra aplicación, podrás <strong>[breve descripción de la funcionalidad principal]</strong>.</p>
                <p>Aquí tienes algunos pasos rápidos para comenzar:</p>
                <ol>
                    <li>Descarga nuestra aplicación desde <a href='[Enlace a la tienda de aplicaciones]'>aquí</a>.</li>
                    <li>Inicia sesión con tu cuenta [nombre de usuario o dirección de correo electrónico].</li>
                    <li>Explora las increíbles características, como <strong>[característica principal]</strong> y <strong>[otras características]</strong>.</li>
                </ol>
                <p>No dudes en ponerte en contacto con nosotros si tienes alguna pregunta o sugerencia. Estamos aquí para ayudarte.</p>
                <p>¡Gracias por formar parte de [Nombre de la Aplicación]!</p>
                <p>Saludos cordiales,</p>
                <p>[Nombre del Equipo de Soporte]<br>[Nombre de la Aplicación]<br>[Información de contacto]</p>
                <a class='cta-button' href='[Enlace a tu sitio web o página principal]'>Visita nuestro sitio web</a>
            </div>
        </body>
        
        </html>
        
        ";
    }
}
