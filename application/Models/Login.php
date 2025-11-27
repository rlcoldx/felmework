<?php

namespace Agencia\Close\Models;

use Agencia\Close\Conn\Read;

class Login
{
    private Read $read;

    public function __construct()
    {
        $this->read = new Read();
    }

    /**
     * Busca usuário por email e senha
     * @param string $email
     * @param string $password
     * @return Read
     */
    public function getUserByEmailAndPassword(string $email, string $password): Read
    {
        $this->read->ExeRead(
            'usuarios',
            'WHERE email = :email AND senha = :senha LIMIT 1',
            "email={$email}&senha=" . md5($password)
        );
        return $this->read;
    }

    /**
     * Busca usuário apenas por email
     * @param string $email
     * @return Read
     */
    public function getUserByEmail(string $email): Read
    {
        $this->read->ExeRead(
            'usuarios',
            'WHERE email = :email LIMIT 1',
            "email={$email}"
        );
        return $this->read;
    }

    /**
     * Busca usuário por email e hash do cookie
     * @param string $email
     * @param string $cookieHash
     * @return Read
     */
    public function getUserByEmailAndCookie(string $email, string $cookieHash): Read
    {
        $this->read->ExeRead(
            'usuarios',
            'WHERE email = :email AND cookie_hash = :cookie_hash LIMIT 1',
            "email={$email}&cookie_hash={$cookieHash}"
        );
        return $this->read;
    }
}

