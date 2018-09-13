
$(document).ready(function() {

  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = '*missing*';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	

    $.ajax({
        url: "http://localhost/app/fetch_record.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#id_").val(obj.invoice);
          $("#total").val(obj.total);
          $("#name").val(obj.name);
          $("#amount").val(obj.amount);
          $("#fname").val(obj.fname);
          $("#lname").val(obj.lname);
         // $("#mode").val(obj.mode);
          $("#tenant_id").val(obj.tenant_id);
		  $("#period").val(obj.period);
		  $("#id_unit").val(obj.id_unit);
          }
        }
      });
  })// end of edit button action

  $('#update_record').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var total=$("#total").val();
    var amount=$("#amount").val();
    var responsible=$("#responsible").val();
    var mode=$("#mode").val();
    var payment_ref=$("#payment_ref").val();
    var tenant_id=$("#tenant_id").val();
	var period=$("#period").val();
    var id_unit=$("#id_unit").val();

    $.ajax({
        url: "http://localhost/app/update_record.php",
        type: "POST",
        data: {
           id_:id_,
           payment_ref:payment_ref,
           total:total,
           amount:amount,
           responsible:responsible,
           mode:mode,
           tenant_id:tenant_id,
		   period:period,
		   id_unit:id_unit
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })// end of update button action add_expenses
  
   $('#add_expenses').click(function () {

    var id_=$("#id_").val();
    var property=$("#property").val();
    var due_date=$("#due_date").val();
	var unit=$("#unit").val();
    var details=$("#details").val(); 
	var payee=$("#payee").val();
    var responsible=$("#responsible").val();
    var cost=$("#cost").val();
  

    $.ajax({
        url: "http://localhost/app/ajax/new_expense.php",
        type: "POST",
        data: {
           id_:id_,
           property:property,
           due_date:due_date,
           details:details,
		   payee:payee,
		   unit:unit,
           responsible:responsible,
           cost:cost
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })
    $('#update_user').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var email=$("#email").val();
    var phone_number=$("#phone_number").val();
    var country=$("#country").val();
    var company=$("#company").val();
    var role=$("#role").val();

    $.ajax({
        url: "http://localhost/app/ajax/update_profile.php",
        type: "POST",
        data: {
           username:id_,
           fname:fname,
           lname:lname,
           email:email,
           phone_number:phone_number,
           country:country,
           company:company,
		   role:role
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })
   $('#update_unit').click(function () {

    var id_=$("#id_").val();
    var type=$("#type").val();
    var beds=$("#beds").val();
    var email=$("#email").val();
    var rent=$("#rent").val();
    var country=$("#country").val();
    var company=$("#company").val();
    var role=$("#role").val();

    $.ajax({
        url: "http://localhost/app/ajax/update_unit.php",
        type: "POST",
        data: {
           id:id_,
           type:type,
           beds:beds,
           rent:rent,
           
           country:country,
           company:company,
		   role:role
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })
  $('#delete_record').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var total=$("#total").val();
    var amount=$("#amount").val();
    var responsible=$("#responsible").val();
    var mode=$("#mode").val();
    var payment_ref=$("#payment_ref").val();
    var tenant_id=$("#tenant_id").val();

    $.ajax({
        url: "http://localhost/app/ajax/delete_record.php",
        type: "POST",
        data: {
           id_:id_,
           payment_ref:payment_ref,
           total:total,
           amount:amount,
           responsible:responsible,
           mode:mode,
           
           tenant_id:tenant_id
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })
   $('#delete_user').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var total=$("#total").val();
    var amount=$("#amount").val();
    var responsible=$("#responsible").val();
    var mode=$("#mode").val();
    var payment_ref=$("#payment_ref").val();
    var tenant_id=$("#tenant_id").val();

    $.ajax({
        url: "http://localhost/app/ajax/delete_user.php",
        type: "POST",
        data: {
           id_:id_,
           payment_ref:payment_ref,
           total:total,
           amount:amount,
           responsible:responsible,
           mode:mode,
           
           tenant_id:tenant_id
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })
  
    $('#add_unit_edit').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
			
            var url = "http://localhost/app/ajax/add_unit.php";
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    var messageAlert = 'alert-' + data;
                    var messageText = data;
                    //alert(data);
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#add_unit_edit').find('.messages').html(alertBox);
                        //$('#edit_tentant')[0].reset();
						
                    }
                }
            });
            return false;
        }
    });

  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = '*missing*';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	

    $.ajax({
        url: "http://localhost/app/ajax/fetch_expense.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#id_").val(obj.id);
          $("#payee").val(obj.payee);
          $("#due_date").val(obj.due_date);
          $("#credit").val(obj.credit);
          $("#fname").val(obj.fname);
          $("#lname").val(obj.lname);
         // $("#mode").val(obj.mode);
          $("#tenant_id").val(obj.tenant_id);
          }
        }
      });
  })
  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = '*missing*';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	
	

    $.ajax({
        url: "http://localhost/app/ajax/fetch_request.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#id_").val(obj.id);
          $("#property").val(obj.property);
          $("#due_date").val(obj.due_date);
          $("#unit").val(obj.unit);
          $("#details").val(obj.details);
          $("#payee").val(obj.payee);
         // $("#mode").val(obj.mode);
          $("#tenant_id").val(obj.tenant_id);
          }
        }
      });
  })
  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = '*missing*';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	

    $.ajax({
        url: "http://localhost/app/ajax/fetch_user.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#id_").val(obj.username);
          $("#email").val(obj.email);
          $("#fname").val(obj.fname);
          $("#country").val(obj.nationality);
          $("#role").val(obj.role);
          $("#lname").val(obj.lname);
         $("#company").val(obj.company);
          $("#phone_number").val(obj.phone);
          }
        }
      });
  })
  $('#delete_expense').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var total=$("#total").val();
    var amount=$("#amount").val();
    var responsible=$("#responsible").val();
    var mode=$("#mode").val();
    var payment_ref=$("#payment_ref").val();
    var tenant_id=$("#tenant_id").val();

    $.ajax({
        url: "http://localhost/app/ajax/delete_expense.php",
        type: "POST",
        data: {
           id_:id_,
           payment_ref:payment_ref,
           total:total,
           amount:amount,
           responsible:responsible,
           mode:mode,
           
           tenant_id:tenant_id
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  }) 
  
	$('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = 'payexpense';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	

    $.ajax({
        url: "http://localhost/app/ajax/fetch_expense.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#expense_id").val(obj.id);
          $("#responsible").val(obj.payee);
          $("#due_date").val(obj.due_date);
          $("#amount").val(obj.credit);
          $("#property").val(obj.property);
          $("#lname").val(obj.lname);
         // $("#mode").val(obj.mode);
          $("#tenant_id").val(obj.tenant_id);
          }
        }
      });
  })
  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var my_id = 'payexpense';

    if (typeof $(this).data('my-id') !== 'undefined') {
      my_id = $(this).data('my-id');
    }
	

    $.ajax({
        url: "http://localhost/app/ajax/fetch_unit.php",
        type: "POST",
        dataType: 'json',
        data: {
          id:my_id
        },
        success: function(result){
          for(var i = 0; i < result.length; i++) {
          var obj = result[i];

          $("#id_").val(obj.unit_id);
          $("#type").val(obj.unit_type);
          $("#beds").val(obj.bed);
          $("#rent").val(obj.rent);
          $("#property").val(obj.property);
          $("#lname").val(obj.lname);
         // $("#mode").val(obj.mode);
          $("#tenant_id").val(obj.tenant_id);
          }
        }
      });
  })
  $('#payexpenses').click(function () {

    var id_=$("#id_").val();
    var fname=$("#fname").val();
    var total=$("#total").val();
    var amount=$("#amount").val();
    var responsible=$("#responsible").val();
    var mode=$("#mode").val();
    var payment_ref=$("#payment_ref").val();
    var property=$("#property").val();

    $.ajax({
        url: "http://localhost/app/ajax/payexpense.php",
        type: "POST",
        data: {
           id_:id_,
           payment_ref:payment_ref,
           total:total,
           amount:amount,
           responsible:responsible,
           mode:mode,
           property:property
        },
        success: function(result){
          console.log("Update response: "+result);
        }
      });
  })// end of update button ac
 
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
});
	  
