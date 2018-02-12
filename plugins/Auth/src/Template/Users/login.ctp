<div class='row' style="padding-top:15%">
<div class="users form col-md-4 col-md-offset-4 col-sm-offset-4">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <div class='box' style="position:absolute;">
    <div class='content'>

    <fieldset>
        <legend>Login</legend>
       <?php echo $this->Form->control('email',['class'=>'form-control']);?>
        <?php echo $this->Form->control('password',['class'=>'form-control']);?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    </div>
    </div>
    </div>
</div>