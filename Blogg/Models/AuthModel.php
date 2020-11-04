<?php

namespace Blogg\Models;

use Blogg\Http\Database;
use TechOne\Database\Connection;

class AuthModel extends Database
{
    protected Connection $pdo;

    /**
     * PostModel constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pdo = $this->db->getConnection();
    }

    /**
     * @param string $username
     * @return bool
     * @throws \Throwable
     */
    public function getAuth(string $username)
    {
        $request = $this->pdo->query(
            'SELECT username FROM users WHERE username = :name', [
                'name' => $username
            ]
        );

        return $request ? true : false;
    }
}