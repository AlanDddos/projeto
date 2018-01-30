<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
<div class="box">
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset class="box box-default">
        <legend><?= __('Adicionar Cliente');?></legend>
        <?php
            echo $this->Form->control('datacadastro', ['class'=>"form-control"]);
            echo $this->Form->control('nome', ['class'=>"form-control"]);
            echo $this->Form->control('telefone', ['class'=>"form-control"]);
            echo $this->Form->control('senha', ['class'=>"form-control"]);
            echo $this->Form->control('tipo', ['class'=>"form-control"]);
            echo $this->Form->control('endereco', ['class'=>"form-control"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
</div>