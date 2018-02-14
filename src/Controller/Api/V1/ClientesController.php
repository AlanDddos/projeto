<?php
namespace App\Controller\Api\V1;
class ClientesController extends AppController
{

    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
}

    public function index()
{
    $clientes = $this->Clientes->find('all');
    $this->set([
        'clientes' => $clientes,
        '_serialize' => ['clientes']
    ]);
}

    public function view($id)
{
    $cliente = $this->Clientes->get($id);
    $this->set([
        'cliente' => $cliente,
        '_serialize' => ['cliente']
    ]);
}

    public function add()
{
    $cliente = $this->Clientes->newEntity();
    $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
    if ($this->Clientes->save($cliente)) {
        $message = 'Saved';
    } else {
        $message = 'Error';
    }
    $this->set([
        'message' => $message,
        'cliente' => $cliente,
        '_serialize' => ['message', 'cliente']
    ]);
}

    public function edit($id)
{
    $cliente = $this->clientes->get($id);
    if ($this->request->is(['post', 'put'])) {
        $cliente = $this->clientes->patchEntity($cliente, $this->request->getData());
        if ($this->clientes->save($cliente)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
    }
    $this->set([
        'message' => $message,
        '_serialize' => ['message']
    ]);
}

    public function delete($id)
{
    $cliente = $this->clientes->get($id);
    $message = 'Deleted';
    if (!$this->clientes->delete($cliente)) {
        $message = 'Error';
    }
    $this->set([
        'message' => $message,
        '_serialize' => ['message']
    ]);
}
}