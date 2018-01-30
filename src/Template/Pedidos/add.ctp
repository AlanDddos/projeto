<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
<div class="box">
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Adicionar Pedido') ?></legend>

        <?php //echo $this->Form->control('itens_pedidos.0.produto_id', ['options' => $produtos]);?>
        <?php
        echo $this->Form->control('data',['data-inputmask='=>'\'alias\': \'dd/mm/yyyy\''], ['class'=>"form-control"]);
        echo $this->Form->control('cliente_id',['class'=>'form-control select2 select2-hidden-accessible'], ['options' => $clientes]);
        echo $this->Form->control('itens_pedidos.0.produto_id',['class'=>'form-control select2 select2-hidden-accessible'], ['options' => $produtos]);
        echo $this->Form->control('itens_pedidos.0.quantidade',['class'=>'form-control select2 select2-hidden-accessible']);
        echo $this->Form->control('itens_pedidos.0.valor',['class'=>'form-control select2 select2-hidden-accessible']);



            //echo $this->Form->control('total', ['class'=>"form-control"], ['value'=>'0,00']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
</div>