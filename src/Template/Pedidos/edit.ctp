<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<?= $this->Html->link(__('Novo Pedido'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
<div class="box">
<div class="pedidos form large-9 medium-8 columns content">

    <?= $this->Form->create($pedido,['class'=>'form']) ?>
    <fieldset>
        <legend><?= __('Pedido em edição') ?></legend>
        <div class="row">
            <div class="form-inline">
            <div class="text-right">
                <div class="col-xs-6 col-md-12">
                    <?php //echo $this->Form->control('data', ['class'=>"form-control"]);?>

                    <?php
                    echo $this->Form->dateTime('data', [
                    'month' => [
                    'class' => 'form-control',
                    'data-type' => 'month',
                    ],
                        'year' => [
                            'class' => 'form-control',
                        ],
                        'day' => [
                            'class' => 'form-control',
                        ],
                        'hour' => [
                            'class' => 'form-control',
                        ],
                        'minute' => [
                            'class' => 'form-control',
                        ],
                    ]);
                    ?>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <?php echo $this->Form->control('cliente_id', ['class'=>"form-control"], ['options' => $clientes]);?>
            </div>
            <div class="col-xs-6 col-md-4">
                <?php echo $this->Form->control('total', ['class'=>"form-control"]);?>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-2 col-md-6">
                <?php echo $this->Form->control('itens_pedidos.0.produto_id',['class'=>'form-control'], ['options' => $produtos]);?>
            </div>
            <div class="col-xs-2 col-md-3">
                <?php echo $this->Form->control('itens_pedidos.0.quantidade',['class'=>'form-control']);?>
            </div>
            <div class="col-xs-2 col-md-3">
                <?php echo $this->Form->control('itens_pedidos.0.valor',['class'=>'form-control']);?>
            </div>
        </div>
            <div class="row">
            <div class="text-center">
                <?= $this->Form->button(__('Adicionar <i class="fa fa-save"></i>',['escape'=>true, ])) ?>
            </div>
        </div>
    </fieldset>


    <?= $this->Form->end() ?>
</div>
</div>
<div class="box">
<div class="produtos index large-9 medium-8 columns content">
    <h3><?= __('Produtos') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
            <th scope="col"><?= $this->Paginator->sort('preco') ?></th>
            <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
            <th scope="col"><?= $this->Paginator->sort('total') ?></th>
            <th scope="col" class="actions"><?= __('Ações') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php //debug($itenspedidos); exit();?>


<?php $itenspedidos = $pedido->itens_pedidos?>
        <?php foreach ($itenspedidos as $itempedido): ?>
            <tr>
                <td><?= $this->Number->format($itempedido->id); ?></td>
                <td><?= $this->Number->format($itempedido->codigo); ?></td>
                <td><?= $itempedido->produto->descricao?></td>
                <td><?= $this->Number->format($itempedido->valor); ?></td>
                <td><?= $this->Number->format($itempedido->quantidade); ?></td>
                <td><?= $this->Number->format($itempedido->totali); ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('Excluir',
                        ['controller'=>'ItensPedidos','action' => 'delete', $itempedido->id],
                        ['escape'=>true,
                                'class'=>"label label-danger",
                        'confirm' => __('Deseja excluir: {0}?',$itempedido->produto->descricao),

                        ]); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
</div>