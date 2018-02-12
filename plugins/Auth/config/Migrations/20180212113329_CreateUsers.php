<?php

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
            'limit' => 50
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 255
        ]);
        $table->addColumn('role', 'string', [
            'limit' => 20
        ]);
        $table->addColumn('locale', 'string', [
            'limit' => 5
        ]);
        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime');
        $table->create();
    }
}