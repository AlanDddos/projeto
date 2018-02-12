<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosTable Test Case
 */
class PedidosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidosTable
     */
    public $Pedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedidos',
        'app.clientes',
        'app.itens_pedidos',
        'app.produtos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pedidos') ? [] : ['className' => PedidosTable::class];
        $this->Pedidos = TableRegistry::get('Pedidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pedidos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Pedidos->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Pedidos->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Clientes'
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->Pedidos->associations()->has($assoc),
                "Cursory sanity check. The [ItensPedidos]Table table is expected to be associated with $assoc."
            );
        }
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->Pedidos->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Pedidos->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Clientes'
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->Pedidos->associations()->has($assoc),
                "Cursory sanity check. The [ItensPedidos]Table table is expected to be associated with $assoc."
            );
        }
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $pedidos = $this->Pedidos->newEntity();
        $this->assertEmpty($pedidos->errors()); // empty = no validation errors
    }
}
