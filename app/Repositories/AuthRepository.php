<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{

    /**
     * Kullanıcı oluşturur.
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Belirli bir e-posta adresine sahip kullanıcıyı bulur.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
