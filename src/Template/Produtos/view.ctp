<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens Pedidos'), ['controller' => 'ItensPedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itens Pedido'), ['controller' => 'ItensPedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= $this->Number->format($produto->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preco') ?></th>
            <td><?= $this->Number->format($produto->preco) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Itens Pedidos') ?></h4>
        <?php if (!empty($produto->itens_pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pedido Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col"><?= __('Totali') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Preco') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->itens_pedidos as $itensPedidos): ?>
            <tr>
                <td><?= h($itensPedidos->id) ?></td>
                <td><?= h($itensPedidos->pedido_id) ?></td>
                <td><?= h($itensPedidos->produto_id) ?></td>
                <td><?= h($itensPedidos->valor) ?></td>
                <td><?= h($itensPedidos->quantidade) ?></td>
                <td><?= h($itensPedidos->totali) ?></td>
                <td><?= h($itensPedidos->descricao) ?></td>
                <td><?= h($itensPedidos->preco) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItensPedidos', 'action' => 'view', $itensPedidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItensPedidos', 'action' => 'edit', $itensPedidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItensPedidos', 'action' => 'delete', $itensPedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensPedidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
