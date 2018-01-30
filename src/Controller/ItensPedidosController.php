<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItensPedidos Controller
 *
 * @property \App\Model\Table\ItensPedidosTable $ItensPedidos
 *
 * @method \App\Model\Entity\ItensPedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensPedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Produtos']
        ];
        $itensPedidos = $this->paginate($this->ItensPedidos);

        $this->set(compact('itensPedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Itens Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itensPedido = $this->ItensPedidos->get($id, [
            'contain' => ['Pedidos', 'Produtos']
        ]);

        $this->set('itensPedido', $itensPedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itensPedido = $this->ItensPedidos->newEntity();
        if ($this->request->is('post')) {
            $itensPedido = $this->ItensPedidos->patchEntity($itensPedido, $this->request->getData());
            if ($this->ItensPedidos->save($itensPedido)) {
                $this->Flash->success(__('The itens pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens pedido could not be saved. Please, try again.'));
        }
        $pedidos = $this->ItensPedidos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->ItensPedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('itensPedido', 'pedidos', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itens Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itensPedido = $this->ItensPedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itensPedido = $this->ItensPedidos->patchEntity($itensPedido, $this->request->getData());
            if ($this->ItensPedidos->save($itensPedido)) {
                $this->Flash->success(__('The itens pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens pedido could not be saved. Please, try again.'));
        }
        $pedidos = $this->ItensPedidos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->ItensPedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('itensPedido', 'pedidos', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itens Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $itensPedido = $this->ItensPedidos->get($id, [
            'contain' => ['Pedidos']
        ]);



        //debug($itensPedido);
        //exit();
        if ($this->ItensPedidos->delete($itensPedido)) {
            $itenssoma = $this->ItensPedidos->find()->where(['pedido_id'=>$itensPedido->pedido_id]);
            $itenssoma = $itenssoma->sumOf('totali');

            $pedido = $itensPedido->pedido;
            $pedido->total = $itenssoma;

            $this->ItensPedidos->Pedidos->save($pedido);

            $this->Flash->success(__('O Item do pedido foi excluído.'));
        } else {
            $this->Flash->error(__('The itens pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Pedidos', 'action' => 'edit', $itensPedido->pedido_id]);
    }
}
