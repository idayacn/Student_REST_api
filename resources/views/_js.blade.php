<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<script type="text/javascript">
	$( document ).ready(function() {

		let endpoint = 'http://localhost:8000/api'
		var api_token = $('._apri_token').val();

		

		

			
	    $('.pass_error').empty();

	    // var csrftoken = $('#_token').val();

	    $.ajax({
	        url: endpoint + "/get_subjects",
	        type: "GET",
	        contentType: "application/json",
	        dataType: 'json',
	        // data:{
	        // 	csrftoken:csrftoken,
	        // },
	        success: function(result){
                // console.log(result);
                
                $.each(result , function (key, value) {
		        	$('#subjects').append(`
		        		<option value="${value.id}">
	                       	${value.title}
	                  	</option>`
	                );
	        	});
	        	$.each(result , function (key, value) {
		        	$('#subjects_edit').append(`
		        		<option value="${value.id}">
	                       	${value.title}
	                  	</option>`
	                );
	        	});
	       	},
	       	beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }
	    });

	    $.ajax({
	        url: endpoint + "/get_other_subjects",
	        type: "GET",
	        contentType: "application/json",
	        dataType: 'json',
	        success: function(result){
                
            $.each(result , function (key, value) {            	
            	
	        	$('#more_subj_data').append(`
                  	<tr>
                		<th width="5%">${value.id}</th>
                		<td width="45%">${value.title}</td>
                		<td width="50%"><span class="badge badge-success subscribe" style="cursor: pointer;" data-id="${value.id}" data-name="1">Subscribe</span> </td>
              		</tr>`
	                );
	        	});
	       	},
	       	beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }

	    });

if(api_token == "" || api_token == undefined){
			console.log('Please login');
		}else{

	    $.ajax({
	        url: endpoint + "/get_user_data",
	        type: "GET",
	        contentType: "application/json",
	        dataType: 'json',
	        success: function(result){
                console.log(result);
            $('#full_name').text(result.profile_data.first_name);
            $('#usr_id').text(result.profile_data.user_id);
            $('#f_name').text(result.profile_data.first_name);
            $('#l_name').text(result.profile_data.last_name);
            $('#email_id').text(result.profile_data.email);
            $('#grade').text(result.profile_data.grade);
            $('#dob').text(result.profile_data.dob);
            $('#qualification').text(result.profile_data.qualification);


            $('#input_qualification_edit').val(result.profile_data.qualification);
            $('#departement_edit').val(result.profile_data.grade);
            $('#input_dob_edit').val(result.profile_data.dob);
            $('#input_email_edit').val(result.profile_data.email);
            $('#last_name_edit').val(result.profile_data.last_name);
            $('#first_name_edit').val(result.profile_data.first_name);
            // $('#subjects_edit').text();
            $('#input_email_edit').prop( "disabled", true );


	            if(result.role_id == 1){
	            	$('#dob_tr').hide();
	            	$('#qal_tr').hide();
	            	$('#view_std_info').hide();
	            	$('#dob_edit').hide();
	            	$('#qal_edit').hide();
	            	$('#std_subj').hide();
	            }
	       	},
	       	beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }

	    });

	    $.ajax({
	        url: endpoint + "/get_student_subjects",
	        type: "GET",
	        contentType: "application/json",
	        dataType: 'json',
	        success: function(result){
                console.log(result);
            $.each(result , function (key, value) {

            	// var tgStr = '<span class="badge badge-warning" style="cursor: pointer;">Unsubscribe</span>';

            	var tgStr = '<span class="badge badge-warning add_fav" style="cursor: pointer;" data-id="'+value.id+'" data-name="0">Remove fav</span>'

            	if(value.is_favorite == 0){
            		tgStr = '<span class="badge badge-info add_fav" style="cursor: pointer;" data-id="'+value.id+'" data-name="1">Add to fav</span>'
            	}

	        	$('#subj_data').append(`
                  	<tr>
                		<th width="5%">${value.id}</th>
                		<td width="45%">${value.title}</td>
                		<td width="50%"><span class="badge badge-warning subscribe" style="cursor: pointer;" data-id="${value.id}" data-name="0">Unsubscribe</span> : ${tgStr} </td>
              		</tr>`
	                );
	        	});
	       	},
	       	beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }

	    });


	   }

	    $(document).on('click','.reg_user',function(){

	    	var password = $('.password').val();
	    	var first_name = $('.first_name').val();
	    	var last_name = $('.last_name').val();
	    	var user_type = $('input[name="user_type"]:checked').val();
	    	var email_id = $('.email_id').val();
	    	var DOB = $('.dob').val();
	    	var confirmpassword = $('.confirm_password').val();
	    	var grade = $('.grade').val();
	    	var qualification = $('.qualification').val();	    	

	    	var selectedsubjects = [];
	        $('#subjects :selected').each(function(i, selected) {
	            selectedsubjects[i] = $(selected).val();
	        });

	    	if(password != confirmpassword || password == "" || confirmpassword == "") {
	    		$('.pass_error').text('Password did not match !');
	    		return false;
	    	}
	    	else{
	    		$.ajax({
			        url: endpoint + "/save_user",
			        type: "POST",
			        // contentType: "application/json",
			        dataType: 'json',
			        data:{
			        	first_name : first_name,
			        	last_name : last_name,
			        	user_type : user_type,
			        	email_id : email_id,
			        	DOB : DOB,
			        	grade : grade,
			        	qualification: qualification,
			        	selectedsubjects: selectedsubjects,
			        	confirmpassword : confirmpassword,
			        },
			        success: function(result){
			            // console.log(result);
			            window.location.href = "/";
			        },
			        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }
			    });
	    	}
	    });

	    $(document).on('click','.update_user',function(){
	    	
	    	var first_name = $('.first_name_edit').val();
	    	var last_name = $('.last_name_edit').val();  
	    	var DOB = $('.input_dob_edit').val();	    	
	    	var grade = $('.departement_edit').val();
	    	var qualification = $('.input_qualification_edit').val();	

    		$.ajax({
		        url: endpoint + "/update_user",
		        type: "POST",
		        // contentType: "application/json",
		        dataType: 'json',
		        data:{
		        	first_name : first_name,
		        	last_name : last_name, 
		        	grade : grade,      	
		        },
		        success: function(result){
		            // console.log(result);
		            window.location.href = "/";
		        },
		        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }
		    });
	    });

	    $(document).on('click','.subscribe',function(){
	    	id = $(this).attr('data-id');
	    	status_code = $(this).attr('data-name');
	    	console.log('subscribe'+status_code);
	    	$.ajax({
		        url: endpoint + "/subscribe_subject/"+id,
		        type: "POST",
		        // contentType: "application/json",
		        dataType: 'json',
		        data:{		        	
		        	status_code : status_code,      	
		        },
		        success: function(result){
		            // console.log(result);
		            window.location.href = "/";
		        },
		        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }
		    });
	    })
	    $(document).on('click','.add_fav',function(){
	    	id = $(this).attr('data-id');
	    	status_code = $(this).attr('data-name');
	    	console.log('add_fav'+id);
	    	$.ajax({
		        url: endpoint + "/add_fav/"+id,
		        type: "POST",
		        // contentType: "application/json",
		        dataType: 'json',
		        data:{		        	
		        	status_code : status_code,      	
		        },
		        success: function(result){
		            // console.log(result);
		            window.location.href = "/";
		        },
		        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + api_token ); }
		    });
	    })
	});
</script>