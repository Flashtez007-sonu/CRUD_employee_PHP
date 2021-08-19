<?php include('header.php'); ?>
<?php  $page_active = "add-employee"; ?>

<?php include('nav.php'); ?>





<?php

    if(isset($_POST['name'])){
        $name       = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $department = filter_var($_POST['department'],FILTER_SANITIZE_STRING);
        $password   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

        $db = new Database();
        $newPassword = $db->enc_password($password); // encrypt password
        $newPassword = 
        $sql = "INSERT INTO employees (`name`,`email`,`department`,`password`) 
        VALUES ('$name','$email','$department','$newPassword') ";
        $success = $db->addemployee($sql);
    }

?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Add New Employee </h2>
        </div>


        <div class="col-sm-12">
            <form name="myForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" id="department"  placeholder="Enter department">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>



  