{extends file="common_layout/layout.tpl"}
{block name=body}
    <div class="row">
        <h3>Task Management System</h3>
    </div>
    <div class="row">
        <div class="clearfix">
            <p class="pull-left"><a href="{$site_url}task/info" class="btn btn-success">Create</a></p>
                <ul class="inline pull-right">
                    <li>Filter by : </li>
                    <li><a href="{$site_url}task/index" >All</a></li>
                {foreach from=$aStatus key=statusKey item=statusValue}

                  <li><a href="{$site_url}task/index/{$statusValue}" >{$statusValue|ucfirst}</a></li>
                {/foreach}
                </ul>
        </div>
        
        <form class="statusUpdateForm" action="{$site_url}task/updatetaskstatus" method="post">
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
                {foreach from=$taskList key=taskkey item=taskInfo}
                <tr>
                    <td><input type="checkbox" class="individual" name="overalltask[]" value="{$taskInfo->id}"></td>
                    <td>{$taskInfo->name}</td>
                    <td>{if $taskInfo->priority == "high"}
                        <span class="label label-important">{$taskInfo->priority}</span>
                        {else if $taskInfo->priority == "medium"}
                        <span class="label label-warning">{$taskInfo->priority}</span>
                        {else}
                        <span class="label label-success">{$taskInfo->priority}</span>
                        {/if}
                    </td>
                    <td>{if $taskInfo->status == "wip"}
                        <span class="label label-info">{$taskInfo->status}</span>
                        {else if $taskInfo->status == "completed"}
                        <span class="label label-success">{$taskInfo->status}</span>
                        {else}
                        <span class="label label-important">{$taskInfo->status}</span>
                        {/if}
                    </td>
                    <td><a class="btn btn-success" href="{$site_url}task/info/edit/{$taskInfo->id}">Edit</a></td>
                </tr>
                {/foreach}
                </tbody>
            </table>
            <select id="statusType" name="statusType">
                <option value="">Select</option>
                {foreach from=$aStatus key=statusKey item=statusValue}
                  <option value="{$statusValue}">{$statusValue}</option>
                {/foreach}
            </select>
        </form>
    </div>
{/block}  
{block name=jsfiles}{$jsPath}{/block}