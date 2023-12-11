<?php
	$name_err = "";
	$address_err = "";
	$salary_err = "";
	
	$name      = "";
	$address   = "";
	$salary    = "";

    $error     =  0;   

	include 'db/MClass.php';
	$obj = new MClass();
	$conn = $obj ->connect(); 
	if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] =='POST'  ) {
        if($_POST['name'] =="") {
            $name_err   = "Name is required"; 
            $error      =  1;           
        }
        if($_POST['address'] =="") {
            $address_err   = "Address is required";  
            $error         =  1;               
        }
        if($_POST['salary'] =="") {
            $salary_err     = "Salary is required";  
            $error          =  1;               
        } else if($_POST['salary'] !="" && is_nan($_POST['salary'])) {
            $salary_err     = "Salary shold be a number";  
            $error          =  1;               
        }
        $name       = $_POST['name'];
        $address    = $_POST['address'];
        $salary     = $_POST['salary'];
        if($error == 0) {
            $obj ->insertData('employees',$_POST,$conn);
        }
    }
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Employee</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>