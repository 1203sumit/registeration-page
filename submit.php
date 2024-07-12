<?php
// Create connection
$con = mysqli_connect('localhost', 'root', '', 'studentdata');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize and validate inputs



// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables with form data
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
   
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $class10 = mysqli_real_escape_string($con, $_POST['class10']);
    $class12 = mysqli_real_escape_string($con, $_POST['class12']);
    $graduation = mysqli_real_escape_string($con, $_POST['graduation']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $about = mysqli_real_escape_string($con, $_POST['about']);

    // Prepare and bind
    $query = "INSERT INTO registration_data (firstName,  lastName, dob, class10, class12, graduation, email, about)
              VALUES ('$firstName',  '$lastName', '$dob', '$class10', '$class12', '$graduation', '$email', '$about')";

    if (mysqli_query($con, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

// Close connection
mysqli_close($con);
?>
