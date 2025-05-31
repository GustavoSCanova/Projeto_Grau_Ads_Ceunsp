<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

trait PasswordValidationRules
{
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            'min:8',
            'max:255',
            'confirmed',
        ];
    }
}

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

 public function create(array $input): User
{
    dd($input); // imprime o valor do campo "tipo" e outros campos

    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'tipo' => ['required', 'in:aluno,professor'],
    ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tipo' => $input['tipo'],
        ]);
    }
}
;