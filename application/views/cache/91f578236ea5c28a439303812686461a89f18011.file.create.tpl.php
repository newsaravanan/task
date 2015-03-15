<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-15 23:26:45
         compiled from "application/views/templates/task/create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4034549655505c32fa04be4-97353568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91f578236ea5c28a439303812686461a89f18011' => 
    array (
      0 => 'application/views/templates/task/create.tpl',
      1 => 1426442201,
      2 => 'file',
    ),
    '5377f6cb478697610b9a63d8b29eb74a960e81fc' => 
    array (
      0 => 'application/views/templates/common_layout/layout.tpl',
      1 => 1426442032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4034549655505c32fa04be4-97353568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5505c32fa4edb3_12852735',
  'variables' => 
  array (
    'ASSESTPATH' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5505c32fa4edb3_12852735')) {function content_5505c32fa4edb3_12852735($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="<?php echo $_smarty_tpl->tpl_vars['ASSESTPATH']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        
    <div class="span10 offset1">
        <div class="row">
            <h3>Create a task</h3>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=='edit'||$_smarty_tpl->tpl_vars['type']->value=='add') {?>
          <form class="form-horizontal" method="post">
            <input type="hidden" name="tasktype" id="taskType" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
            <input type="hidden" id="taskId" name="taskId" value="<?php echo $_smarty_tpl->tpl_vars['vTaskId']->value;?>
">
            <div class="control-group">
              <label class="control-label">Task Name</label>
              <div class="controls">
                  <input id="taskName" type="text"  placeholder="Name" value="<?php echo $_smarty_tpl->tpl_vars['vTaskName']->value;?>
">
                    <span id="taskNameError" class="text-error"></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Priority</label>
              <div class="controls">
                <select id="priorityValue">
                <?php  $_smarty_tpl->tpl_vars['priorityValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['priorityValue']->_loop = false;
 $_smarty_tpl->tpl_vars['priorityKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aPriority']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['priorityValue']->key => $_smarty_tpl->tpl_vars['priorityValue']->value) {
$_smarty_tpl->tpl_vars['priorityValue']->_loop = true;
 $_smarty_tpl->tpl_vars['priorityKey']->value = $_smarty_tpl->tpl_vars['priorityValue']->key;
?>
                  <option <?php if (($_smarty_tpl->tpl_vars['priorityValue']->value)==($_smarty_tpl->tpl_vars['vPriority']->value)) {?>selected=="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['priorityValue']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['priorityValue']->value;?>
</option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
                <select id="statusValue">
                <?php  $_smarty_tpl->tpl_vars['statusValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statusValue']->_loop = false;
 $_smarty_tpl->tpl_vars['statusKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aStatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statusValue']->key => $_smarty_tpl->tpl_vars['statusValue']->value) {
$_smarty_tpl->tpl_vars['statusValue']->_loop = true;
 $_smarty_tpl->tpl_vars['statusKey']->value = $_smarty_tpl->tpl_vars['statusValue']->key;
?>
                  <option <?php if (($_smarty_tpl->tpl_vars['statusValue']->value)==($_smarty_tpl->tpl_vars['vStatus']->value)) {?>selected=="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['statusValue']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['statusValue']->value;?>
</option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="button" id="create-task" name="create-task" class="btn btn-success"><?php if ($_smarty_tpl->tpl_vars['type']->value=='add') {?>Create<?php } else { ?> Update<?php }?></button>
              <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
">Back</a>
              <div id="processError" class="text-error"></div>
            </div>
          </form>
        <?php } else { ?>
          <div class="view-task">
            <div class="control-group">
              <span class="control-label"><b>Task name</b></span> : <?php echo $_smarty_tpl->tpl_vars['vTaskName']->value;?>

            </div>
            <div class="control-group">
              <span class="control-label"><b>Priority</b></span> : <?php echo $_smarty_tpl->tpl_vars['vPriority']->value;?>

            </div>
            <div class="control-group">
              <span class="control-label"><b>Status</b></span> : <?php echo $_smarty_tpl->tpl_vars['vTaskName']->value;?>

            </div>
            <div class="form-actions">
                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
">Back</a>
            </div>
          </div>
        <?php }?>
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

    <?php echo '<script'; ?>
 type="text/javascript">
    var baseUrl = '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
';
    <?php echo '</script'; ?>
>
</html><?php }} ?>
