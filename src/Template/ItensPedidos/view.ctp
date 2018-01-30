<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensPedido $itensPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Itens Pedido'), ['action' => 'edit', $itensPedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Itens Pedido'), ['action' => 'delete', $itensPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensPedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Itens Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itens Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itensPedidos view large-9 medium-8 columns content">
    <h3><?= h($itensPedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $itensPedido->has('pedido') ? $this->Html->link($itensPedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $itensPedido->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $itensPedido->has('produto') ? $this->Html->link($itensPedido->produto->id, ['controller' => 'Produtos', 'action' => 'view', $itensPedido->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($itensPedido->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itensPedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($itensPedido->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($itensPedido->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Totali') ?></th>
            <td><?= $this->Number->format($itensPedido->totali) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preco') ?></th>
            <td><?= $this->Number->format($itensPedido->preco) ?></td>
        </tr>
    </table>
</div>
