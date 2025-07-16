<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    $file = 'emails.csv';
    $alreadyExists = false;

    // Vérifier si le fichier existe et parcourir les emails
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strtolower(trim($line)) == strtolower($email)) {
                $alreadyExists = true;
                break;
            }
        }
    }

    if ($alreadyExists) {
        echo "Cet email est déjà inscrit.";
    } else {
        $handle = fopen($file, 'a');
        fwrite($handle, $email . "\n");
        fclose($handle);
        echo "Email enregistré avec succès !";
    }
}
?>
