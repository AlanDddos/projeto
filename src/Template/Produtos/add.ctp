<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
<div class="box">
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset class="box box-default">
        <legend><?= __('Add Produto') ?></legend>
        <?php
            echo $this->Form->control('codigo', ['class'=>"form-control"]);
            echo $this->Form->control('descricao', ['class'=>"form-control"]);
            echo $this->Form->control('preco', ['class'=>"form-control"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
</div>