<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php  
        $host="localhost";//host name  
        $username="root"; //database username  
        $word="";//database word  
        $db_name="plugin";//database name  
        $tbl_name="contact"; //table name  

        $con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  

        if(isset($_POST['sub']))  
        {  
            $checkbox1=$_POST['champ'];  
            $chk="";  
            foreach($checkbox1 as $chk1)  
            {  
                $chk .= ",".$chk1;  
            }  
            $in_ch=mysqli_query($con,"update $tbl_name set champ='$chk' where id='1'");  

        }  

        $result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE id='1'")->fetch_all();
        $array = explode(",", $result[0][1]);
?>  
<body>
<h1>Contact form Plugin</h1>

<!-- check box -->
<form action="" method="post">
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="fname" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "fname") {
                    echo "checked";
                }
            }
        ?> 
        >
        <label for="checkbox">first name</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="lname" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "lname") {
                    echo "checked";
                }
            }
        ?> 
        >
        <label for="checkbox">last name</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="email" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "email") {
                    echo "checked";
                }
            }
        ?>
        >
        <label for="checkbox">Email</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="phone" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "phone") {
                    echo "checked";
                }
            }
        ?>
        >
        <label for="checkbox">Phone</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="subject" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "subject") {
                    echo "checked";
                }
            }
        ?>
        >
        <label for="checkbox">Subject</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="champ[]" value="message" 
        <?php 
            for ($i=0; $i < count($array); $i++) { 
                if($array[$i] == "message") {
                    echo "checked";
                }
            }
        ?>
        >
        <label for="checkbox">Message</label>
    </div>
    <input type="submit" value="submit" name="sub" class="btn btn-primary mt-4">
</form>

<?php include_once 'dash_Plugin.php' ; ?>
</body>

</html>