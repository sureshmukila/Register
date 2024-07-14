<?php
$servername = "localhost";
$username = "root";
$password = "ssroot";
$db = "ssbdetail";
$conn = mysqli_connect($servername, $username,
$password, $db);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$sql = "INSERT INTO detail (fname, emailid, subject, message) VALUES('$name', '$email', '$subject', '$message')"; 
if ($conn->query($sql) == true) 
{ 
 echo '<script language="javascript">';
echo 'alert("Register is applied successfully")';
echo '</script>';
header("location: index.php");
} 
else
{ 
 echo "ERROR: Could not able to execute $sql. "
 .$conn->error; 
} 
$conn->close(); 
}
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css"/>
<script language="JavaScript" type="text/javascript" src="badwords.js"></script>
<script language="javascript" type="text/javascript">
function Message()
{
var textbox_val=document.form.message.value;
if(textbox_val=="")
{
alert("Please enter a message");
return false;
}
bwords=badwords(textbox_val);
if(bwords>0)
{
alert("Your message contains inappropriate words. Please clean up your message.");
document.form.message.focus();
return false;
}
}
</script>
<style type="text/css">
body
{
font-family:'Georgia', Times New Roman, Times, serif;
}
.button3 {background-color: #008CBA;}
</style>
<style>
.regr{
	display: flex;
	justify-content: center;
	margin-top: 20px;
}
</style>
</head>
<body bgcolor="pink">
<div class="regr">Register Validation Onkeyup - Name,EmailAddress,Subject </div>
<div class="hero">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return Message();" name="form">
<div class="row">
<div class="input-group">
<input type="text" onkeyup="this.value=this.value.replace(/[^A-z ]/g,'');" name="name" required>
<label for="name">Full Name</label>
</div>
<div class="input-group">
<input type="text" name="email" onkeyup="this.value=this.value.replace(/[^A-z0-9@.]/g,'');"  required>
<label for="name">Email Address</label>
</div>
</div>
<div class="input-group">
<input type="text" name="subject" onkeyup="this.value=this.value.replace(/[^A-z 0-9]/g,'');" required>
<label for="name">Subject</label>
</div>
<div class="input-group">
<textarea name="message" rows="8" required></textarea>
<label for="name">Message</label>
</div>
<button class="button3" type="submit">Submit</button>
</form>
</div>
</body>
</html>
