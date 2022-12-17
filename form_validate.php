<?php


$firstNameErr = $lastNameErr = $designationErr = $affiliationErr = $genderErr = $regFeesErr = $paySlipErr = $emailErr = $phoneNoErr = "";
$salutation = $firstName = $lastName = $designation = $affiliation = $gender = $candidature = $regFees = $paySlip = $contact = $email = $phoneNo = $food = $accomodation = "";


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST["salutation"])){
        $salutation = "";
    } else {
      $salutation = test_input($_POST["salutation"]);
    }

    if(empty($_POST["fname"])){
        $firstNameErr = "First Name is required";
    } else{
        $firstName = test_input($_POST["fname"]);
        if(!preg_match("/^[A-Za-z]*$/", $firstName)){
            $firstNameErr = "Only letters are allowed";
        }
    }
    if(empty($_POST["lname"])){
        $lastNameErr = "Last Name is required";
    } else{
        $lastName = test_input($_POST["lname"]);
        if(!preg_match("/^[A-Za-z]*$/", $lastName)){
            $lastNameErr = "Only letters are allowed";
        }
    }
    
    if(empty($_POST["desgnation"])){
        $designationErr = "Designation is required";
    } else{
        $designation = test_input($_POST["desgnation"]);
        if(!preg_match("/^[A-Za-z]*$/", $designation)){
            $designationErr = "Only letters are allowed";
        }
    }
    
    if(empty($_POST["affliation"])){
        $affiliationErr = "Affiliation is required";
    } else{
        $affiliation = test_input($_POST["affliation"]);
        if(!preg_match("/^[A-Za-z]*$/", $affiliation)){
            $affiliationErr = "Only letters are allowed";
        }
    }
  
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
    
    if(empty($_POST["candidature"])){
        $candidature = "";
    } else {
      $candidature = test_input($_POST["candidature"]);
    }

    if(empty($_POST["regfee"])){
        $regFeesErr = "Paid Amount required";
    } else {
        $regFees = test_input($_POST["regfee"]);
        if(!preg_match("/^[0-9]{3,5}$/", $regFees)){
            $regFeesErr = "Please enter the correct amount";
        }
    }

    if(!isset($_FILES['payslip']) || $_FILES['payslip']['error'] != 0){
        // No file was uploaded or there was an error
        $paySlipErr = "Please upload the payment slip";
    } else {
        $file_size = $_FILES['payslip']['size'];   //To get the file size
        $file_type = $_FILES['payslip']['type'];  //To get the file type
        $filename = $_FILES["payslip"]["name"];  //To get the file name

        // Validate the file data
        if ($file_size > 1048576) {
            // File is too large
            $paySlipErr = "The file is too large (max 1MB)";
        } else if ($file_type != "application/pdf" && $file_type != "image/jpeg" && $file_type != "image/jpg") {
            // File is not a PDF or JPEG or JPEG
            $paySlipErr= "The file must be a PDF or JPEG or JPG";
        } else{
            // File is valid, so we can store it
            $paySlip = test_input($filename);
        }
    }

    if(empty($_POST["contact-details"])){
        $contact = "";
    } else {
      $contact = test_input($_POST["contact-details"]);
    }
  
    if (empty($_POST["email-id"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email-id"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if(empty($_POST["phone-no"])){
        $phoneNoErr = "Phone number is required";
    } else {
        $phoneNo = test_input($_POST["phone-no"]);
        if(!preg_match("/^[0-9]{10}$/", $phoneNo)){
            $phoneNoErr = "Only digits are allowed";
        }
    }

    if(empty($_POST["food-pref"])){
        $food = "";
    } else {
      $food = test_input($_POST["food-pref"]);
    }

    if(empty($_POST["accomodation-pref"])){
        $accomodation = "";
    } else {
      $accomodation = test_input($_POST["accomodation-pref"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>