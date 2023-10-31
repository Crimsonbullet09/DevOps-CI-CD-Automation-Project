pipeline {
    agent any

    environment {
        buildNumber = "${env.BUILD_NUMBER}"
    }

    stages {
        stage('Build Docker Image') {
            steps {
                script {
                    echo 'Building Docker Image...'
                    dockerImage = docker.build("automated-web-app:${buildNumber}")
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    echo 'Running Docker Container...'
                    sh "docker run -d -p 3000:3000 automated-web-app:${buildNumber}"
                }
            }
        }
        stage('Push Image to DockerHub') {
            steps {
                script {
                    echo 'Pushing Docker Image to DockerHub...'
                    docker.withRegistry('https://registry-1.docker.io/v2/', 'dockerhub') {
                        dockerImage.push()
                    }
                }
            }
        }
    }
}

