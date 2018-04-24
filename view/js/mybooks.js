// LOG IN FORM FUNCTION
$(function() {
	$("input[type='password'][data-eye]").each(function(i) {
		var $this = $(this);

		$this.wrap($("<div/>", {
			style: 'position:relative'
		}));
		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: 'Show',
			class: 'btn btn-primary btn-sm',
			id: 'passeye-toggle-'+i,
			style: 'position:absolute;right:10px;top:50%;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-o-transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
		}));
		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));
		$this.on("keyup paste", function() {
			$("#passeye-"+i).val($(this).val());
		});
		$("#passeye-toggle-"+i).on("click", function() {
			if($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
			}else{
				$this.attr('type', 'text');
				$this.val($("#passeye-"+i).val());
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
			}
		});
	});
});
// END OF LOG IN FORM FUNCTION


// function showMsg(BookID) {
//
// var updateUrl = "../../controller/processing.php?action_type=update&BookID=" + BookID;
//
//   $.ajax(
//     {
//       url: updateUrl,
//       method: 'post',
//       data: $('#update_form').serialize(),
//       //datatype: 'json',
//       success:function(result) {
// 				alert("Successfully updated");
//           // $("#message").html("Successfully updated");
//       },
//       error: function(error) {
// 				alert("Update error");
//           // $("#message").html("Update error");
//         }
// 	    }
// 	  );
// }



function deleteBook(BookID) {
  var x = confirm("Are you sure you want to delete?");
  if (x == true) {

      var deleteUrl = "../../controller/processing.php?action_type=delete&BookID=" + BookID;

      $.ajax(
        {
          url: deleteUrl,
          method: 'get',
          data: $('#showBooks_container').serialize(),
          datatype: 'json',
          success:function(result) {
              // $("#message2").html("deleted");
							console.log('deleted');
                var form = document.getElementById(BookID);
                if (form.parentNode) {
                form.parentNode.removeChild(form);
              };
          },
          error: function(error) {
              // $("#message2").html("error");
							console.log('error');
            }
        }
      );
    }
}

// Check email if already exists
function checkemail() {

     var email=document.getElementById("username").value;

     if(email)
     {
      $.ajax({
      type: 'post',
      url: '../../controller/checkdata.php',
      data: {
       user_name:email,
      },
			// datatype: 'json',
      success: function (response) {
       $('#email_status').html(response);
				 if(response=="")
	       {
	        return true;
	       }
	       else
	       {
	        return false;
	       }
			 }
		});
	}
	else
	{
		$('#email_status').html("");
		return false;
	}
}
// END Check email if already exists


$(document).ready(function (e) {

		// Function to preview image after validation
		// $(function() {
		$("#file").change(function() {
		// $("#message").empty(); // To remove the previous error message
		var file = this.files[0];
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
		{
		$('#previewing').attr('src','../images/default.png');
		// $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
		alert("Please select a valid image file! Note: only jpeg, jpg and png image types allowed");
		return false;
		}
		else
		{
		var reader = new FileReader();
		reader.onload = imageIsLoaded;
		reader.readAsDataURL(this.files[0]);
		}
		});
		// });
		function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '240px');
		$('#previewing').attr('height', '280px');
		};
});


// disable one checkbox if other is checked
$(function(){
  $('#admin').on('click',function(){
    if($(this).is(':checked') === true){
       $('#employee').prop('disabled','disabled');
    }else{
      $('#employee').prop("disabled", false);
    }
  });

	$('#employee').on('click',function(){
		if($(this).is(':checked') === true){
			 $('#admin').prop('disabled','disabled');
		}else{
			$('#admin').prop("disabled", false);
		}
	});
});
