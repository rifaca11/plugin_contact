<?php

global $wpdb;
$tablename = $wpdb->prefix."plugin";
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$id);
}
?>
 
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h1>All Messsages</h1>
<table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col">Id</th>
    <th scope="col">email</th>
    <th scope="col">Subject</th>
    <th scope="col">Message</th>
    <th scope="col">Action</th>
  </tr>
  </thead>
  <?php

  $messagesLists = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($messagesLists) > 0){
    $count = 1;
    foreach($messagesLists as $message){
      $id = $message->id;
      $email = $message->email;
      $subject = $message->subject;
      $message = $message->message;

      echo "<th scope='row'>
      <tr>
      <td>".$count."</td>
      <td>".$email."</td>
      <td>".$subject."</td>
      <td>".$message."</td>
      <td>
      <form action='' method='POST'>
        <input type='text' name='id' value='$id' hidden> 
        <button type='submit' class='btn btn-danger' name=''>Delete</button> 
      </form> 
    </td>
      </tr>
       </th>
      
      ";
      $count++;
   }
 }
 else
 {
   echo "<tr><td colspan='5'>No Messages</td></tr>";
 }
?>
</table>