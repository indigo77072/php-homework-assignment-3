<?php

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $company = trim($_POST['company']);
    $surveyInfo = $_POST['options'];
    $uname = trim($_POST['uname']);
    $pword = trim($_POST['pword']);
    $cpword = trim($_POST['cpword']);
    if($pword != $cpword){
        $passconfirm = "Your passwords do not match  ";
        echo "<font color='red'>" . $passconfirm . "</font><br/>";
    }
    if(empty($fname))
    {
      $empty_error = "First name is required" ;
      echo "<font color='red'>" . $empty_error . "</font>";
    }
    if(empty($lname))
    {
      $empty_error = "Last name is required  ";
      echo "<font color='red'>" . $empty_error . "</font>";
    }
    if(empty($uname))
    {
      $empty_error = "User name is required  ";
      echo "<font color='red'>" . $empty_error . "</font>";
    }
    if(empty($pword))
    {
      $empty_error = "password is required  ";
      echo "<font color='red'>" . $empty_error . "</font>";
    }
    if(empty($email))
    {
      $empty_error = "This field is required  ";
      echo "<font color='red'>" . $empty_error . "</font>";
    }
    //check if password is long enough
    if(strlen($pword) <= 8)
    {
      echo "Password is too short, must be at least 8 characters long  ";
    }

    if(!preg_match('/[A-Za-z]/', $pword) && !preg_match('/[0-9]/', $pword))
    {
      echo "password must contain capital letters and numbers  ";
    }
    $query="INSERT INTO citizens (first_name,lastname,email,company,survey_info) VALUES ('$fname','$lname','$email','$company','$surveyInfo')";
        $results = mysqli_query($conn, $query);
        echo('Information Sucessfully added to the database');
    }
}
?>