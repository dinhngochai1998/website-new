$(document).ready(function(){
    $("#searchCategory").click(function(){
        var search = $("#search-category").val();
        var _token = $('input[name="_token"]').val();
      //  console.log("{{ route('category.search') }}");
        var url = $(this).attr("data-url");
        // $.ajaxSetup({
        //     headers: {
        //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            url:url,
            type:"GET",
            data:{
                search
            },
            async:true,
            success:function(data){
                console.log(data.data);
                $("#list-category").html('');
                $.each(data.data, function( index, value ) {
                    var list_category = `
                    <tr>
                        <td>${value.name}</td>
                        <td>${value.slug}</td>
                        <td><a href="">edit</a></td>
                        <td><a href="">delete</a></td>
                    </tr>
                    `;
                $("#list-category").append(list_category);
                });
            }
           
        })
    })

   $("#createCategory").click(function(){
       var name = $("#namecategory").val();
       var slug = $("#slugcategory").val();   
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlCreate = $(this).attr('data-url');
        $.ajax({
            url:urlCreate,
            type:'POST',
            data:{
                name,
                slug,
            },
            async:true,
            success:function(data){
                console.log(data);
                if(data.error){
                    if(data.error.name){
                        // alert(data.error.name)
                        $('#error-name').text(data.error.name);
                        $('#error-name').css('color', 'red');
                    }
                    if(data.error.slug){
                        $('#error-slug').text(data.error.slug);
                        $('#error-slug').css('color', 'red');

                    }
                   
                } else {
                    alert('thêm thành công');
                }
            }
        })
   })

   $('#searchComment').click(function(){
       var name = $('#search-comment').val();
       var url = $(this).attr('data-url');

       $.ajax({
           url:url,
           type:'GET',
           data:{
                name
           },
           async:true,
           success:function(data){
               console.log(data.data);
                $('#list-comment').html('');
                $.each(data.data, function(index , value){
                    var listComment = `
                    <tr>
                    <td>${value.name}</td>
                    <td><a href="">edit</a></td>
                    <td><a href="">delete</a></td>
                    </tr>`;

                    $('#list-comment').append(listComment);
                });
               
           }
       })
   })

   $('#createComment').click(function(){
       var name = $('#create-name').val();
       var content = $('#create-content').val();
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var url = $(this).attr('data-url');
        $.ajax({
            url:url,
            type:'POST',
            data:{
                 name,
                 content
            },
            async:true,
            success:function(data){
                if(data.error){
                    if(data.error.name){
                        $('#error-name').text(data.error.name);
                        $('#error-name').css('color', 'red');
                    } else {
                        alert('thêm thành công');
                    }
                    if(data.error.content){
                        $('#error-content').text(data.error.content);
                        $('#error-content').css('color', 'red');
                    }                   
                } else {
                    alert('thêm thành công');
                }            
            }
        })
   })
})
