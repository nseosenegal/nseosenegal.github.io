<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Adresse e-mail de réception
    $to = "sambabocoum8@gmail.com"; // <- Remplace par TON adresse e-mail
    $subject = "Nouveau message du site NSEO";
    
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    // Envoi du mail
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirection ou message de succès
        header("Location: merci.html");
        exit();
    } else {
        echo "Erreur lors de l'envoi du message. Veuillez réessayer.";
    }
} else {
    // Accès direct au script (hors formulaire)
    echo "Accès non autorisé.";
}
?>
