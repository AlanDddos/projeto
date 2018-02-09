<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<button type="button" class="btn btn-default btn-lg" onclick="location.href='/pedidos/add'">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Adicionar Pedido
</button>
<div class="box">
<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $this->Number->format($pedido->id) ?></td>
                <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                <td><?= h($pedido->data) ?></td>
                <td><?= $this->Number->format($pedido->total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Fechar'), ['action' => 'view', $pedido->id],['class'=>"label label-warning"]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pedido->id],['class'=>"label label-primary"]) ?>
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $pedido->id],['class'=>"label label-danger"], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination pagination-sm no-margin pull-right">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>