<?php
// Vérifier si le formulaire a été soumis et que l'email est présent
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = trim($_POST['email']);

    // Valider le format de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Chemin du fichier CSV (dans le même dossier que ce script)
        $file = 'emails.csv';

        // Vérifier si le fichier existe, sinon créer avec l'en-tête
        if (!file_exists($file)) {
            file_put_contents($file, "email,date\n");
        }

        // Ajouter l'email avec la date dans le fichier
        $date = date('Y-m-d H:i:s');
        file_put_contents($file, "$email,$date\n", FILE_APPEND);

        echo "<h2>Merci pour votre inscription à la newsletter ! ✅</h2>";
        echo "<a href='index.html'>Retourner à l'accueil</a>";
    } else {
        echo "<h2>Adresse email invalide ❌</h2>";
        echo "<a href='index.html'>Réessayer</a>";
    }
} else {
    echo "<h2>Aucune adresse email reçue ❌</h2>";
    echo "<a href='index.html'>Réessayer</a>";
}
?>
