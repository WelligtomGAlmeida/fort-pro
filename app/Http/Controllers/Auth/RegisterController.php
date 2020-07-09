<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Http\Controllers\Controller;
use App\Library\Validation;
use App\Person;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['cpf'] = preg_replace( '/[^0-9]/is', '', $data['cpf'] );
        $data['cell_phone'] = preg_replace( '/[^0-9]/is', '', $data['cell_phone'] );

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:120'],
            'birth_date' => ['required', 'date'],
            'cell_phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'string', 'digits:11', 'unique:people', function($attribute, $value, $fail){
                if(!Validation::validateCpf($value)){
                    return $fail("The {$attribute} is invalid");
                }
            }],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['cpf'] = preg_replace( '/[^0-9]/is', '', $data['cpf'] );
        $data['cell_phone'] = preg_replace( '/[^0-9]/is', '', $data['cell_phone'] );

        $person = new Person([
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
            'cpf' => $data['cpf'],
            'cell_phone' => $data['cell_phone']
        ]);

        try{
            // Registering a user
            $user = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            // Registering a person
            $user->person()->save($person);

            // Registering two initial accounts
            Account::create([
                'person_id' => $user->id,
                'erasable' => false,
                'account_category_id' => 1,
                'name' => 'Vault',
            ]);

            Account::create([
                'person_id' => $user->id,
                'erasable' => false,
                'account_category_id' => 1,
                'name' => 'Wallet',
            ]);

            return $user;
        }catch(Exception $e){

            dd($e->getMessage());
        }
    }
}
