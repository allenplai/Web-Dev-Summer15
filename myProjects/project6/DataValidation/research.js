"use strict";

window.onsubmit=validateForm;

function validateForm() {
  var invalidMessages = "";

  // check phone number
  var phoneFirstpart = document.getElementById("phoneFirstpart").value;
  var phoneSecondPart = document.getElementById("phoneSecondPart").value;
  var phoneThirdPart = document.getElementById("phoneThirdPart").value;

  if ((String(parseInt(phoneFirstpart)) !== phoneFirstpart) ||
      (String(parseInt(phoneSecondPart)) !== phoneSecondPart) ||
      (String(parseInt(phoneThirdPart)) !== phoneThirdPart) ) {
        invalidMessages += "Invalid Phone number\n";
  }

  // check the check boxes
  var highBloodPressureCheckbox = document.getElementById("highBloodPressure");
  var diabetesCheckbox = document.getElementById("diabetes");
  var glaucomaCheckbox = document.getElementById("glaucoma");
  var asthmaCheckbox = document.getElementById("asthma");
  var noneCheckbox = document.getElementById("none");

  if (!highBloodPressureCheckbox.checked && !diabetesCheckbox.checked &&
      !glaucomaCheckbox.checked && !asthmaCheckbox.checked &&
      !noneCheckbox.checked ) {
        invalidMessages += "No conditions selected\n";
  }
  if (noneCheckbox.checked &&
      ( highBloodPressureCheckbox.checked || diabetesCheckbox.checked ||
      glaucomaCheckbox.checked || asthmaCheckbox.checked) ) {
        invalidMessages += "Invalid conditions selection\n";
  }

  // check the radio time period selection
  var period = document.getElementsByName("period");
  if (!period[0].checked && !period[1].checked && !period[2].checked && !period[3].checked) {
    invalidMessages += "No time period selected\n";
  }

  // check study id
  checkStudyId();

  if (invalidMessages !== "") {
    alert(invalidMessages);
    return false;
  } else {
    var confirmation = "Do you want to submit the form data?";
    if (window.confirm(confirmation))
        return true;
    else
        return false;
  }

  //this is my second function
  function checkStudyId() {
    var firstFourDigits = document.getElementById("firstFourDigits").value;
    var secondFourDigits = document.getElementById("secondFourDigits").value;
    if (firstFourDigits.charAt(0) != "A" || secondFourDigits.charAt(0) != "B") {
      invalidMessages += "Invalid study id\n";
    }
    if (isNaN(firstFourDigits.charAt(1)) || isNaN(firstFourDigits.charAt(2)) || isNaN(firstFourDigits.charAt(3)) ||
        isNaN(secondFourDigits.charAt(1)) || isNaN(secondFourDigits.charAt(2)) || isNaN(secondFourDigits.charAt(3))) {
      invalidMessages += "Invalid study id\n";
    }
  }
}
