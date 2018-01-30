<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensPedido $itensPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Itens Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensPedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($itensPedido) ?>
    <fieldset>
        <legend><?= __('Add Itens Pedido') ?></legend>
        <?php
            echo $this->Form->control('pedido_id', ['options' => $pedidos]);
            echo $this->Form->control('produto_id', ['options' => $produtos]);
            echo $this->Form->control('valor');
            echo $this->Form->control('quantidade');
            echo $this->Form->control('totali');
            echo $this->Form->control('descricao');
            echo $this->Form->control('preco');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
