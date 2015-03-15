$(document).ready(function() {

    $('#create-task').click(function() {
        if($('#taskName').val() == ""){
            $('#taskNameError').html("Please enter the task name");
            return false;
        }
        $.ajax({
            url: baseUrl+"task/createtask",
            async: true,
            type: 'POST',
            data: {
                taskName: $('#taskName').val(),
                taskPriority: $('#priorityValue').val(),
                taskStatus: $('#statusValue').val(),
                taskType: $('#taskType').val(),
                taskId: $('#taskId').val()
            },
            dataType: 'json',
            success: function(data) {
                if(data.status){
                    window.location.href = baseUrl+"task/index";
                }else{
                    $('#processError').html(data.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('#processError').html(thrownError);
            }
        });
    });

    $('body').on('click', '.selectAll', function() {
        if(this.checked){
            $('.individual').each(function(){
                this.checked = true;
            });
        }else{
            $('.individual').each(function(){
                this.checked = false;
            });
        }
    });

    $('body').on('change', '#statusType', function() {
        if($(this).val() == ""){
            return false;
        }

        if($('.individual:checked').length > 0){
            $('.statusUpdateForm').submit();
        }else{
            alert("Atleast select any one");
        }

    });

    $('body').on('change', '#filterByType', function() {
        if($(this).val() == ""){
            return false;
        }

        if($('.individual:checked').length > 0){
            $('.statusUpdateForm').submit();
        }else{
            alert("Atleast select any one");
        }

    });
});