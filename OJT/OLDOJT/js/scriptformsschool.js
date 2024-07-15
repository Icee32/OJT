function validateInputs() {
  const firstName = document.getElementById("FirstName").value;
  const lastName = document.getElementById("LastName").value;
  const age = document.getElementById("Age").value;
  const gender = document.getElementById("Gender").value;
  const school = document.getElementById("School").value;
  const baranggay = document.getElementById("Baranggay").value;
  const vaccineId = document.getElementById("VaccineId").value;
  const doseId = document.getElementById("Dose_Id").value;

  let isValid = true;

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    isValid = false;
    alertify.error("Invalid email format. Please enter a valid email address.");
  }

  // Additional validation checks (e.g., age, Baranggay number) can be added here.

  return isValid;
}

$(document).ready(function () {
  $("#submitButton").click(function (event) {
    event.preventDefault();

    if (validateInputs()) {
      const formData = {
        firstName: $("#FirstName").val(),
        lastName: $("#LastName").val(),
        middleInitial: $("#MiddleInitial").val(),
        age: $("#Age").val(),
        gender: $("#Gender").val(),
        address1: $("#Address").val(),
        address2: $("#Address2").val(),
        email: $("#Email").val(),
        school: $("#School").val(),
        baranggay: $("#Baranggay").val(),
        vaccineId: $("#VaccineId").val(),
        doseId: $("#Dose_Id").val(),
      };

      $.ajax({
        url: "submit_form.php",
        type: "POST",
        data: formData,
        success: function (response) {
          alertify.success("Form submitted successfully.");
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alertify.error("Form submission failed: " + textStatus);
        },
      });
    }
  });
});
