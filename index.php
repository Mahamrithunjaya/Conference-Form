<?php include("connect.php"); ?>
<?php include("db_push.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("form_validate.php");?>
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>
<body>

    <div class="form-container">
      <div class="logo-name">
        <label><img src="logo/logo.png" alt=""></label>
        <span class="conference-name">XYZ CONFERENCE NAME</span>
      </div>
      <div class="technical-sponsors">
        <h3>TECHNICAL SPONSER'S: 
          <span class="sponsors-name">XYZ</span>
          <span class="sponsors-name">XYZ</span>
        </h3>
      </div>
        <h1>Conference Registration Form</h1>
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          
          <p class="mandate-fields">* Fields are mandatory</p>
            <div class="input-group">
              <label><strong>Salutation: </strong></label>
                <select name="salutation" id="salut" value="<?php if (isset($salutation) && $success == '') {echo $salutation;}?>">
                  <option value="" selected="selected" >--Select--</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Mrs.">Mrs.</option>
                </select>
                <span id="country-error"></span>
              </div> 

          <div class="input-group">
            <label><strong>First Name: <span class="mandate-fields">*</span></strong></label>
            <input type="text" placeholder="Enter Your First Name" name="fname" value="<?php if (isset($firstname) && $success == '') {echo $firstname;}?>" onkeyup="validateFName()">
            <span> <?= $firstNameErr;?></span>
          </div>
    
          <div class="input-group">
            <label><strong>Last Name: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="lname" value="<?php if (isset($lastName) && $success == '') {echo $lastName;} ?>"onkeyup="validateLName()">
            <span><?= $lastNameErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Designation: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="desgnation" value="<?php if (isset($designation) && $success == '') {echo $designation;} ?>" onkeyup="validateLName()">
            <span><?= $designationErr;?></span>
          </div>
          <div class="input-group">
            <label><strong>Affilation:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="affliation" value="<?php if (isset($affiliation) && $success == '') {echo $affiliation;} ?>"onkeyup="validateLName()">
            <span>*<?= $affiliationErr;?></span>
          </div>
    
          <div class="input-group">
            <label><strong>Gender:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="gender" value="Male" value="<?php if (isset($gender) && $success == '') {echo $gender;} ?>">
            <label>Male</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;"name="gender" value="Female" value="<?php if (isset($gender) && $success == '') {echo $gender;} ?>">
            <label>Female</label> 
            <span id="gender-error"><?= $genderErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Candidature:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" value="Presenter" value="<?php if (isset($candidature) && $success == '') {echo $candidature;} ?>">
            <label>Presenter</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" value="Participant" value="<?php if (isset($candidature) && $success == '') {echo $candidature;} ?>">
            <label>Participant</label> 
            <span id="gender-error"></span>
          </div> 

          <div class="input-group">
            <label><strong>Registration Fees:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="regfee" value="<?php if (isset($regFees) && $success == '') {echo $regFees;} ?>">
            <span id="lname-error"><?= $regFeesErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Payment Slip:</strong></label>
            <input type="file" accept="image/*,.pdf" name="payslip" value="<?php if (isset($paySlip) && $success == '') {echo $paySlip;} ?>">
            <span id="lname-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Contact Details:</strong></label>
            <input type="text" placeholder="Enter Your Address" name="contact-details" value="<?php if (isset($contact) && $success == '') {echo $contact;} ?>">
            <span id="address-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Email Id:</strong></label>
            <input type="email" placeholder="Enter Your Email Id" name="email-id" value="<?php if (isset($email) && $success == '') {echo $email;} ?>">
            <span id="email-error"><?= $emailErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Mobile No.:</strong></label>
            <input type="tel" placeholder="Enter your mobile number" name="phone-no" value="<?php if (isset($phoneNo) && $success == '') {echo $phoneNo;} ?>">
            <span id="mobile-error"><?= $phoneNoErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Food Preference:</strong></label>
            <select name="food-pref" value="<?php if (isset($food) && $success == '') {echo $food;} ?>">
              <option value="q" selected="selected" >--Select--</option>
              <option value="Veg">VEG</option>
              <option value="Non Veg">NON VEG</option>
            </select>
          </div> 

          <div class="input-group">
            <label><strong>Accomodation:</strong></label>
            <select name="accomodation-pref" value="<?php if (isset($accomodation) && $success == '') {echo $accomodation;} ?>">
              <option value="q" selected="selected">--Select--</option>
              <option value="Required">REQUIRED</option>
              <option value="Not required">NOT REQUIRED</option>
            </select>
          </div> 

          <div class="input-group">
            <input type="submit" name="submit-btn" class="form-button" value="SUBMIT">
            <span id="submit-error"></span>
          </div>

      </form>

      </div>
</body>
</html>
