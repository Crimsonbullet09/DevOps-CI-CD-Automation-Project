pipeline {
    agent any

    environment {
        Registry = 'aymane55/automated-web-app'
        CredentialsId = 'dockerhub'
    }

    stages {
        stage('Build image') {
            steps {
                script {
                    echo 'Building Docker Image...'
                    dockerImage = docker.build("$Registry:1.0)
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                script {
                    echo 'Running Docker Container...'
                    sh 'sudo docker run -d -p 3000:3000 $Registry:1.0'
                }
            }
        }

        stage('Push image') {
            steps {
                script {
                    docker.withRegistry( 'https://registry-1.docker.io/v2/', CredentialsId ) {
                        dockerImage.push()
                    }
                }
            }
        }
    }
}

