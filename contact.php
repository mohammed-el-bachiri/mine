<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $data = "Full Name: $full_name\nPhone: $phone\nEmail: $email\nMessage:\n$message\n\n". "________________________________________________________\n\n";

    $file = 'contacts.txt';

    file_put_contents($file, $data, FILE_APPEND);
    echo "thank you";

    sleep(2);
    header("Location: index.html");

}
?>
