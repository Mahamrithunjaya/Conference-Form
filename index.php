<?php include("connect.php"); ?>
<?php include("db_push.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once("form_validate.php"); ?>
  <link rel="stylesheet" href="style.css">
  <title>Registration Form</title>
</head>

<body>

  <div class="container">
    <div class="title">Conference Registration Form</div><br>
    <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

      <div class="input__box">
        <span><strong>Salutation: </strong></span>
        <select name="salutation" id="salut" onchange="validateSalutation()">
          <option value="" selected="selected">--Select--</option>
          <option value="Dr.">Dr.</option>
          <option value="Mr.">Mr.</option>
          <option value="Ms.">Ms.</option>
          <option value="Mrs.">Mrs.</option>
        </select>
        <span id="salutaion-error"></span>
      </div>
      <div class="user__details">

        <div class="input__box">
          <span><strong>First Name: <span class="mandate-fields">*</span></strong></span>
          <input type="text" placeholder="Enter Your First Name" name="fname" id="fname" value="<?= $firstName ?>" onkeyup="validateFName()">
          <span class="error-display" id="fname-error"></span>
        </div>

        <div class="input__box">
          <span><strong>Last Name: *</strong></span>
          <input type="text" placeholder="Enter Your Last Name" name="lname" id="lname" value="<?= $lastName ?>" onkeyup="validateLName()">
          <span id="lname-error"></span>
        </div>

        <div class="input__box">
          <span><strong>Designation: *</strong></span>
          <input type="text" placeholder="Enter Your Last Name" name="desgnation" id="designation" value="<?= $designation ?>" onkeyup="validateDesignation()">
          <span id="designation-error"></span>
        </div>

        <div class="input__box">
          <span><strong>Affilation:</strong></span>
          <input type="text" placeholder="Enter Your Last Name" name="affliation" id="affiliation" value="<?= $affiliation ?>" onkeyup="validateAffiliation()">
          <span id="affiliation-error"></span>
        </div>

        <div class="gender__details">
          <input type="radio" name="gender" id="dot-1" value="Male" value="<?= $gender ?>" onclick="validateGender()">
          <input type="radio" name="gender" id="dot-2" value="Female" value="<?= $gender ?>" onclick="validateGender()">
          <input type="radio" name="gender" id="dot-3" value="Others" value="<?= $gender ?>" onclick="validateGender()">
          <span class="gender__title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span>Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span>Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span>Others</span>
            </label>
          </div>
          <span id="gender-error"></span>
        </div>

        <div class="candidature__details">
          <input type="radio" name="candidature" id="dot-11" value="Presenter" value="<?= $candidature ?>" onclick="validateCandidature()">
          <input type="radio" name="candidature" id="dot-12" value="Participant" value="<?= $candidature ?>" onclick="validateCandidature()">
          <span class="candidature__title">Candidature</span>
          <div class="category">
            <label for="dot-11">
              <span class="dot one_one"></span>
              <span>Presenter</span>
            </label>
            <label for="dot-12">
              <span class="dot one_two"></span>
              <span>Participant</span>
            </label>
          </div>
          <span id="candidature-error"></span>
        </div>

        <div class="input__box">
          <span><strong>Registration Fees:</strong></span>
          <input type="text" placeholder="Enter Your Last Name" name="regfee" id="regfee" value="<?= $regFees ?>" onkeyup="validateFees()">
          <span id="fee-error"></span>
        </div>
        <div class="input__box">
          <span><strong>Payment Slip:</strong></span>
          <input type="file" accept="image/*,.pdf" name="payslip" id="payslip" value="<?= $paySlip ?>" onchange="validatePaySlip()">
          <span id="paySlip-error"></span>

        </div>
        <div class="input__box">
          <span><strong>Contact Details:</strong></span>
          <input type="text" placeholder="Enter Your Address" name="contact-details" id="contact-details" value="<?= $contact ?>" onkeyup="validateAddress()">
          <span id="address-error"></span>
        </div>
        <div class="input__box">
          <span><strong>Mobile No.:</strong></span>
          <input type="tel" placeholder="Enter your mobile number" name="phone-no" id="phone-no" value="<?= $phoneNo ?>" onkeyup="validatePhone()">
          <span id="mobile-error"></span>
        </div>
        <div class="input__box">
          <span><strong>Food Preference:</strong></span>
          <select name="food-pref" id="food-pref" value="<?= $food ?>" onchange="validateFood()">
            <option value="X" selected="selected">--Select--</option>
            <option value="Veg">VEG</option>
            <option value="Non Veg">NON VEG</option>
          </select>
          <span id="food-error"></span>
        </div>
        <div class="input__box">
          <span><strong>Accomodation:</strong></span>
          <select name="accomodation-pref" id="accomodation-pref" value="<?= $accomodation ?>" onchange="validateAccomodation()">
            <option value="X" selected="selected">--Select--</option>
            <option value="Required">REQUIRED</option>
            <option value="Not required">NOT REQUIRED</option>
          </select>
          <span id="accomodation-error"></span>
        </div>
      </div>

      <div class="button">
        <input type="submit" name="submit-btn" value="REGISTER" onclick="return validateForm()">
        <span id="submit-error"></span>
      </div>
    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>