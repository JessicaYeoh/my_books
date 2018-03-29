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

function showMsg(BookID) {

var updateUrl = "../../controller/edit_process.php?BookID=" + BookID;

  $.ajax(
    {
      url: updateUrl,
      method: 'post',
      data: $('#update_form').serialize(),
      //datatype: 'json',
      success:function(result) {
				alert("Successfully updated");
          // $("#message").html("Successfully updated");
      },
      error: function(error) {
				alert("Update error");
          // $("#message").html("Update error");
        }
    }
  );
}

function deleteUser(BookID) {
  var x = confirm("Are you sure you want to delete?");
  if (x == true) {

      var deleteUrl = "../../controller/delete_process.php?action_type=delete&BookID=" + BookID;
// $('#' + userID).html = 'foo';

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
