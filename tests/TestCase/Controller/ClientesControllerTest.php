<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ClientesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ClientesController Test Case
 */
class ClientesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clientes',
        'app.pedidos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        // Set session data
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
        $this->get('/clientes'); //busca os clientes
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
        $this->get('/clientes/view/1'); //test controller view
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
        $this->get('/clientes/add/1'); //test controller add
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
        $this->get('/clientes/edit/1'); //test controller edit
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
        $this->delete('/clientes/delete/1'); //test controller delete
        $this->assertResponseSuccess(); //verifica se está com certo

    }
}
