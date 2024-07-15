function validateInputs() {
    // Retrieve input values using document.getElementById('id')
    const firstName = document.getElementById('FirstName').value;
    const lastName = document.getElementById('LastName').value;
    const middleInitial = document.getElementById('MiddleInitial').value; // Corrected ID
    const age = document.getElementById('Age').value;
    const gender = document.getElementById('Gender').value;
    const address1 = document.getElementById('Address').value; // Corrected ID
    const address2 = document.getElementById('Address2').value;
    const email = document.getElementById('Email').value;
    const baranggay = document.getElementById('Baranggay').value;
    const contactNumber = document.getElementById('Contact').value;
    const vaccineId = document.getElementById('VaccineId').value;
    const doseId = document.getElementById('Dose_Id').value;
  
    // Perform validations (missing fields, format, range)
    let isValid = true; // Flag to track validation status
  
    // Example validation for email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      isValid = false;
      // Display error message (e.g., using alertify.js)
      alertify.error('Invalid email format. Please enter a valid email address.');
    }
  
    // Add more validation checks as needed (age, contact number, etc.)
  
    // Return true if all validations pass, false otherwise
    return isValid;
  }
  
  // Attach validation function to form submission (example using onclick)
  const submitButton = document.getElementById('submitButton');
  submitButton.addEventListener('click', function() {
    if (!validateInputs()) {
      // Prevent form submission if validation fails
      return false;
    }
  });
  