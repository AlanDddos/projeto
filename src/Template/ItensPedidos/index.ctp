<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensPedido[]|\Cake\Collection\CollectionInterface $itensPedidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Itens Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensPedidos index large-9 medium-8 columns content">
    <h3><?= __('Itens Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedido_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totali') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('preco') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itensPedidos as $itensPedido): ?>
            <tr>
                <td><?= $this->Number->format($itensPedido->id) ?></td>
                <td><?= $itensPedido->has('pedido') ? $this->Html->link($itensPedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $itensPedido->pedido->id]) : '' ?></td>
                <td><?= $itensPedido->has('produto') ? $this->Html->link($itensPedido->produto->id, ['controller' => 'Produtos', 'action' => 'view', $itensPedido->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($itensPedido->valor) ?></td>
                <td><?= $this->Number->format($itensPedido->quantidade) ?></td>
                <td><?= $this->Number->format($itensPedido->totali) ?></td>
                <td><?= h($itensPedido->descricao) ?></td>
                <td><?= $this->Number->format($itensPedido->preco) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itensPedido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itensPedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itensPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensPedido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
