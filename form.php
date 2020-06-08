<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir en PDF</title>
</head>
<body>
    <form method="post" action="pdf.php">
        <h1>Répondez au formulaire pour le générer en PDF ! </h1>
        <p>Il sera directement téléchargé après avoir appuyé sur le bouton.<p>
        <table>
            <tr>
                <td>
                    <input type="text" name="prenom" placeholder="prénom">
                    <input type="text" name="nom" placeholder="nom">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="mail" placeholder="e-mail">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tel" placeholder="téléphone">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="message" placeholder="Votre message"></textarea>
                </td>
            </tr>
        <table>
        <button type="submit">Générez le PDF</button>

    </form>
</body>
</html>