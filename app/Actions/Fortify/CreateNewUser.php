<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:alunos,cpf'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'curso_id' => ['required', 'exists:cursos,id'],
            'turma_id' => ['required', 'exists:turmas,id'],
        ])->validate();

        $defaultRole = Role::where('nome', 'aluno')->first();
        if (!$defaultRole) {
            throw new \Exception('Default role "aluno" not found.');
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $defaultRole ? $defaultRole->id : null,
        ]);

        // Cria o aluno vinculado ao usuário
        \App\Models\Aluno::create([
            'nome' => $input['name'],
            'cpf' => $input['cpf'],
            'email' => $input['email'],
            'senha' => Hash::make($input['password']),
            'user_id' => $user->id,
            'curso_id' => $input['curso_id'],
            'turma_id' => $input['turma_id'],
        ]);

        return $user;
    }
}
