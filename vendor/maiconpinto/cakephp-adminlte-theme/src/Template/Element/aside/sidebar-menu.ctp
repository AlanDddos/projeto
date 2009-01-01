<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder'). DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cadastros</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/pedidos/index'); ?>"><i class="fa fa-circle-o"></i>Pedidos</a></li>
            <li><a href="<?php echo $this->Url->build('/clientes/index'); ?>"><i class="fa fa-circle-o"></i>Clientes</a></li>
            <li><a href="<?php echo $this->Url->build('/produtos/index'); ?>"><i class="fa fa-circle-o"></i>Produtos</a></li>
            <li><a href="<?php echo $this->Url->build('auth/users/index'); ?>"><i class="fa fa-circle-o"></i>Usuarios</a></li>
        </ul>
    </li>
</ul>
<?php } ?>
