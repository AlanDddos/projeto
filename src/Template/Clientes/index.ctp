<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<button type="button" class="btn btn-default btn-lg" onclick="location.href='/clientes/add'">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Adicionar Cliente
</button>
<div class="box">

<div class="clientes index large-9 medium-8 columns content">
    <h3><?= __('Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('senha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datacadastro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $this->Number->format($cliente->id) ?></td>
                <td><?= h($cliente->nome) ?></td>
                <td><?= h($cliente->telefone) ?></td>
                <td><?= h($cliente->senha) ?></td>
                <td><?= h($cliente->tipo) ?></td>
                <td><?= h($cliente->datacadastro) ?></td>
                <td><?= h($cliente->endereco) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $cliente->id],['class'=>"label label-warning"]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cliente->id],['class'=>"label label-primary"]) ?>
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $cliente->id],['class'=>"label label-danger"], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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