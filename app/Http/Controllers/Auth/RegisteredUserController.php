<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Config;
use App\Models\IndexPage;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Ovh\Api;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        /*$applicationKey = "2jKdrhusmNkzv9ah";
        $applicationSecret = "ZOJTU5ESWGzasVs7xo79DGPhuEQ8SwLc";
        $endpoint = 'ovh-eu';
        $consumerKey = "Z9o9pt83ehA5KxPKCgJnn7sY8XmC03jQ";

        $client = new Client();
        $client->setDefaultOption('timeout', 1);
        $client->setDefaultOption('headers', array('User-Agent' => 'api_client') );

        $conn = new Api($applicationKey,
            $applicationSecret,
            $endpoint,
            $consumerKey,
            $client);
        $webHosting = $conn->get('/hosting/web/');*/

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'account_name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:55|regex:/^[A-Za-z0-9\.]*$/',
        ]);

        $account = Account::create([
            'name' => $request->account_name,
            'subdomain' => $request->subdomain,
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_id' => $account->id,
        ]));

        Config::create([
            'account_id' => $account->id
        ]);

        IndexPage::create([
            'content' => '',
            'account_id' => $account->id
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
