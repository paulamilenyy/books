<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Exception;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $bduser=User::where(['email'=>$user->email])->first();
            //object or null
            //return '<h1>'.$user->email.'<h1>';
            if($bduser){
                Auth::login($bduser);
                return redirect()->to(route('home'));
            }else{

                //fazer o cadastro de usuário
                $novouser=User::create([
                    'name' => $user->name,
                    'email' => $user->email,  
                    'password' => Hash::make('123123123'),
                    'provider'=>'google',
                    'provider_id'=>$user->id,
                ]);

                Auth::login($novouser);
                return redirect()->to(route('home'));

            }
            
        }catch(Exception $e){
            return redirect()->to(route('login'));
        }
        
    }
}
