<?php
// Configuration de la base de données
$nomServeur = 'localhost';
$nomUtilisateur = 'root';
$motDePasse = '';
$nom_db = 'datab';

// Établir la connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$nomServeur;dbname=$nom_db", $nomUtilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

session_start();

// Gestion de l'inscription
if (isset($_POST['submit'])) {
    $nom_prenom = $_POST['nom_prenom'];
    $cin = $_POST['cin'];  
    $fonction = $_POST['fonction']; 
    $mot_de_passe = $_POST['mot_de_passe']; 
    $tel = $_POST['tel'];
    $email = $_POST['email']; 
    

    $sql = $pdo->prepare("INSERT INTO `client`(`nom_prenom`, `cin`, `fonction`, `mot_de_passe`, `tel`, `email`, `date`) VALUES (:nom_prenom, :cin, :fonction, :mot_de_passe, :tel, :email, NOW())");
    
    $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT); // Hash the password
    
    $sql->execute(array(
        ':nom_prenom' => $nom_prenom,
        ':cin' => $cin,
        ':fonction' => $fonction,
        ':mot_de_passe' => $hashedPassword,
        ':tel' => $tel,
        ':email' => $email
    ));
}
?>

    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("bg3.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; 
        }

        .container-with-image {
            max-width: 500px; 
            margin: 150px auto; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            opacity: 0.9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            background-color: transparent; 
        }

        .container-with-image h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white; 
        }

        .form-label {
            font-weight: bold;
            color: white;
        }

        /* Style for error messages */
        .error-message {
            color: white;
            font-size: 14px;
        }

        /* Style for constraint error messages */
        .constraint-error {
            color: white;
            font-size: 12px;
        }

        /* Style for checkbox label */
        .form-check-label {
            color: white;
        }

        #passwordHelpBlock {
            font-size: 12px;
            color: white;
        }

        #emailHelp {
            color: white;
        }

        .btn-primary {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-with-image">
        <h2>Inscription</h2>

        <form onsubmit="return validateForm()" action="Connect.php" method="post">
            <div class="mb-3">
                <label for="nom_prenom" class="form-label">Nom et Prénom</label>
                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" placeholder="Entrez votre nom et prénom">
            </div>
            <div class="mb-3">
            <label for="age" class="form-label">CIN</label>
            <input type="text" class="form-control" id="cin" name="cin" placeholder="Entrez votre CIN">
        </div>
            <div class="mb-3">
                <label for="fonction" class="form-label">Fonction</label>
                <input type="text" class="form-control" id="fonction" name="fonction" placeholder="Donnez votre fonction">
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Mot de passe</label>
                <input type="password" id="inputPassword5" class="form-control" name="mot_de_passe" aria-labelledby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Votre mot de passe doit comporter entre 8 et 20 caractères, contenir des lettres et des chiffres, et ne doit pas contenir d'espaces, de caractères spéciaux ou d'emoji.
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="tel" name="tel" placeholder="Entrez votre numéro de téléphone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse e-mail">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
            </div>
            
            <button type="submit" name="submit" value="S'inscrire" class="btn btn-primary">S'inscrire</button>
    

            <!-- Error messages will be displayed here -->

        </form>
    </div>

    <script>
    function validateForm() {
        var nomPrenom = document.getElementById("nom_prenom").value;
        var cin = document.getElementById("cin").value;
        var fonction = document.getElementById("fonction").value;
        var motDePasse = document.getElementById("inputPassword5").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var tel = document.getElementById("tel").value;
        var email = document.getElementById("email").value;

        if (nomPrenom !== "" && cin !== "" && fonction !== "" && motDePasse !== "" && confirmPassword !== "" && tel !== "" && email !== "") {
            if (motDePasse === confirmPassword) {
                // All fields are filled and passwords match, you can proceed with the associated code.
                return true; // The form will be submitted.
            } else {
                alert("Le mot de passe et la confirmation du mot de passe ne correspondent pas.");
                return false; // The form will not be submitted.
            }
        } else {
            alert("Veuillez remplir tous les champs.");
            return false; // The form will not be submitted.
        }
    }
</script>


</head>

    

    
</body>
</html