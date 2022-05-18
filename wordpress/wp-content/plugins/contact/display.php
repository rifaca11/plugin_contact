<?php
  require_once(ABSPATH . 'wp-config.php');
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  mysqli_select_db($connection, DB_NAME);

  if(isset($_POST['submitsup'])){
    $id=$_POST['id'];
    $query = "delete from `contact` where id=".$id;
    mysqli_query($connection,$query);
  }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Dashboard</title>
    <style>
    #popap
    {
        background-color:royalblue;
        width: 40%;
        height: 300px;
        color:white;
        margin-left: 24%;
        padding-top: 3%;
        padding-left: 5%;
        display: none;
    }
    
    </style>
</head>

<body>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">UserName</th>
                <th scope="col">FisertName</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
                <th scope="col">Reponse</th>
            </tr>
        </thead>

        <tbody>
            <?php
            
            require_once(ABSPATH . 'wp-config.php');
            $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            mysqli_select_db($connection, DB_NAME);
            
            $query = "SELECT * FROM `contact`";
            $result = mysqli_query($connection, $query);
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["username"] .
                    '</td><td>' . $row["fname"] .
                    '</td><td>' . $row["email"] .
                    '</td><td>' . $row["subjecte"] .
                    '</td><td>' . $row["messagee"] .
                    '</td>
                    <td>
                      <form action="" method="post">
                        <input type="text" name="id" value="'.$row["id"] .'" hidden> 
                        <button type="submit" class="btn btn-danger" name="submitsup">Delete</button>
                      </form> 
                    </td>
                    <td>
                    
                        
                            <button type="submit" onclick="rep()" class="btn btn-success" name="submitrep">Reponse</button>
                       
                            </td>
                     </tr>';
            }
            ?>

        </tbody>


      

    </table>
    <div id="popap">
          <table>
              <tr>
                  <td>Subject: </td>
                  <td></td>
              </tr>
              <tr>
                  <td>Message:</td>
                  <td><textarea name="msg" id="msg" cols="40" rows="3"></textarea></td>
              </tr>
              <tr></tr>
              <tr >
                  <td>
                  <button type="submit" class="btn btn-success" onclick="rep()"  name="rep">Reponse</button></td>
                  <td>
                  <button type="submit" class="btn btn-danger" onclick="fermer()" name="fermer">fermer</button>
                  </td>
              </tr>
          </table>
    </div>


    <script>
        function fermer(){
            document.getElementById('popap').style.display="none";
        }


        function rep(){
            document.getElementById('popap').style.display="block";
        }
    </script>
</body>

</html>

