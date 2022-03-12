<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

        

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();

       

            $findUser = User::where('google_id', $user->id)->first();

       

            if($findUser){

       

                Auth::login($findUser);

      

                return view('welcome');

       

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456dummy')

                ]);

      

                Auth::login($newUser);

      

                return view('welcome');


            }

      

        } catch (Exception $e) {

            // dd($e->getMessage());
            return ["nothing"=>"yeah"];

        }

    }
}
