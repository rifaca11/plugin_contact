<?php
if(isset($_POST['submit'])){
  
    wp_tab();
    insert_data();
}



function wp_tab(){

    // $connection = mysqli_connect('localhost','root','');
    // mysqli_select_db($connection,"plugin");
    require_once(ABSPATH . 'wp-config.php');
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($connection, DB_NAME);
  

    $sql = "CREATE TABLE contact(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(255) NOT NULL,fname varchar(255) NOT NULL,email varchar(55) NOT NULL,subjecte varchar(55) NOT NULL, messagee varchar(255) NOT NULL)";
    $result = mysqli_query($connection, $sql);
    return $result;

}

function insert_data(){
  require_once(ABSPATH . 'wp-config.php');
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  mysqli_select_db($connection, DB_NAME);
  // $connection = mysqli_connect('localhost','root','');
  // mysqli_select_db($connection,"plugin");

  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $subject = $_POST['sub'];
  $message = $_POST['message'];


    if(empty($username) || empty($fname) || empty($email) ||empty($subject) || empty($message))
    {
     echo '<h1 style="color:red;">All fields are required</h1>';
     
    }
    else
    {
        $to="darzezulte@tozya.com";
        $from=$_POST['email'];
        $subject=$_POST['sub'];
        $message=$_POST['message'];
        wp_mail($to,$from,$subject,$message);

         $query="INSERT INTO contact (username,fname,email,subjecte,messagee)" . "VALUES ('$username','$fname','$email','$subject','$message')";
         $result=mysqli_query($connection,$query);
         
    }
}

?>

<html>
<head>

</head>
<body> 
<div class="wrap">
 
  <h2>Plugin contact</h2>
 
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Enter your info</strong></h3>
      <form method="post" action="">
        <table class="form-table">
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="username" value="" style="width:350px;" placeholder="First name " /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="fname" value="" style="width:350px;" placeholder="Last name " /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><input type="email" name="email" value="" style="width:350px;" placeholder="Email" /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="sub" value="" style="width:350px;" placeholder="Subject" /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><textarea name="message" value="" style="width:350px;" placeholder="Message"></textarea></td>
          </tr>

          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;padding-bottom:10px;">
              <input type="submit" name="submit" value="Save" class="button-primary" style="width:10%;" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>