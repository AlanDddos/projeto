<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('clientes')
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('telefone', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('senha', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('datacadastro', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('endereco', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('itens_pedidos')
            ->addColumn('pedido_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('produto_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('valor', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('quantidade', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('totali', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('preco', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addIndex(
                [
                    'pedido_id',
                ]
            )
            ->addIndex(
                [
                    'produto_id',
                ]
            )
            ->create();

        $this->table('panels', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('request_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('panel', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('element', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('summary', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('content', 'binary', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'request_id',
                    'panel',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('pedidos')
            ->addColumn('cliente_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('data', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('total', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'cliente_id',
                ]
            )
            ->create();

        $this->table('produtos')
            ->addColumn('codigo', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('preco', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->create();

        $this->table('requests', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('content_type', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('status_code', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('method', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('requested_at', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('itens_pedidos')
            ->addForeignKey(
                'pedido_id',
                'pedidos',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'produto_id',
                'produtos',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('pedidos')
            ->addForeignKey(
                'cliente_id',
                'clientes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('itens_pedidos')
            ->dropForeignKey(
                'pedido_id'
            )
            ->dropForeignKey(
                'produto_id'
            );

        $this->table('pedidos')
            ->dropForeignKey(
                'cliente_id'
            );

        $this->dropTable('clientes');
        $this->dropTable('itens_pedidos');
        $this->dropTable('panels');
        $this->dropTable('pedidos');
        $this->dropTable('produtos');
        $this->dropTable('requests');
    }
}
