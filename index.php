<?php   echo "ciao mamma siamo online";
try {
    header("Location: \learnenglisheasiy2\index.php");  // Correct header format
    exit();  // Ensure no further code is executed
} catch (Exception $e) {  // Catch specific exceptions
    echo "Error: " . $e->getMessage();  // Output the error message
}

?>
