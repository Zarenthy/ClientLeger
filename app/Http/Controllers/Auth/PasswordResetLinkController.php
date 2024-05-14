<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Affiche la page de réinitialisation du mot de passe
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Traite une requête de réinitialisation du mot de passe
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        //  Envoi un lien de réinitialisation du mot de passe à l'utilisateur.
        //  Une fois le lien envoyé, examination de la réponse et création du message à présenter à l'utilisateur
        //  Envoie du message à présenter à l'utilisateur
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
