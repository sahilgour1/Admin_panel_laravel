<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendWelcomeMail;

class MailController extends Controller
{
    public function sendMail()
    {
        try {
            $toMailAddress = "sahilgour5675@gmail.com";
            $welcomeMessage = "Welcome and thanks for registering"; // Changed variable name

            \Log::info('Preparing to send mail', ['welcomeMessage' => $welcomeMessage]);

            // Send the email
            Mail::to($toMailAddress)->send(new SendWelcomeMail($welcomeMessage));

            return response()->json(['success' => 'Mail sent successfully!']);
        } catch (\Exception $e) {
            \Log::error("Mail not sent: " . $e->getMessage());
            return response()->json(['error' => 'Failed to send mail: ' . $e->getMessage()]);
        }
    }
}
