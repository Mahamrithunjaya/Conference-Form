<?php include("connect.php"); ?>
<?php

    if(isset($_POST['submit-btn']))
    {
        $salutaion = $_POST['salutation'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $designation = $_POST['desgnation'];
        $affiliation = $_POST['affliation'];
        $gender = $_POST['gender'];
        $candidature = $_POST['candidature'];
        $reg_fees = $_POST['regfee'];

        $filename = $_FILES["payslip"]["name"];
        $temp_file_name = $_FILES["payslip"]["tmp_name"];
        $folder_name = "pay_slips/".$filename;
        move_uploaded_file($temp_file_name, $folder_name);

        $contact_details = $_POST['contact-details'];
        $email_id = $_POST['email-id'];
        $phone_no = $_POST['phone-no'];
        $food_pref = $_POST['food-pref'];
        $accomodation_pref = $_POST['accomodation-pref'];

        
        $query = "INSERT INTO `ss_form`(`salutation`, `fname`, `lname`, `designation`, `affiliation`, `gender`, `candidature`, `registratonfees`,
         `paymentslip`, `contactdetails`, `emailId`, `mobileNum`, `food`, `accomodation`) 
         VALUES ('$salutaion', '$first_name', '$last_name', '$designation', '$affiliation', '$gender', '$candidature', '$reg_fees',
         '$contact_details', '$email_id', '$phone_no', '$food_pref', '$accomodation_pref')";

        
        $data = mysqli_query($connection, $query);

        if($data){
            echo "Data inserted";
        } else{
            echo "Failed";
        }
    }
?>