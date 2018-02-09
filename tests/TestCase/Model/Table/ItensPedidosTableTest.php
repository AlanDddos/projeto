<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensPedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensPedidosTable Test Case
 */
class ItensPedidosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensPedidosTable
     */
    public $ItensPedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.itens_pedidos',
        'app.pedidos',
        'app.produtos',
        'app.clientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItensPedidos') ? [] : ['className' => ItensPedidosTable::class];
        $this->ItensPedidos = TableRegistry::get('ItensPedidos', $config);

    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItensPedidos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
