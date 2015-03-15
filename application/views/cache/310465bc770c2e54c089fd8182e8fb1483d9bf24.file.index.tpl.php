<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-15 22:58:33
         compiled from "application/views/templates/welcome/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104554425505c1419cf847-43064000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '310465bc770c2e54c089fd8182e8fb1483d9bf24' => 
    array (
      0 => 'application/views/templates/welcome/index.tpl',
      1 => 1426439619,
      2 => 'file',
    ),
    '5377f6cb478697610b9a63d8b29eb74a960e81fc' => 
    array (
      0 => 'application/views/templates/common_layout/layout.tpl',
      1 => 1426426225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104554425505c1419cf847-43064000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ASSESTPATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5505c141a8dec1_57542886',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5505c141a8dec1_57542886')) {function content_5505c141a8dec1_57542886($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="<?php echo $_smarty_tpl->tpl_vars['ASSESTPATH']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        
    <div class="row">
        <h3>Task Management System</h3>
    </div>
    <div class="row">
        <div class="clearfix">
            <p class="pull-left"><a href="index.php?welcome/info" class="btn btn-success">Create</a></p>
                <ul class="inline pull-right">
                    <li>Filter by : </li>
                    <li><a href="index.php?welcome/index" >All</a></li>
                <?php  $_smarty_tpl->tpl_vars['statusValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statusValue']->_loop = false;
 $_smarty_tpl->tpl_vars['statusKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aStatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statusValue']->key => $_smarty_tpl->tpl_vars['statusValue']->value) {
$_smarty_tpl->tpl_vars['statusValue']->_loop = true;
 $_smarty_tpl->tpl_vars['statusKey']->value = $_smarty_tpl->tpl_vars['statusValue']->key;
?>
                  <li><a href="index.php?welcome/index/<?php echo $_smarty_tpl->tpl_vars['statusValue']->value;?>
" ><?php echo ucfirst($_smarty_tpl->tpl_vars['statusValue']->value);?>
</a></li>
                <?php } ?>
                </ul>
        </div>
        
        <form class="statusUpdateForm" action="index.php?welcome/updatetaskstatus" method="post">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><input type="checkbox" class="selectAll" name="overall-task" value="1"></th>
                    <th>Name</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['taskInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['taskInfo']->_loop = false;
 $_smarty_tpl->tpl_vars['taskkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['taskList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['taskInfo']->key => $_smarty_tpl->tpl_vars['taskInfo']->value) {
$_smarty_tpl->tpl_vars['taskInfo']->_loop = true;
 $_smarty_tpl->tpl_vars['taskkey']->value = $_smarty_tpl->tpl_vars['taskInfo']->key;
?>
                <tr>
                    <td><input type="checkbox" class="individual" name="overalltask[]" value="<?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->id;?>
"></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->name;?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['taskInfo']->value->priority=="high") {?>
                        <span class="label label-important"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->priority;?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['taskInfo']->value->priority=="medium") {?>
                        <span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->priority;?>
</span>
                        <?php } else { ?>
                        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->priority;?>
</span>
                        <?php }?>
                    </td>
                    <td><?php if ($_smarty_tpl->tpl_vars['taskInfo']->value->status=="wip") {?>
                        <span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->status;?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['taskInfo']->value->status=="completed") {?>
                        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->status;?>
</span>
                        <?php } else { ?>
                        <span class="label label-important"><?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->status;?>
</span>
                        <?php }?>
                    </td>
                    <td><a class="btn btn-success" href="index.php?welcome/info/edit/<?php echo $_smarty_tpl->tpl_vars['taskInfo']->value->id;?>
">Edit</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <select id="statusType" name="statusType">
                <option value="">Select</option>
                <?php  $_smarty_tpl->tpl_vars['statusValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statusValue']->_loop = false;
 $_smarty_tpl->tpl_vars['statusKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aStatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statusValue']->key => $_smarty_tpl->tpl_vars['statusValue']->value) {
$_smarty_tpl->tpl_vars['statusValue']->_loop = true;
 $_smarty_tpl->tpl_vars['statusKey']->value = $_smarty_tpl->tpl_vars['statusValue']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['statusValue']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['statusValue']->value;?>
</option>
                <?php } ?>
            </select>
        </form>
    </div>

    </div>
</body>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['ASSESTPATH']->value;?>
/js/jquery-2.1.3.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['ASSESTPATH']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->tpl_vars['jsPath']->value;?>

</html><?php }} ?>
