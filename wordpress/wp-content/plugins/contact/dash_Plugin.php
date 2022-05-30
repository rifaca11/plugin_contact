<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

  <div class="container-fluid mt-5">
    <div class="row border-0 rounded shadow p-3">

      <h2 class="mb-5">Dashboar all messages</h2>
      <table class="">
        <thead>
          <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php

          global $wpdb;

          $query = "SELECT * FROM `wp_contact_form` order by id desc";
          $result = $wpdb->get_results($query);

          foreach ($result as $row) { ?>
            <tr>
              <td scope="col ml-3"><?php echo $row->first_name ?></td>
              <td scope="col ml-3"><?php echo $row->last_name ?></td>
              <td scope="col ml-3"><?php echo $row->email ?></td>
              <td scope="col ml-3"><?php echo $row->phone ?></td>
              <td scope="col ml-3"><?php echo $row->subject ?></td>
              <td scope="col ml-3"><?php echo $row->message ?></td>
              <td scope="col">
                <a href="./admin.php?page=contact-dashbord&id='.$row['id'].'" class="btn btn-sm btn-danger px-3"><span class="dashicons dashicons-trash"></span></a>
              </td>
            </tr>
          <?php } ?>
          <?php
          global $wpdb;

          if (isset($_GET['id']) && !empty($_GET['id'])) {
            $connection = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($connection, "plugin");
            $query = "DELETE FROM wp_contact_form WHERE id = " . $_GET['id'];
            mysqli_query($connection, $query);
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>


</body>

</html>