<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Staff Recruitment Form - Coffee Maker</title>
  <link rel="stylesheet" type="text/css" href="staff.css">
  <script>
    function validateForm() {

      const firstName = form["First_Name"].value;
      const lastName = form["Last_Name"].value;
      const mobileNumber = form["mobile_number"].value;
      const password = form["password"].value;
      const confirmPassword = form["c_password"].value;
      
      // Basic name validation (non-empty and only letters)
      if (firstName === "" || ! /^[A-Za-z]+$/.test(firstName)) {
        alert("Please enter a valid first name.");
        return false;
      }

      if (lastName === "" || !/^[A-Za-z]+$/.test(lastName)) {
        alert("Please enter a valid last name.");
        return false;
      }

      // Basic mobile number validation (10 digits)
      if (mobileNumber === "" || !/^\d{10}$/.test(mobileNumber)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
      }

      // Basic password validation (alpha, numeric, and symbols)
      if (!/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/.test(password)) {
        alert("Password must contain at least one letter, one number, and one special character.");
        return false;
      }

      // Confirm password validation
      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }
    }
  </script>
</head>
<body>
  <h3>STAFF REGISTRATION FORM</h3>
  <form name="registrationForm" action="process_form.php" method="post" onsubmit="return validateForm()">
    <table name="staff" align="center" cellpadding="10">
      <tr>
        <td>FIRST NAME</td>
        <td><input type="text" name="First_Name" maxlength="30" placeholder="Max 30 characters A-Z"></td>
      </tr>
      <tr>
        <td>LAST NAME</td>
        <td><input type="text" name="Last_Name" maxlength="30" placeholder="Max 30 characters A-Z"></td>
      </tr>
      <tr>
        <td>Mobile number</td>
        <td><input type="number" name="mobile_number" maxlength="10" placeholder="Max 10 digits 0-9"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="alpha a-z and A-Z symbols digits 0-9"></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><input type="password" name="c_password" placeholder="alpha a-z and A-Z symbols digits 0-9"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit"></td>
      </tr>
    </table>
  </form>
</body>
</html>
