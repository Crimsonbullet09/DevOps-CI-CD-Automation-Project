pipeline {
    agent any

    environment {
        registry = "aymane55/automated-web-app"
    }

    stages {
        stage('Build image') {
            steps {
                script {
                    echo 'Building Docker Image...'
                    dockerImage = docker.build("$registry:${env.BUILD_NUMBER}")
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                script {
                    echo 'Running Docker Container...'
                    sh "sudo docker run -d -p 3000:3000 $registry:${env.BUILD_NUMBER}"
                }
            }
        }

        stage('Push image') {
            steps {
                script {
                    docker.withRegistry('https://registry-1.docker.io/v2/', 'docker-hub-credentials') {
                        dockerImage.push()
                    }
                }
            }
        }
    }
}

