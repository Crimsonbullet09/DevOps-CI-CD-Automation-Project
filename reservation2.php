<!DOCTYPE html>
<html>
<head>
    <title>Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("bg3.jpg") no-repeat center center fixed;
            background-size: cover;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 20px;
        }
        .conteneur-calendrier {
            text-align: center;
            margin-bottom: 20px;
            background: url("bg3.jpg") no-repeat center center fixed;
            background-size: cover;
            padding: 20px;
            opacity: 0.9;
        }
        table {
            border-collapse: collapse;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 70%;
            max-width: 800px;
        }

        th, td {
            border: 1px solid #e1e1e1;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }

        .bouton {
            padding: 10px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }

        .bouton:hover {
            background-color: #0056b3;
        }

        .sélectionné {
            background-color: #007bff;
            color: #fff;
        }

        .conteneur-calendrier {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .mois-année {
            font-size: 24px;
            margin-bottom: 10px;
        }

        td:hover {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        td a {
            color: black;
            text-decoration: none;
        }

        .date-sélectionnée {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="conteneur-calendrier">
        <?php
        // Fonction pour créer le calendrier
            function créerCalendrier($année, $mois) {
                $joursDeLaSemaine = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
                $premierJourDuMois = date('w', mktime(0, 0, 0, $mois, 1, $année));
                $joursDansLeMois = date('t', mktime(0, 0, 0, $mois, 1, $année));

                $html = '<table><tr>';
                foreach ($joursDeLaSemaine as $jour) {
                    $html .= '<th>' . $jour . '</th>';
                }
                $html .= '</tr><tr>';

                $compteurJour = 1;
                for ($i = 0; $i < 42; $i++) {
                    if ($i >= $premierJourDuMois && $compteurJour <= $joursDansLeMois) {
                        $html .= '<td';

                        if (isset($_GET['année']) && isset($_GET['mois']) && isset($_GET['jour'])) {
                            $dateSélectionnée = $_GET['année'] . '-' . $_GET['mois'] . '-' . $_GET['jour'];
                            $dateActuelle = $année . '-' . $mois . '-' . $compteurJour;
                            if ($dateSélectionnée == $dateActuelle) {
                                $html .= ' class="sélectionné"';
                            }
                        }

                        $dateActuelle = $année . '-' . $mois . '-' . $compteurJour;
                        $jourDeLaSemaine = date('N', strtotime($dateActuelle));
                        $html .= ' class="jour-' . $jourDeLaSemaine . '">';

                        $html .= '<a href="?année=' . $année . '&mois=' . $mois . '&jour=' . $compteurJour . '">' . $compteurJour . '</a>';
                        $compteurJour++;
                    } else {
                        $html .= '<td></td>';
                    }

                    if (($i + 1) % 7 === 0) {
                        $html .= '</tr><tr>';
                    }
                }

                $html .= '</tr></table>';
                return $html;
            }
           // Obtenir l'année et le mois actuels
            $annéeActuelle = date('Y');
            $moisActuel = date('m');

            
                // Vérifier si des paramètres d'année et de mois sont passés dans l'URL
            if (isset($_GET['année']) && isset($_GET['mois'])) {
                $annéeActuelle = $_GET['année'];
                $moisActuel = $_GET['mois'];
            }
           // Afficher le mois et l'année actuels
            echo '<h1>' . date('F Y', mktime(0, 0, 0, $moisActuel, 1, $annéeActuelle)) . '</h1>';
            echo créerCalendrier($annéeActuelle, $moisActuel);
             // Afficher le message de la date choisie
            if (isset($_GET['jour'])) {
                $dateSélectionnée = $_GET['année'] . '-' . $_GET['mois'] . '-' . $_GET['jour'];
                $nomJourDeLaSemaine = date('l', strtotime($dateSélectionnée));
                echo '<p>Date choisie : ' . $nomJourDeLaSemaine . ' ' . $_GET['jour'] . ' ' . date('F', strtotime($dateSélectionnée)) . ' ' . $_GET['année'] . '</p>';
            }
        ?>
        <div>
            <button class="bouton" onclick="prevMonth()">Mois Précédent</button>
            <button class="bouton" onclick="nextMonth()">Mois Suivant</button>
        </div>
        <div>
            <button class="bouton" onclick="confirmerRéservation()">Confirmer</button>
        </div>
    </div>

    <script>
        // Fonction pour passer au mois précédent
        function prevMonth() {
            const annéeActuelle = parseInt(<?php echo $annéeActuelle; ?>);
            const moisActuel = parseInt(<?php echo $moisActuel; ?>);
            let moisPrécédent = moisActuel - 1;
            let annéePrécédente = annéeActuelle;

            if (moisPrécédent < 1) {
                moisPrécédent = 12;
                annéePrécédente--;
            }

            window.location.href = `?année=${annéePrécédente}&mois=${moisPrécédent}`;
        }
        // Fonction pour passer au mois suivant
        function nextMonth() {
            const annéeActuelle = parseInt(<?php echo $annéeActuelle; ?>);
            const moisActuel = parseInt(<?php echo $moisActuel; ?>);
            let moisSuivant = moisActuel + 1;
            let annéeSuivante = annéeActuelle;

            if (moisSuivant > 12) {
                moisSuivant = 1;
                annéeSuivante++;
            }

            window.location.href = `?année=${annéeSuivante}&mois=${moisSuivant}`;
        }
       // Fonction pour afficher la date sélectionnée
        function afficherDateSélectionnée(année, mois, jour) {
            const dateSélectionnée = année + '-' + mois + '-' + jour;
            const nomJourDeLaSemaine = obtenirNomJourDeLaSemaine(dateSélectionnée);
            const nomMois = obtenirNomMois(mois);
            const affichageDateSélectionnée = document.getElementById('affichageDateSélectionnée');
            affichageDateSélectionnée.innerHTML = 'Date choisie : ' + nomJourDeLaSemaine + ' ' + jour + ' ' + nomMois + ' ' + année;
        }
       // Fonction pour obtenir le nom du jour de la semaine
        function obtenirNomJourDeLaSemaine(dateString) {
            const joursDeLaSemaine = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const date = new Date(dateString);
            const jourDeLaSemaine = date.getDay();
            return joursDeLaSemaine[jourDeLaSemaine];
        }
     // Fonction pour obtenir le nom du mois
        function obtenirNomMois(mois) {
            const moisArray = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            return moisArray[parseInt(mois) - 1];
        }
// Fonction pour confirmer la réservation
        function confirmerRéservation() {
            const dateSélectionnée = document.querySelector('.sélectionné a');
            if (dateSélectionnée) {
                const jour = dateSélectionnée.textContent;
                const mois = <?php echo $moisActuel; ?>;
                const année = <?php echo $annéeActuelle; ?>;
                const urlConfirmation = `send_confirmation_email.php?date=${année}-${mois}-${jour}`;
                fetch(urlConfirmation)
                    .then(response => {
                        if (response.ok) {
                            alert('E-mail de confirmation envoyé avec succès !');
                        } else {
                            alert("Échec de l'envoi de l'e-mail de confirmation.");
                        }
                    })
                    .catch(error => {
                        alert("Une erreur s'est produite lors de l'envoi de l'e-mail de confirmation.");
                        console.error(error);
                    });
            } else {
                alert('Veuillez sélectionner une date avant de confirmer.');
            }
        }
    </script>
</body>
</html>
