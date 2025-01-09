<?php
try {
    header("Location: ./learnenglisheasily2/");  // Correct header format
    exit();  // Ensure no further code is executed
} catch (Exception $e) {  // Catch specific exceptions
    echo "Error: " . $e->getMessage();  // Output the error message
    echo "porcoddio";
    exit();
}