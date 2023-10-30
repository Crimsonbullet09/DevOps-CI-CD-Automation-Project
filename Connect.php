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
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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
            background-color: #fff;
            text-align: center;
        }

        .container-with-image h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .link-inscription {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
<script>
        function displayErrorMessage(message) {
            var errorMessage = document.getElementById("error-message");
            errorMessage.innerHTML = message;
            errorMessage.style.display = "block";
        }
    </script>
    </head>
<body>

    <div class="container-with-image">
    <h2 style="text-align: center;">Connexion</h2>
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        <form action="" method="post" onsubmit="return validateForm();">
            <input type="text" name="nom" class="form-control my-4 py-2" placeholder="Nom et prénom">
            <input type="password" name="password" class="form-control my-4 py-2" placeholder="Mot de passe">
           
        </form>
        <a href="reservation2.php" class="btn btn-primary">Se Connecter</a>
<a href="http://localhost/projet/Inscription.php" class="link-inscription">Inscription</a>

    </div>
    <script>
    function validateForm() {
        var nom_prenom = document.getElementsByName("nom")[0].value;
        var password = document.getElementsByName("password")[0].value;

        // Check if fields are not empty (add more validation if needed)
        if (nom_prenom.trim() === "" || password.trim() === "") {
            document.getElementById("error-message").style.display = "block";
            document.getElementById("error-message").textContent = "Nom et Prénom ou mot de passe incorrect";
            return false;
        }
        
        // Simulate successful login
        // You can replace this with actual server-side validation
        if (nom_prenom === "validUsername" && password === "validPassword") {
            // Redirect to the reservation page
            window.location.href = "reservation.php";
        }

        // If fields are valid but credentials are incorrect, show an error
        document.getElementById("error-message").style.display = "block";
        document.getElementById("error-message").textContent = "Nom et Prénom ou mot de passe incorrect";
        return false;
    }
</script>








    
</body>
</html>
</body>
</html>
