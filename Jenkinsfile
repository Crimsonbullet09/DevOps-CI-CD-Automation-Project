pipeline {
    agent any

    environment {
        registryCredential = 'dockerhub' 
        buildNumber = "${env.BUILD_NUMBER}"
    }

    stages {
        stage('Build Docker Image') {
            steps {
                script {
                    sh "sudo docker build -t automated-web-app:${buildNumber} ."
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    sh "sudo docker run -d -p 3000:3000 automated-web-app:${buildNumber}"
                }
            }
        }
        stage('Push to DockerHub') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v1/', registryCredential) {
                        sh "sudo docker tag automated-web-app:${buildNumber} aymane55/automated-web-app"
                        sh "sudo docker push automated-web-app:${buildNumber} aymane55/automated-web-app"
                    }
                }
            }
        }
    }
}

