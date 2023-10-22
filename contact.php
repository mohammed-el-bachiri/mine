<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $data = "Full Name: $full_name\nPhone: $phone\nEmail: $email\nSubject: $subject\nMessage:\n$message\n\n". "________________________________________________________\n\n";

    $file = 'contacts.txt';

    file_put_contents($file, $data, FILE_APPEND);

    sleep(3);
    header("Location: index.html");
    exit;
}
?>
