<!DOCTYPE html>
<html lang="en">
<head>
<title>SmartHealth: Contact Us</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../deCss.css">
<style>
input {display: block;
       margin-bottom: 1em; }
label { float: left;
        width: 5em;
		padding-right: 1em;
		text-align: right; }
#submit { margin-left: 7em; }		
</style>
<script>
function validateForm() {
if (document.forms[0].userName.value == "") {
    alert("Name field cannot be empty.");
    return false;
}
alert ("Name and student ID are valid.");
return true;
}
</script>
</head>
<body id="flat">
<div id="wrapper">
<nav>
<ul>
<li><a href="index.php"><img src="logo.png" alt="company logo" width="120" height="60"></a></li>
       <li class="navfont"><a href="register.php">Register</a></li>
       <li class="navfont"><a href="login.php">Login</a></li>
       <li class="navfont"><a href="aboutUs.php">About Us</a></li> 
       <li class="navfont"><a href="contact.php">Contact</a></li> 
</ul>
</nav>
<main>
<h1>Contact Us</h1><br>

<form method="post"
      action="http://webdevbasics.net/scripts/demo.php"
      onsubmit="return validateForm();">
<label for="First Name">*First Name: </label>&nbsp;
<input type="text" name="First Name" id="First Name" required> &nbsp;
<label for="Last Name">*Last Name: </label>&nbsp;
<input type="text" name="Last Name" id="Last Name" required>&nbsp;
<label for="Email">*E-mail: </label>&nbsp;
<input type="email" name="Email" id="Email"required>
<label for="Phone">*Phone: </label>&nbsp;
<input type="tel" name="Phone" id="Phone" required>
<label for="Comment">Comments: </label><br>
<textarea name="myComments" id="myComments" rows="5" cols="100"
            required="required"></textarea>

<input type="submit" value="Send Information" id="mySubmit"><br>
</form>
<div> 
<small>Kwantlen Polytechnic University<br>
12666 72 Ave<br>
Surrey, BC<br>
V3W2M8<br>
<a href="index.html">555-555-5555</a><br>
</small></div>
</main>
</div>
</body>
<footer>
<small><strong>Copyright &copy; 2018 Smart Health Inc.</strong></small><br>
</footer>