<?php

namespace App\Infrastructure;

use App\Domain\User;
use mysqli;

class Repository
{
    private $mysqli;

    public function __construct(string $host, string $user, string $password, string $database)
    {
        $this->mysqli = new mysqli($host, $user, $password, $database);
        if ($this->mysqli->connect_errno !== 0) {
            exit;
        }
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }

    function fetchContents(): array
    {
        return $this->mysqli->query('SELECT * FROM user')->fetch_all();
    }

    function save(User $user): bool
    {
        $this->mysqli->begin_transaction();
        try {
            $stmt = $this->mysqli->prepare('INSERT INTO user(name) VALUES (?)');
            $stmt->bind_param('s', $user->name);
            $stmt->execute();
            $stmt->close();
            return $this->mysqli->commit();
        } catch (\Exception $e) {
            $this->mysqli->rollback();
            exit;
        }
    }
}
