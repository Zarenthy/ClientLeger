<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Affiche la page de réinitialisation du mot de passe
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Traite une demande de nouveau mot de passe
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //  Tente de réinitialiser le mot de passe de l'utilisateur. 
        //  En cas de succès, mise à jour du mot de passe sur un modèle d'utilisateur réel
        //  et à jour le mot de passe sur un modèle d'utilisateur réel avec enregistrement dans la base de données
        //  Sinon, analyse de l'erreur et renvoi de la réponse.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Si le mot de passe a été réinitialisé avec succès, l'utilisateur est redirigé vers la vue
        // authentifiée de la page d'accueil de l'application. 
        // En cas d'erreur, l'utilisateur est redirigé vers la page d'où il vient avec un message d'erreur.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
