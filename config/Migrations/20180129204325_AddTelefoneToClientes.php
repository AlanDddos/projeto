<?php
use Migrations\AbstractMigration;

class AddTelefoneToClientes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('clientes');
        $table->addColumn('email', 'string', [
        'default' => null,
        'limit' => 60,
        'null' => true,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('clientes');
        $table->removeColumn('email');
        $table->update();
    }
}
