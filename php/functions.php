<?php require_once('upload.php');
    if (!isset($_SESSION)) { session_start(); } 

    function find_graves() {
        global $connection;

        $query = "SELECT * FROM graves";
        $result = mysqli_query($connection, $query);

        return $result;
    }
    function display_errors($errors=array()) {
        $output = '';
        if(!empty($_SESSION['errors'])) {
            $output .= "<div class=\"errors\">";
            $output .= "Please fix the following errors:";
            $output .= "<ul>";
            foreach($_SESSION['errors'] as $error) {
                $output .= "<li>" . $error . "</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }
?>