<?php

namespace App\Controllers;

use App\Domain\User;
use App\Infrastructure\Repository;

class Index
{
    public function execute()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->get();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->post($_POST['content']);
        }
    }

    private function get()
    {
        $repository = new Repository('php7-practice-1_db_1:3306', 'user', 'password', 'app');
        $contents = $repository->fetchContents();
        ob_start();
        require __DIR__ . '/../view/index.php';
        echo ob_get_clean();
    }

    private function post(?string $content_raw)
    {
        list($content, $is_success) = $this->postValidate($content_raw);
        if ($is_success) {
            $user = new User($content);
            $repository = new Repository('php7-practice-1_db_1:3306', 'user', 'password', 'app');
            $repository->save($user);
        }

        header('Location: /');
        exit;
    }

    private function postValidate(?string $raw): array
    {
        if (isset($raw) && is_string($raw)) {
            return [$raw, true];
        } else {
            return ['', false];
        }
    }
}
