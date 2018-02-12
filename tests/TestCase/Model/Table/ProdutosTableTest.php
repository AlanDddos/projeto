<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosTable Test Case
 */
class ProdutosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosTable
     */
    public $Produtos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos',
        'app.itens_pedidos',
        'app.pedidos',
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
        $config = TableRegistry::exists('Produtos') ? [] : ['className' => ProdutosTable::class];
        $this->Produtos = TableRegistry::get('Produtos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Produtos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Produtos->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Produtos->getPrimaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'ItensPedidos'
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->Produtos->associations()->has($assoc),
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
        $produto = $this->Produtos->newEntity();
        $this->assertEmpty($produto->errors()); // empty = no validation errors
    }
}
