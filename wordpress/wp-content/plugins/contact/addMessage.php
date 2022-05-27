<?php

global $wpdb;
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $tablename = $wpdb->prefix."plugin";

  if($email != '' && $subject != '' && $message != ''){
     $data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
     if(count($data) == 0){
       $insert = "INSERT INTO ".$tablename."(email,subject,message) values('".$email."','".$subject."','".$message."') ";
       $wpdb->query($insert);
       echo "<script> alert('Sent sucessfully.');</script>";
     }
   }
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<h1>Add New Message</h1>
<form method='post' action=''>
  

      <input type='email' id="email" name='email' placeholder="Email .." class="input-form"> <br><br>
    
    <input type='text' id="subject" name='subject' placeholder="Subject .." class="input-form"><br><br>
 
    <input type='text' id="mssg" name='message' placeholder="Message .." class="input-form"><br><br>

     <span>&nbsp;</span>
     <input type='submit' name='submit' value='Send' class="btn btn-primary">
 

</form>


<script >
  // first name
  var email = document.getElementById('email');
  // var input_fname = document.getElementById('input_fname');
  const email_display = localStorage['email'];
  email.style.display = email_display;
  // input_fname.removeAttribute('required');
  var subject = document.getElementById('subject');
  // var input_fname = document.getElementById('input_fname');
  const sub_display = localStorage['subject'];
  subject.style.display = sub_display;
  var mssg = document.getElementById('mssg');
  // var input_fname = document.getElementById('input_fname');
  const mssg_display = localStorage['message'];
  mssg.style.display = mssg_display;
</script>