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
                <select name="salutation" id="salut">
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
            <input type="text" placeholder="Enter Your First Name" name="fname" value="<?= $firstName ?>"onkeyup="validateFName()">
            <span> <?= $firstNameErr;?></span>
          </div>
    
          <div class="input-group">
            <label><strong>Last Name: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="lname" value="<?= $lastName ?>"onkeyup="validateLName()">
            <span><?= $lastNameErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Designation: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="desgnation" value="<?= $designation ?>" onkeyup="validateLName()">
            <span><?= $designationErr;?></span>
          </div>
          <div class="input-group">
            <label><strong>Affilation:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="affliation" value="<?= $affiliation ?>"onkeyup="validateLName()">
            <span>*<?= $affiliationErr;?></span>
          </div>
    
          <div class="input-group">
            <label><strong>Gender:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="gender" value="Male" value="<?= $gender ?>">
            <label>Male</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;"name="gender" value="Female" value="<?= $gender ?>">
            <label>Female</label> 
            <span id="gender-error"><?= $genderErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Candidature:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" value="Presenter" value="<?= $candidature ?>">
            <label>Presenter</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" value="Participant" value="<?= $candidature ?>">
            <label>Participant</label> 
            <span id="gender-error"></span>
          </div> 

          <div class="input-group">
            <label><strong>Registration Fees:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="regfee" value="<?= $regFees ?>">
            <span id="lname-error"><?= $regFeesErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Payment Slip:</strong></label>
            <input type="file" accept="image/*,.pdf" name="payslip" value="<?= $paySlip ?>">
            <span id="lname-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Contact Details:</strong></label>
            <input type="text" placeholder="Enter Your Address" name="contact-details" value="<?= $contact ?>">
            <span id="address-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Email Id:</strong></label>
            <input type="email" placeholder="Enter Your Email Id" name="email-id" value="<?= $email ?>">
            <span id="email-error"><?= $emailErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Mobile No.:</strong></label>
            <input type="tel" placeholder="Enter your mobile number" name="phone-no" value="<?= $phoneNo ?>">
            <span id="mobile-error"><?= $phoneNoErr;?></span>
          </div>

          <div class="input-group">
            <label><strong>Food Preference:</strong></label>
            <select name="food-pref" value="<?= $food ?>">
              <option value="q" selected="selected" >--Select--</option>
              <option value="Veg">VEG</option>
              <option value="Non Veg">NON VEG</option>
            </select>
          </div> 

          <div class="input-group">
            <label><strong>Accomodation:</strong></label>
            <select name="accomodation-pref" value="<?= $accomodation ?>">
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
