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
        $this->ItensPedidos->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->ItensPedidos->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Pedidos'
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->ItensPedidos->associations()->has($assoc),
                "Cursory sanity check. The [ItensPedidos]Table table is expected to be associated with $assoc."
            );
        }
    }



        /**
         * Test validationDefault method
         *
         * @return void
         */
        public
        function testValidationDefault()
        {
            $this->ItensPedidos->initialize([]); // Have to call manually to get coverage.
            $this->assertEquals(
                'id',
                $this->ItensPedidos->primaryKey(),
                'The [App]Table default primary key is expected to be `id`.'
            );
            $expectedAssociations = [
                'Pedidos',
                'Produtos'
            ];
            foreach ($expectedAssociations as $assoc) {
                $this->assertTrue(
                    $this->ItensPedidos->associations()->has($assoc),
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


        $itenspedidos = $this->ItensPedidos->newEntity();
        $this->assertEmpty($itenspedidos->errors()); // empty = no validation errors

    }
}
