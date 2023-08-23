


<script> 

function confirmReservation() {
    const selectedDate = document.querySelector('.selected a');
    if (selectedDate) {
        const date = selectedDate.textContent;
        const month = <?php echo $currentMonth; ?>;
        const year = <?php echo $currentYear; ?>;

        const emailData = {
            host: "smtp.elasticemail.com",  
            username: "CHARAF",     
            password: "Charaf2001",     
            to: "charafjaafari49@gmail.com",    
            from: "sender@example.com",     
            subject: "Confirmation Email",
            body: `Your reservation for ${date_sel} has been confirmed.`
        };

        // Send the email using SMTP.js
        Email.send({
            Host:"smtp.elasticemail.com" ,
            Username: "CHARAF",
            Password: "Charaf2001",
            To: "charafjaafari49@gmail.com",
            From:"sender@example.com" ,
            Subject:"Confirmation Email" ,
            Body: `Your reservation for ${date_sel} has been confirmed.`
        }).then(
            message => alert("Vous avez effectué la réservation avec succès. !")
        ).catch(
            error => alert("Date occupée Veuillez Sélectionnée une autre date " + error)
        );
    } else {
        alert('Veuillez sélectionner une date avant de confirmer.');
    }
}

    



</script>