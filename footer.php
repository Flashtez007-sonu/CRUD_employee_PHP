  <!-- Latest compiled and minified JavaScript -->
  <script src="./js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./js/popper.min.js" ></script>
    <script src="./js/bootstrap.min.js" ></script>
    <script src="./js/a4794b9b18.js" ></script>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</body>
</html>

<script>

	$(function () {

    $('form').on('submit', function (e) {
    e.preventDefault();

   let name = document.forms["myForm"]["name"].value;
  if (name == "") {
    alert("Name must be filled out");
    return false;
  }

  if(name.length <= 3){
    alert("Name Must be Grater Than 3 chars !");
    return false;
  }
  let department = document.forms["myForm"]["department"].value;
  if (department == "") {
    alert("Department must be filled out");
    return false;
  }
  let email = document.forms["myForm"]["email"].value;
  if (email == "") {
    alert("Email must be filled out");
    return false;
  }

  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(!email.match(mailformat))
	{
	alert("Valid email address!");
	return true;
	}
    
  let password = document.forms["myForm"]["password"].value;
  if (password == "") {
    alert("Password must be filled out");
    return false;
  }
  
  if(password.length < 6) {
    alert("password Must be Grater Than 6 chars !");
    return false;
  }
     
         
	  $.ajax({
	    type: 'post',
	    url: 'add-employee.php',
	    data: $('form').serialize(),
	    success: function () {
        $('form').find('input:text, input:password, input:file, select, textarea').val('');
        $('form').find('input:radio, input:checkbox')
             .removeAttr('checked').removeAttr('selected');
        alert('form was submitted');
	    }
	  });
    });
   });
 
</script>

