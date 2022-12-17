<?php include("connect.php"); ?>
<?php require("form_validate.php"); ?>
<?php include("db_push.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Registration Form</title>
</head>

<body>
  <!-- Header Field -->
  <header>
    <div>
      <img src="logo/logo.png" alt="NBU_LOGO">
      <h1>Conference Name</h1>
    </div>
  </header>

  <!-- Technical Sponsors Field -->
  <div class="technical-sponsors">
    Technical Sponsors:
    <div>
      Sponsor 1
    </div>
    <div>
      Sponsor 2
    </div>
  </div>

  <div class="container">

    <div class="title">Conference Registration Form</div><br>

    <?php if(!isset($hide)) { ?>

    <!-- Form Field -->
    <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

      <div class="user__details">
        <div class="input__box">
          <!-- Mandatory Field -->
          <p class="mandate-fields">*Fields are mandatory</p><br>

          <!-- Salutation Field -->
          <span>Salutation:</span>
          <select name="salutation" id="salut" onchange="validateSalutation()">
            <option value="" selected="selected">--Select--</option>
            <option value="Dr." <?php echo(isset($_POST['salutation']) && $_POST['salutation'] == 'Dr.')?'selected="selected"':'';?>>Dr.</option>
            <option value="Mr." <?php echo(isset($_POST['salutation']) && $_POST['salutation'] == 'Mr.')?'selected="selected"':'';?>>Mr.</option>
            <option value="Ms." <?php echo(isset($_POST['salutation']) && $_POST['salutation'] == 'Ms.')?'selected="selected"':'';?>>Ms.</option>
            <option value="Mrs." <?php echo(isset($_POST['salutation']) && $_POST['salutation'] == 'Mrs.')?'selected="selected"':'';?>>Mrs.</option>
          </select>
          <span id="salutaion-error" class="error-display"></span>
        </div>

        <!-- First Name Field -->
        <div class="input__box"></div>
        <div class="input__box">
          <span class="details">First Name: <span class="mandate-fields">*</span></span>
          <input type="text" placeholder="Enter Your First Name" name="fname" id="fname" value="<?php if(isset($firstName) && $success == '') {echo $firstName;} ?>" onkeyup="validateFName()">
          <span class="error-display" id="fname-error"></span>
        </div>

        <!-- Last Name Field -->
        <div class="input__box">
          <span class="details">Last Name: <span class="mandate-fields">*</span></span>
          <input type="text" placeholder="Enter Your Last Name" name="lname" id="lname" value="<?php if(isset($lastName) && $success == '') {echo $lastName;} ?>" onkeyup="validateLName()">
          <span id="lname-error" class="error-display"></span>
        </div>

        <!-- Designation Field -->
        <div class="input__box">
          <span class="details">Designation: <span class="mandate-fields">*</span></span>
          <input type="text" placeholder="Enter Your Last Name" name="desgnation" id="designation" value="<?php if(isset($designation) && $success == '') {echo $designation;} ?>" onkeyup="validateDesignation()">
          <span id="designation-error" class="error-display"></span>
        </div>

        <!-- Affilation Field -->
        <div class="input__box">
          <span class="details">Affilation: <span class="mandate-fields">*</span></span>
          <input type="text" placeholder="Enter Your Last Name" name="affliation" id="affiliation" value="<?php if(isset($affiliation) && $success == '') {echo $affiliation;} ?>" onkeyup="validateAffiliation()">
          <span id="affiliation-error" class="error-display"></span>
        </div>

        <!-- Gender Field -->
        <div class="gender__details">
          <input type="radio" name="gender" id="dot-1" value="Male" <?php echo(isset($_POST['gender']) && $_POST['gender'] == 'Male') ? "checked": "";?> onclick="validateGender()">
          <input type="radio" name="gender" id="dot-2" value="Female" <?php echo(isset($_POST['gender']) && $_POST['gender'] == 'Female') ? "checked": "";?> onclick="validateGender()">
          <input type="radio" name="gender" id="dot-3" value="Others" <?php echo(isset($_POST['gender']) && $_POST['gender'] == 'Others') ? "checked": "";?> onclick="validateGender()">
          <span class="gender__title">Gender: <span class="mandate-fields">*</span></span>
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
          <span id="gender-error" class="error-display"></span>
        </div>

        <!-- Candidature Field -->
        <div class="candidature__details">
          <input type="radio" name="candidature" id="dot-11" value="Presenter" <?php echo(isset($_POST['candidature']) && $_POST['candidature'] == 'Presenter') ? "checked": "";?> onclick="validateCandidature()">
          <input type="radio" name="candidature" id="dot-12" value="Participant" <?php echo(isset($_POST['candidature']) && $_POST['candidature'] == 'Participant') ? "checked": "";?> onclick="validateCandidature()">
          <span class="candidature__title">Candidature:</span>
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
          <span id="candidature-error" class="error-display"></span>
        </div>

        <!-- Registration Fees Field -->
        <div class="input__box">
          <span class="details">Registration Fees: <span class="mandate-fields">*</span></span>
          <input type="text" placeholder="Enter Your Last Name" name="regfee" id="regfee" value="<?php if(isset($regFees) && $success == '') {echo $regFees;} ?>" onkeyup="validateFees()">
          <span id="fee-error" class="error-display"></span>
        </div>

        <!-- Payment Slip Field -->
        <div class="input__box">
          <span class="details">Payment Slip: <span class="mandate-fields">*</span></span>
          <input type="file" accept="application/pdf,image/jpeg,image/jpg" name="payslip" id="payslip" onchange="validatePaySlip()">
          <span id="paySlip-error" class="error-display"></span>
        </div>

        <!-- Contact Details Field -->
        <div class="input__box">
          <span class="details">Contact Details:</span>
          <input type="text" placeholder="Enter Your Address" name="contact-details" id="contact-details" value="<?php if(isset($contact) && $success == '') {echo $contact;} ?>">
          <span id="address-error" class="error-display"></span>
        </div>

        <!-- Email Id Field -->
        <div class="input__box">
          <span class="details">Email Id: <span class="mandate-fields">*</span></span>
          <input type="email" placeholder="Enter Your Email Id" id="email-id" name="email-id" value="<?php if(isset($email) && $success == '') {echo $email;} ?>" onkeyup="validateEmail()">
          <span id="email-error" class="error-display"></span>
        </div>

        <!-- Mobile Number Field -->
        <div class="input__box">
          <span class="details">Mobile No.: <span class="mandate-fields">*</span></span>
          <input type="tel" placeholder="Enter your mobile number" name="phone-no" id="phone-no" value="<?php if(isset($phoneNo) && $success == '') {echo $phoneNo;} ?>" onkeyup="validatePhone()">
          <span id="mobile-error" class="error-display"></span>
        </div>

        <!-- Food Preference Field -->
        <div class="input__box">
          <span class="details">Food Preference:</span>
          <select name="food-pref" id="food-pref">
            <option value="X" selected="selected">--Select--</option>
            <option value="Veg" <?php echo(isset($_POST['food-pref']) && $_POST['food-pref'] == 'Veg')?'selected="selected"':'';?>>VEG</option>
            <option value="Non Veg" <?php echo(isset($_POST['food-pref']) && $_POST['food-pref'] == 'Non Veg')?'selected="selected"':'';?>>NON VEG</option>
          </select>
          <span id="food-error" class="error-display"></span>
        </div>

        <!-- Accomodation Field -->
        <div class="input__box">
          <span class="details">Accomodation:</span>
          <select name="accomodation-pref" id="accomodation-pref" value="<?= $accomodation ?>">
            <option value="X" selected="selected">--Select--</option>
            <option value="Required" <?php echo(isset($_POST['accomodation-pref']) && $_POST['accomodation-pref'] == 'Required')?'selected="selected"':'';?>>REQUIRED</option>
            <option value="Not required" <?php echo(isset($_POST['accomodation-pref']) && $_POST['accomodation-pref'] == 'Not required')?'selected="selected"':'';?>>NOT REQUIRED</option>
          </select>
          <span id="accomodation-error" class="error-display"></span><br>
          <span class="mandate-fields"><strong>**Has to be paid seperately.</strong></span>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="button">
        <input type="submit" name="submit-btn" value="REGISTER" onclick="return validateForm()">
        <span id="submit-error"></span>
      </div>
    </form>

    <?php }?>
  </div>

  <script src="script.js"></script>
</body>

</html>