<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        $q = <<<'EOF'
CREATE TABLE user (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
EOF;
        $this->execute($q);
    }
}
