<?php
function insertcont()
{
  global $wpdb;

  if (isset($_POST['sub'])) {

    
    $fname = (isset($_POST['fname']))?$_POST['fname']:'';
    $lname = (isset($_POST['lname']))?$_POST['lname']:'';
    $email = (isset($_POST['email']))?$_POST['email']:'';
    $phone = (isset($_POST['phone']))?$_POST['phone']:'';
    $subj = (isset($_POST['subject']))?$_POST['subject']:'';
    $mess = (isset($_POST['message']))?$_POST['message']:'';

    $query = "INSERT INTO wp_contact_form (first_name, last_name, email, phone, subject, message) VALUES ('$fname', '$lname', '$email', '$phone', '$subj','$mess')";
    $wpdb->query($query);
  }
}
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="plugin";//database name  
$tbl_name="contact"; //table name  

$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  

$result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE id='1'")->fetch_all();
$array = explode(",", $result[0][1]);


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<form action="" method="post"  enctype="multipart/form-data" onsubmit="<?php insertcont() ?> ">
  <?php 
      for ($i=0; $i < count($array); $i++) { 
        switch ($array[$i]) {
          case 'fname':
            echo '<div class="form-group" id="name" >
                  <label class="mt-2" for="name">First Name:</label><br>
                  <input type="text" name="fname" class="w-100" required><br>
                </div>';

            break;
          case 'lname':
            echo '<div class="form-group" id="lname" >
                  <label class="mt-2" for="lname">Last Name:</label><br>
                  <input type="text" name="lname" class="w-100" required><br>
                </div>';

            break;

          case 'email':
            echo '<div class="form-group" id="email" >
                  <label class="mt-2" for="email">Email:</label><br>
                  <input type="text" name="email" class="w-100" required><br>
                </div>';
            break;

          case 'phone':
            echo '<div class="form-group" id="phone" >
                  <label class="mt-2" for="phone">phone:</label><br>
                  <input type="text" name="phone" class="w-100" required><br>
                </div>';

            break;
          case 'subject':
            echo '<div class="form-group" id="subject" >
                  <label class="mt-2" for="subject">subject:</label><br>
                  <input type="text" name="subject" class="w-100" required><br>
                </div>';

            break;
          case 'message':
            echo '<div class="form-group" id="message" >
                  <label class="mt-2" for="message">message:</label><br>
                  <input type="text" name="message" class="w-100" required><br>
                </div>';

            break;
        }
      }
  ?>

<input type="submit" class=" btn btn-primary mt-3" value="Send" name="sub">

</form>


