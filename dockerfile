FROM php:latest                                                                 # Pull an official PHP runtime as a base image


WORKDIR /var/www/html                                                           # Set working directory in the container


COPY ./ /var/www/html                                                           # Copy the application files to the container


EXPOSE 3000                                                                     # Expose port 3000


CMD ["php", "-S", "0.0.0.0:3000", "-t", "/var/www/html", "reservation2.php"]    # Start a basic PHP server on port 3000
