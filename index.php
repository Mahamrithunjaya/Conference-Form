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
                <select name="salutation" id="salut" onchange="validateSalutation()">
                  <option value="" selected="selected" >--Select--</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Mrs.">Mrs.</option>
                </select>
                <span id="salutaion-error"></span>
              </div> 

          <div class="input-group">
            <label><strong>First Name: <span class="mandate-fields">*</span></strong></label>
            <input type="text" placeholder="Enter Your First Name" name="fname" id="fname" value="<?= $firstName ?>" onkeyup="validateFName()">
            <span id="fname-error"></span>
          </div>
    
          <div class="input-group">
            <label><strong>Last Name: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="lname" id="lname" value="<?= $lastName ?>" onkeyup="validateLName()">
            <span id="lname-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Designation: *</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="desgnation" id="designation" value="<?= $designation ?>" onkeyup="validateDesignation()">
            <span id="designation-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Affilation:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="affliation" id="affiliation" value="<?= $affiliation ?>" onkeyup="validateAffiliation()">
            <span id="affiliation-error"></span>
          </div>
    
          <div class="input-group">
            <label><strong>Gender:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="gender" value="Male" value="<?= $gender ?>" onclick="validateGender()">
            <label>Male</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;"name="gender" value="Female" value="<?= $gender ?>" onclick="validateGender()">
            <label>Female</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;"name="gender" value="Others" value="<?= $gender ?>" onclick="validateGender()">
            <label>Others</label>
            <span id="gender-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Candidature:</strong></label>
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" id="candidature" value="Presenter" value="<?= $candidature ?>" onclick="validateCandidature()">
            <label>Presenter</label> 
            <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="candidature" id="candidature" value="Participant" value="<?= $candidature ?>" onclick="validateCandidature()">
            <label>Participant</label> 
            <span id="candidature-error"></span>
          </div> 

          <div class="input-group">
            <label><strong>Registration Fees:</strong></label>
            <input type="text" placeholder="Enter Your Last Name" name="regfee" id="regfee" value="<?= $regFees ?>" onkeyup="validateFees()">
            <span id="fee-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Payment Slip:</strong></label>
            <input type="file" accept="image/*,.pdf" name="payslip" id="payslip" value="<?= $paySlip ?>" onchange="validatePaySlip()">
            <span id="paySlip-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Contact Details:</strong></label>
            <input type="text" placeholder="Enter Your Address" name="contact-details" id="contact-details" value="<?= $contact ?>" onkeyup="validateAddress()">
            <span id="address-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Email Id:</strong></label>
            <input type="email" placeholder="Enter Your Email Id" name="email-id" id="email-id" value="<?= $email ?>" onkeyup="validateEmail()">
            <span id="email-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Mobile No.:</strong></label>
            <input type="tel" placeholder="Enter your mobile number" name="phone-no" id="phone-no" value="<?= $phoneNo ?>" onkeyup="validatePhone()">
            <span id="mobile-error"></span>
          </div>

          <div class="input-group">
            <label><strong>Food Preference:</strong></label>
            <select name="food-pref" id="food-pref" value="<?= $food ?>" onchange="validateFood()">
              <option value="X" selected="selected" >--Select--</option>
              <option value="Veg">VEG</option>
              <option value="Non Veg">NON VEG</option>
            </select>
            <span id="food-error"></span>
          </div> 

          <div class="input-group">
            <label><strong>Accomodation:</strong></label>
            <select name="accomodation-pref" id="accomodation-pref" value="<?= $accomodation ?>" onchange="validateAccomodation()">
              <option value="X" selected="selected">--Select--</option>
              <option value="Required">REQUIRED</option>
              <option value="Not required">NOT REQUIRED</option>
            </select>
            <span id="accomodation-error"></span>
          </div> 

          <div class="input-group">
            <input type="submit" name="submit-btn" class="form-button" value="SUBMIT" onclick="return validateForm()">
            <span id="submit-error"></span>
          </div>

      </form>

      </div>
      <script src="script.js"></script>
</body>
</html>
