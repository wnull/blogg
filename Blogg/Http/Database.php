<?php

namespace Blogg\Http;

use TechOne\Database\Manager;

class Database
{
    protected Manager $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
		try
        {
            $config = [
                'type'     => 'mysql',
                'hostname' => 'localhost',
                'database' => 'blogg',
                'username' => 'root',
                'password' => '',
                'hostport' => '3306',
            ];

            $this->db = new Manager($config);
		}
		catch(\PDOException $e) {
			throw new \RuntimeException('Connection failed: ' . $e->getMessage());
		}
	}
}