{extends file="common_layout/layout.tpl"}
{block name=body}
    <div class="span10 offset1">
        <div class="row">
            <h3>Create a task</h3>
        </div>
          <div class="control-group">
            <label class="control-label">Name</label>
            <div class="controls">
                <input name="taskName" type="text"  placeholder="Name" value="{$vTaskName}">
            </div>
          </div>
          <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
            <label class="control-label">Priority</label>
            <div class="controls">
                <input name="vPriority" type="text" placeholder="Priority" value="{$vPriority}">
                <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError;?></span>
                <?php endif;?>
            </div>
          </div>
          <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
            <label class="control-label">Status</label>
            <div class="controls">
                <input name="txtStatus" type="text"  placeholder="Status" value="{$vStatus}">
                <?php if (!empty($mobileError)): ?>
                    <span class="help-inline"><?php echo $mobileError;?></span>
                <?php endif;?>
            </div>
          </div>
          <div class="form-actions">
              <button type="submit" class="btn btn-success">Create</button>
              <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>
{/block}  