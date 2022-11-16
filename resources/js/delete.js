$('#deleteForm').submit(function(e){
  e.preventDefault();
  var url = $(this).attr('action');
  $.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    $.ajax({
        url: url,
        type: 'DELETE',
        success: function(res)
        {
            alert(res);
            location.reload();
        }
    })
});
