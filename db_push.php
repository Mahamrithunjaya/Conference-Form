<?php include("connect.php"); ?>
<?php

    if(isset($_POST['submit-btn']))
    {
        $salutaion = $_POST['salutation'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $designation = $_POST['desgnation'];
        $affiliation = $_POST['affliation'];
        $gender = @$_POST['gender'];
        $candidature = @$_POST['candidature'];
        $reg_fees = $_POST['regfee'];

        $filename = $_FILES["payslip"]["name"];
        $temp_file_name = $_FILES["payslip"]["tmp_name"];
        $folder_name = "pay_slips/".$filename;
        move_uploaded_file($temp_file_name, $folder_name);

        $db_filename = $first_name."_".$filename;

        $contact_details = $_POST['contact-details'];
        $email_id = $_POST['email-id'];
        $phone_no = $_POST['phone-no'];
        $food_pref = $_POST['food-pref'];
        $accomodation_pref = $_POST['accomodation-pref'];
        $success = '';
        if($salutaion != "" && $first_name != "" && $last_name != "" && $designation != "" && $affiliation != "" && $gender != "" && $candidature != "" && 
        $reg_fees != "" && $filename != "" && $contact_details != "" && $email_id != "" && $phone_no != "" && $food_pref != "" && $accomodation_pref != "")
        {

            $EMAIL_CHECK = "SELECT `emailId` FROM `ss_form` WHERE `emailId` = ? Limit 1";
            $query = "INSERT INTO `ss_form`(`salutation`, `fname`, `lname`, `designation`, `affiliation`, `gender`, `candidature`, `registratonfees`,
                                            `paymentslip`, `contactdetails`, `emailId`, `mobileNum`, `food`, `accomodation`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $connection->prepare($EMAIL_CHECK);
            $stmt->bind_param("s", $email_id);
            $stmt->execute();
            $stmt->bind_result($email_id);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum == 0){

                $stmt->close();

                $success = 'success';
                $hide = 1;

                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssssssisssiss", $salutaion, $first_name, $last_name, $designation, $affiliation, $gender, 
                $candidature, $reg_fees, $db_filename, $contact_details, $email_id, $phone_no, $food_pref, $accomodation_pref);
                $stmt->execute();
                
                // $query = "INSERT INTO `ss_form`(`salutation`, `fname`, `lname`, `designation`, `affiliation`, `gender`, `candidature`, `registratonfees`,
                //                             `paymentslip`, `contactdetails`, `emailId`, `mobileNum`, `food`, `accomodation`) 
                //         VALUES ('$salutaion', '$first_name', '$last_name', '$designation', '$affiliation', '$gender', 
                //         '$candidature', '$reg_fees', '$filename', '$contact_details', '$email_id', '$phone_no', '$food_pref', '$accomodation_pref')";
                // mysqli_query($connection, $query);

                echo '<div class="container" style="background-color: green; color: white;">Thank you <strong>'.$first_name. ' ' .$last_name. '.</strong> <br> Your registration is successful ... <span style="font-size:50px;">&#128077;</span></div>';
            } else{
                echo '<span id="submit-error">Email Already used by some one</span>';
            }

            $stmt->close();
            $connection->close();

        }
    }
    else{
        $success = '';
    }
?>