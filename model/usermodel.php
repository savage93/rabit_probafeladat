<?php

namespace Rabit\App\Model;

/**
 * This class manages the users' interactions with the database.
 */
class UserModel extends Database
{
    /**
     * getUsers
     * This function retrieves users from the database.
     */
    public function getUsers(): array
    {
        $stmt = $this->conn->query('SELECT * FROM users');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Rabit\App\Model\User');
    }
}
