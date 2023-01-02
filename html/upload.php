<?php require_once('functions.php');

    // Start the session
    session_start();
    $errors = [];

    if (isset($_POST['submit'])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        // Check Upload Key
        if($_POST["uploadKey"] === "r32t1np34c3") {
                    
        } else {
            $errors[] = "You do not have permission to upload this file. <br>";
        }

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check == false) {
                $errors[] = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $errors[] = "Sorry, file already exists. <br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000000) {
            $errors[] = "Sorry, your file is too large. <br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
        && $imageFileType != "GIF" ) {
            $errors[] = "Only JPG, JPEG, PNG & GIF files are allowed. <br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors[] = "Sorry, your file was not uploaded. <br>";
        }
        // make sure no field is empty
        if ($first_name == null || $last_name == false || 
            $death_date == null || $birth_date == null) {
                $errors[] = "Invalid data. Check all fields and try again.";
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $errors[] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            $errors[] = "Sorry, there was an error uploading your file. <br>";
            }
        }

        if ($uploadOk == 1) {
            // Get the grave data from the form
            $first_name = filter_input(INPUT_POST, 'firstName');
            $middle_name = filter_input(INPUT_POST, 'middleName');
            $last_name = filter_input(INPUT_POST, 'lastName');
            $death_date = filter_input(INPUT_POST, 'deathDate');
            $birth_date = filter_input(INPUT_POST, 'birthDate');
            $photo_name = $_FILES["fileToUpload"]["name"];

            // escaping special characters to not hurt the database
            $first_name = mysqli_real_escape_string($connection, $first_name);
            $middle_name = mysqli_real_escape_string($connection, $middle_name);
            $last_name = mysqli_real_escape_string($connection, $last_name);
            $death_date = mysqli_real_escape_string($connection, $death_date);
            $birth_date = mysqli_real_escape_string($connection, $birth_date);
            $photo_name = mysqli_real_escape_string($connection, $photo_name);

            require_once('database.php');

            $sql = "INSERT INTO graves ";
            $sql .= "(firstName, middleName, lastName, birthDate, deathDate, PhotoName) ";
            $sql .= "VALUES (";
            $sql .= "'" . $first_name . "', ";
            $sql .= "'" . $middle_name . "', ";
            $sql .= "'" . $last_name . "', ";
            $sql .= "'" . $birth_date . "', ";
            $sql .= "'" . $death_date . "', ";
            $sql .= "'" . $photo_name . "'";
            $sql .= ")";    
                
            mysqli_query($connection, $sql);

            header("Location: index.php");
        } else {
            if(!empty($errors)) {
                $_SESSION['errors'] = $errors;
            }
            header("Location: uploadForm.php");
        } 
    }

?>