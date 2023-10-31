pipeline {
    agent any

    environment {
    	registry = "aymane55/automated-web-app"
        buildNumber = "${env.BUILD_NUMBER}"
    }

    stages {
        stage('Build Docker Image') {
            steps {
                script {
                    sh "sudo docker build -t automated-web-app ."
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    sh "sudo docker run -d -p 3000:3000 automated-web-app"
                }
            }
        }
        stage('Push to DockerHub') {
            steps {
                    withDockerRegistry(credentialsId: 'dockerhub', toolName: 'dockerhub'){   
                       sh "docker tag automated-web-app aymane55/automated-web-app:latest "
                       sh "docker push aymane55/automated-web-app:latest "
                    }
            }
        }
    }
}
