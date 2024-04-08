<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    if ($request->has('email')) {
        $token = Str::random(64);
        $userEmail = $request->input('email'); // Capturer directement l'email dans une variable

        DB::table('password_reset_tokens')->insert([
            'email' => $userEmail,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Utiliser $userEmail directement à l'intérieur de la closure
        Mail::send('email.forgetPassword', ['data' => ['token' => $token]], function ($message) use ($userEmail) {
            
            $message->to($userEmail);
            $message->subject('Reset Password');
            
        });

        return back()->with('message', 'Nous vous avons envoyé un lien de réinitialisation de mot de passe par e-mail.');
    } else {
        return back()->with('error', 'L\'adresse e-mail n\'a pas été fournie.');
    }
}

    

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Token invalide. Veuillez réessayer.');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Votre mot de passe a été réinitialisé avec succès. Connectez-vous maintenant.');
    }
}
