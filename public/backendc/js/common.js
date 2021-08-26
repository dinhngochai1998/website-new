$(() => {

    $(document).on('change', '.form__file-control', (event) => {
      const targetThumb = $(`label[for="${event.target.id}"]`).find('.form__file-thumb')
  
      if (event.target.files && event.target.files[0]) {
        const reader = new FileReader()
  
        reader.onload = (e) => {
          targetThumb.attr('src', e.target.result)
        }
  
        reader.readAsDataURL(event.target.files[0])
      }
    })
  
    $(document).on('change', '.form__check-all', (event) => {
        $('.form__check-all-target').prop('checked', event.target.checked)
    });

    $('.delete_all').on('click', function(e) {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0) {
            toastr.error('Please select row to delete');
        } else {  
            Swal.fire({
                    title: 'Ddo you want to delete？',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Delete`,
                    denyButtonText: `Don't delete`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        var join_selected_values = allVals.join(","); 
                        var url = $(this).data('url');
                        var params = 'ids='+join_selected_values;
                        ajaxDeleteRecords(url, params)
                    }
                })
        }
    });
})


//common delete Records
function ajaxDeleteRecords(url, params ) {
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: params,
        success: function (data) {
            if (data['success']) {
                $(".sub_chk:checked").each(function() {  
                    $(this).parents("tr").remove();
                });
                toastr.success('Delete Successful');
            } else {
                toastr.error('Delete Fail');
            }
        },
        error: function (data) {
            toastr.error('Delete Fail');
        }
    });
    $.each(allVals, function( index, value ) {
        $('table tr').filter("[data-row-id='" + value + "']").remove();
    });
}

function ajaxReloadList(url, params ) {
    $.ajax({
        url:url,
        type: 'GET',
        data: {'params': params},
        success:function(data) {
            $('#input').html(data);
        }
    });
}
$("#search-user").keyup(function() {
    var name = $('#search-user').val();
    var url = $(this).attr('data-url');
    console.log(name);
    $.ajax({
            url: url,
            type: "GET",
            data: {
                name
            },
        })
        .done(function(data) {
            if (data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('#list-user tr').remove();
            $("#list-user").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
    }); 
});
$("#search-post").keyup(function() {
    var title = $('#search-post').val();
    var url = $(this).attr('data-url');
    console.log(name);
    $.ajax({
            url: url,
            type: "GET",
            data: {
                title
            },
        })
        .done(function(data) {
            if (data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.list-post tr').remove();
            $(".list-post").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
    }); 
});