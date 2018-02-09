<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Clientes', 'ItensPedidos']
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $pedido = $this->Pedidos->newEntity();
        $ItemPedido = $this->Pedidos->ItensPedidos->newEntity();

        if ($this->request->is('post')) {
            //debug($this->request->getData());
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData(), ['associated' => ['ItensPedidos']]);

            //debug($pedido->itens_pedidos);
            //echo $pedido->itens_pedidos[0]['quantidade'];
            $pedido->itens_pedidos[0]['totali'] = // Aqui eu calculo o total do item
            $pedido->itens_pedidos[0]['quantidade'] *
            $pedido->itens_pedidos[0]['valor'];
            $pedido['total'] = $pedido->itens_pedidos[0]['totali']; //Salvo o total antes de ir para a edição onde adiciono mais itens


            //debug($pedido);
           // exit();
            if ($this->Pedidos->save($pedido, ['associated' => 'ItensPedidos'])) {
                $this->Flash->success(__('Produto salvo!'));
                //var_dump($pedido);
                //exit();
                return $this->redirect(['action' => 'edit', $pedido->id]);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        $itensPedidos = $this->Pedidos->ItensPedidos->find('all')
            ->where(['ItensPedidos.pedido_id' => $id]);

        $itensPedidos = $itensPedidos->toArray();

        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        //$clientes = $clientes->toArray(); //transforma a consulta que fiz no controller em array para extrair os dados

        //$produtos = $this->loadModel('Produtos');
        $produtos = $this->Pedidos->ItensPedidos->Produtos->find('list', ['limit' => 200]);
        //$produtos = $produtos->toArray(); //transforma a consulta que fiz no controller em array para extrair os dados


        $this->set(compact('pedido', 'clientes', 'produtos', 'itensPedidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['ItensPedidos', 'ItensPedidos.Produtos']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());

                $pedido->itens_pedidos[0]['totali'] = // Aqui eu calculo o total do item
                $pedido->itens_pedidos[0]['quantidade'] *
                $pedido->itens_pedidos[0]['valor'];

                $pedido['total'] = $pedido['total'] + $pedido->itens_pedidos[0]['totali']; //tenho que somar os itens do pedido para salvar no pedido

            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O pedido foi salvo.'));

                return $this->redirect(['action' => 'edit', $pedido->id]);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }

        $produtos = $this->Pedidos->ItensPedidos->Produtos->find('list', ['limit' => 200]);

        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'clientes', 'itenspedidos', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
