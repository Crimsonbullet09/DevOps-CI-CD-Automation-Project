FROM php:latest

WORKDIR /var/www/html                                                           

COPY ./ /var/www/html                                                         

EXPOSE 3000                                      

CMD ["php", "-S", "0.0.0.0:3000", "-t", "/var/www/html", "Inscription.php"]
