<?php include('header.php'); ?>
<?php include('nav.php'); ?>


<?php $row = $db->find('employees', $_GET['id']); ?>
<?php if (isset($_GET['id']) && is_numeric($_GET['id']) && $row) :  ?>

  <style>
    table,
    th,
    td {
      border: 1px solid black;
    }
  </style>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="p-3 col text-center mt-5 text-white bg-primary"> View Employee </h2>
      </div>
      <div class="col-sm-12">
        <table class="table table-dark">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Department</th>
            </tr>
          </thead>
          <tr>
            <td><?php echo strtoupper($row['name']); ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['department']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>


<?php else : ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="alert alert-danger mt-5 text-center"> Employee Not Found </h3>
      </div>
    </div>
  </div>


<?php endif;  ?>


<?php include('footer.php'); ?>