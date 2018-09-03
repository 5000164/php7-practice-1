<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        $q = <<<'EOF'
CREATE TABLE user (
  id INT,
  name VARCHAR(255)
);
EOF;
        $this->execute($q);
    }
}
