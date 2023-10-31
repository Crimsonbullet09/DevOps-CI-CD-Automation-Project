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
                    sh "echo "built successfully" "
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    sh "echo "running successfully" "
                }
            }
        }
        stage('Push to DockerHub') {
            steps {
                    withDockerRegistry(credentialsId: "dockerhub", url: "https://index.docker.io/v2/"){
                       sh "sudo docker build -t automated-web-app ." 
                       sh "docker tag automated-web-app aymane55/automated-web-app:latest "
                       sh "docker push aymane55/automated-web-app:latest "
                    }
            }
        }
    }
}
