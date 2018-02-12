<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientesTable Test Case
 */
class ClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientesTable
     */
    public $Clientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clientes',
        'app.pedidos',
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
        $config = TableRegistry::exists('Clientes') ? [] : ['className' => ClientesTable::class];
        $this->Clientes = TableRegistry::get('Clientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clientes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Clientes->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Clientes->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Pedidos'
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->Clientes->associations()->has($assoc),
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
        $clientes = $this->Clientes->newEntity();
        $this->assertEmpty($clientes->errors()); // empty = no validation errors
    }
}
