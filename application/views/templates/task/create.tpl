{extends file="common_layout/layout.tpl"}
{block name=body}
    <div class="span10 offset1">
        <div class="row">
            <h3>Create a task</h3>
        </div>
        {if $type == 'edit' || $type == 'add'}
          <form class="form-horizontal" method="post">
            <input type="hidden" name="tasktype" id="taskType" value="{$type}">
            <input type="hidden" id="taskId" name="taskId" value="{$vTaskId}">
            <div class="control-group">
              <label class="control-label">Task Name</label>
              <div class="controls">
                  <input id="taskName" type="text"  placeholder="Name" value="{$vTaskName}">
                    <span id="taskNameError" class="text-error"></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Priority</label>
              <div class="controls">
                <select id="priorityValue">
                {foreach from=$aPriority key=priorityKey item=priorityValue}
                  <option {if ($priorityValue)==($vPriority)}selected=="selected"{/if} value="{$priorityValue}">{$priorityValue}</option>
                {/foreach}
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
                <select id="statusValue">
                {foreach from=$aStatus key=statusKey item=statusValue}
                  <option {if ($statusValue)==($vStatus)}selected=="selected"{/if} value="{$statusValue}">{$statusValue}</option>
                {/foreach}
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="button" id="create-task" name="create-task" class="btn btn-success">{if $type == 'add'}Create{else} Update{/if}</button>
              <a class="btn" href="{$site_url}">Back</a>
              <div id="processError" class="text-error"></div>
            </div>
          </form>
        {else}
          <div class="view-task">
            <div class="control-group">
              <span class="control-label"><b>Task name</b></span> : {$vTaskName}
            </div>
            <div class="control-group">
              <span class="control-label"><b>Priority</b></span> : {$vPriority}
            </div>
            <div class="control-group">
              <span class="control-label"><b>Status</b></span> : {$vTaskName}
            </div>
            <div class="form-actions">
                <a class="btn" href="{$site_url}">Back</a>
            </div>
          </div>
        {/if}
    </div>
{/block}  
{block name=jsfiles}{$jsPath}{/block}