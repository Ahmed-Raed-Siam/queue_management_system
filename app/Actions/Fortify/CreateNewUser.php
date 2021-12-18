<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input)
    {
        var_dump($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role_id' => ['required', Rule::in(['Customer', 'Employee'])],
        ])->validate();

        $role_name = strtolower($input['role_id']);
        $role_id = null;

        if ($role_name === 'customer'):
            $role_id = 1;
        endif;

        if ($role_name === 'employee'):
            $role_id = 2;
        endif;

//        $role = Role::create([
//            'name' => $role_name
//        ]);

//        dd($role_name, $role_id);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $role_id,
        ]);
    }
}
