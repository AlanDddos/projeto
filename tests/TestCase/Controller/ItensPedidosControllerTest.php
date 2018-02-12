<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ItensPedidosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ItensPedidosController Test Case
 */
class ItensPedidosControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email'=>'test@test.com',
                    'password'=>'123456',
                    'role'=>'1',
                    'locale'=>'1',
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        //$this->markTestIncomplete('Not implemented yet.');
        $this->get('/itens-pedidos'); //busca os pedidos
        $this->assertResponseOk(); //verifica se está com certo
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email'=>'test@test.com',
                    'password'=>'123456',
                    'role'=>'1',
                    'locale'=>'1',
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        //$this->markTestIncomplete('Not implemented yet.');
        $this->get('/itens-pedidos/view/1'); //test controller view
        $this->assertResponseOk(); //verifica se está com certo

    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email'=>'test@test.com',
                    'password'=>'123456',
                    'role'=>'1',
                    'locale'=>'1',
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        //$this->markTestIncomplete('Not implemented yet.');
        $this->get('/itens-pedidos/add/1'); //test controller add
        $this->assertResponseOk(); //verifica se está com certo

    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email'=>'test@test.com',
                    'password'=>'123456',
                    'role'=>'1',
                    'locale'=>'1',
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        //$this->markTestIncomplete('Not implemented yet.');
        $this->get('/itens-pedidos/edit/1'); //test controller edit
        $this->assertResponseOk(); //verifica se está com certo

    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email'=>'test@test.com',
                    'password'=>'123456',
                    'role'=>'1',
                    'locale'=>'1',
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        //$this->markTestIncomplete('Not implemented yet.');
        $this->delete('/itens-pedidos/delete/1'); //test controller delete
        $this->assertResponseSuccess(); //verifica se está com certo

    }
}