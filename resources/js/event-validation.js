if ($("#event-form").length > 0) 
{
$(document).ready(function() {
    $('#event-form').validate({
        rules: {
            title: {
                required: true
            },
            description:{
                required:true
            },
            start_date:{
                required:true
            },
            end_date:{
                required:true
            }

        },
        errorPlacement: function(error, element) {
            element.after(error);
            error.addClass('error');
            error.addClass('text-danger');
        }
    });
});
}