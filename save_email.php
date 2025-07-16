<?php
if (isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = fopen("emails.csv", "a");
        fputcsv($file, [$email]);
        fclose($file);

        echo "Merci pour votre abonnement !";
    } else {
        echo "Adresse email invalide.";
    }
}
?>
