var salutationError = document.getElementById('salutaion-error');
var fnameError = document.getElementById('fname-error');
var lnameError = document.getElementById('lname-error');
var affiliationError = document.getElementById('affiliation-error');
var designationError = document.getElementById('designation-error');
var genderError = document.getElementById('gender-error');
var candidatureError = document.getElementById('candidature-error');
var registrationFeesError = document.getElementById('fee-error');
var paySlipError = document.getElementById('paySlip-error');
var emailError = document.getElementById('email-error');
var mobileError = document.getElementById('mobile-error');
var submitError = document.getElementById('submit-error');


function validateSalutation(){
    var salutation = document.getElementById('salut').value;

    if (salutation == "") {
        salutationError.innerHTML = '**Required';
        return false;
    }
    salutationError.innerHTML = "";
    return true;

}

function validateFName(){
    var fname = document.getElementById('fname').value;

    if (fname.length == 0) {
        fnameError.innerHTML = ' **First Name is required';
        return false;
    }
    if (!fname.match(/^[A-Za-z]*$/)) {
        fnameError.innerHTML = ' **Numeric not allowed';
        return false;
    }
    if (fname.length < 3 ) {
        fnameError.innerHTML = '**First Name require minimum 3 char';
        return false;
    }
    if (fname.length > 20) {
        fnameError.innerHTML = ' **First Name should be less than 20 char';
        return false;
    }
    fnameError.innerHTML = '';
    return true;
}

function validateLName(){
    var lname = document.getElementById('lname').value;

    if (lname.length == 0) {
        lnameError.innerHTML = ' **Last Name is required';
        return false;
    }
    if (!lname.match(/^[A-Za-z]*$/)) {
        lnameError.innerHTML = ' **Numeric not allowed';
        return false;
    }
    if (lname.length < 3 ) {
        lnameError.innerHTML = ' **Last Name require minimum 3 char';
        return false;
    }
    if (lname.length > 20) {
        lnameError.innerHTML = ' **Last Name should be less than 20 char';
        return false;
    }
    lnameError.innerHTML = '';
    return true;
}

function validateDesignation(){
    var designation = document.getElementById('designation').value;

    if (designation.length == 0) {
        designationError.innerHTML = ' **Designation is required';
        return false;
    }
    if (!designation.match(/^[A-Za-z]*$/)) {
        designationError.innerHTML = ' **Numeric not allowed';
        return false;
    }
    designationError.innerHTML = '';
    return true;
}

function validateAffiliation(){
    var affiliation = document.getElementById('affiliation').value;

    if (affiliation.length == 0) {
        affiliationError.innerHTML = ' **Affiliation is required';
        return false;
    }
    if (!affiliation.match(/^[A-Za-z]*$/)) {
        affiliationError.innerHTML = ' **Numeric not allowed';
        return false;
    }
    affiliationError.innerHTML = '';
    return true;
}

function validateCandidature(){
    
    var candidatureSelected = document.querySelector('input[name = "candidature"]:checked');

    if (candidatureSelected != null){
        candidatureError.innerHTML = '';
        return true;
    }
    candidatureError.innerHTML = ' **Please choose any one';
        return false;

}

function validateFees(){
    var regFees = document.getElementById('regfee').value;

    if (regFees.length == 0){
        registrationFeesError.innerHTML = ' **Paid Amount required';
        return false;
    }
    if (regFees.length < 3 || regFees.length > 5) {
        registrationFeesError.innerHTML = ' **Enter a valid amount';
        return false;
    }
    if (!regFees.match(/^[0-9]{3,5}$/)) {
        registrationFeesError.innerHTML = ' **Only digits please';
        return false;
    }
    registrationFeesError.innerHTML = '';
    return true;
}


function validatePaySlip(){
    var paySlip = document.getElementById('payslip');
    // Get the list of selected files
    var files = paySlip.files;

    // Check if any files were selected
    if (!files.length) {
        paySlipError.innerHTML = ' **No files selected!';
        return false;
    }

    // Iterate through the list of files
    for (var i = 0; i < files.length; i++) {
      // Get the current file
      var file = files[i];

      // Check the file type
      if (!file.type.startsWith('application/pdf') && !file.type.startsWith('image/')) {
        paySlipError.innerHTML = ' **File type not allowed: ' + file.name;
        continue;
      }

      // Check the file size
      if (file.size > 1024 * 1024) {
        paySlipError.innerHTML = 'File size too large: ' + file.name;
        continue;
      }

      // File is valid, do something with it (e.g. upload to server)
      paySlipError.innerHTML = ' File is valid: ' + file.name;
    }
    return true;
}


function validateEmail(){
    var emailId = document.getElementById('email-id').value;

    if (emailId.length == 0){
        emailError.innerHTML = ' **Email is required';
        return false;
    }
    if (!emailId.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
        emailError.innerHTML = ' **Invalid Email Format';
        return false;
    }
    emailError.innerHTML = '';
    return true;
}

function validatePhone(){
    var phoneNum = document.getElementById('phone-no').value;

    if (phoneNum.length == 0){
        mobileError.innerHTML = ' **Phone No. is required';
        return false;
    }
    if (phoneNum.length !== 10) {
        mobileError.innerHTML = ' **Phone No. should be 10 digits';
        return false;
    }
    if (!phoneNum.match(/^[0-9]{10}$/)) {
        mobileError.innerHTML = ' **Only digits please';
        return false;
    }
    mobileError.innerHTML = '';
    return true;
}

function validateGender(){
    
    var genderSelected = document.querySelector('input[name = "gender"]:checked');

    if (genderSelected != null){
        genderError.innerHTML = '';
        return true;
    }
    genderError.innerHTML = ' **Please select your gender';
        return false;

}

function validateForm(){
    if(!validateSalutation() || !validateFName() || !validateLName() || !validateDesignation() || 
    !validateAffiliation() || !validateGender() || !validateCandidature() ||
    !validateFees() || !validatePaySlip() || 
    !validateEmail() || !validatePhone() ){
        submitError.style.display = 'block';
        submitError.innerHTML = 'Please fix the error to submit';``
        setTimeout(function(){submitError.style.display = 'none';}, 3500)
        return false;
    }
}