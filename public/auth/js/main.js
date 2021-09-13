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
(function($) {
    "use strict";
	
	// Options for Message
	//----------------------------------------------
  var options = {
	  'btn-loading': '<i class="fa fa-spinner fa-pulse"></i>',
	  'btn-success': '<i class="fa fa-check"></i>',
	  'btn-error': '<i class="fa fa-remove"></i>',
	  'msg-success': 'All Good! Redirecting...',
	  'msg-error': 'Wrong login credentials!',
	  'useAJAX': true,
  };

	// Login Form
	//----------------------------------------------
	// Validation
  $("#login-form").validate({
  	rules: {
      lg_username: "required",
  	  lg_password: "required",
    },
  	errorClass: "form-invalid"
  });
  
	// Form Submission
  $("#login-form").submit(function() {
  	remove_loading($(this));
		
		if(options['useAJAX'] == true)
		{
			// Dummy AJAX request (Replace this with your AJAX code)
		  // If you don't want to use AJAX, remove this
  	  dummy_submit_form($(this));
		
		  // Cancel the normal submission.
		  // If you don't want to use AJAX, remove this
  	  return false;
		}
  });
	
	// Register Form
	//----------------------------------------------
	// Validation
  $("#register-form").validate({
  	rules: {
      reg_username: "required",
  	  reg_password: {
  			required: true,
  			minlength: 5
  		},
   		reg_password_confirm: {
  			required: true,
  			minlength: 5,
  			equalTo: "#register-form [name=reg_password]"
  		},
  		reg_email: {
  	    required: true,
  			email: true
  		},
  		reg_agree: "required",
    },
	  errorClass: "form-invalid",
	  errorPlacement: function( label, element ) {
	    if( element.attr( "type" ) === "checkbox" || element.attr( "type" ) === "radio" ) {
    		element.parent().append( label ); // this would append the label after all your checkboxes/labels (so the error-label will be the last element in <div class="controls"> )
	    }
			else {
  	  	label.insertAfter( element ); // standard behaviour
  	  }
    }
  });

  // Form Submission
  $("#register-form").submit(function() {
  	remove_loading($(this));
		
		if(options['useAJAX'] == true)
		{
			// Dummy AJAX request (Replace this with your AJAX code)
		  // If you don't want to use AJAX, remove this
  	  dummy_submit_form($(this));
		
		  // Cancel the normal submission.
		  // If you don't want to use AJAX, remove this
  	  return false;
		}
  });

	// Forgot Password Form
	//----------------------------------------------
	// Validation
  $("#forgot-password-form").validate({
  	rules: {
      fp_email: "required",
    },
  	errorClass: "form-invalid"
  });
  
	// Form Submission
  $("#forgot-password-form").submit(function() {
  	remove_loading($(this));
		
		if(options['useAJAX'] == true)
		{
			// Dummy AJAX request (Replace this with your AJAX code)
		  // If you don't want to use AJAX, remove this
  	  dummy_submit_form($(this));
		
		  // Cancel the normal submission.
		  // If you don't want to use AJAX, remove this
  	  return false;
		}
  });

	// Loading
	//----------------------------------------------
  function remove_loading($form)
  {
  	$form.find('[type=submit]').removeClass('error success');
  	$form.find('.login-form-main-message').removeClass('show error success').html('');
  }

  function form_loading($form)
  {
    $form.find('[type=submit]').addClass('clicked').html(options['btn-loading']);
  }
  
  function form_success($form)
  {
	  $form.find('[type=submit]').addClass('success').html(options['btn-success']);
	  $form.find('.login-form-main-message').addClass('show success').html(options['msg-success']);
  }

  function form_failed($form)
  {
  	$form.find('[type=submit]').addClass('error').html(options['btn-error']);
  	$form.find('.login-form-main-message').addClass('show error').html(options['msg-error']);
  }

	// Dummy Submit Form (Remove this)
	//----------------------------------------------
	// This is just a dummy form submission. You should use your AJAX function or remove this function if you are not using AJAX.
  function dummy_submit_form($form)
  {
  	if($form.valid())
  	{
  		form_loading($form);
  		
  		setTimeout(function() {
  			form_success($form);
  		}, 2000);
  	}
  }
	
})(jQuery);
