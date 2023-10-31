pipeline {
    agent any

    environment {
    	registry = "aymane55/automated-web-app"
        buildNumber = "${env.BUILD_NUMBER}"
    }

    stages {
        stage('Build Docker Image') {
            steps {
                    echo 'built successfully'
            }
        }
        stage('Run Docker Container') {
            steps {
                    echo 'running successfully'
            }
        }
        stage('Debug') {
            steps {
                    sh 'id'  // Show current user and groups
                    sh 'env' // Show environment variables
            }    
        }
        stage('Push to DockerHub') {
            steps {
                    withDockerRegistry(credentialsId: "dockerhub", url: "https://index.docker.io/v2/"){
                       sh "sudo docker build -t automated-web-app ." 
                       sh "docker tag automated-web-app aymane55/automated-web-app:999"
                       sh "docker push aymane55/automated-web-app:999"
                    }
            }
        }
    }
}
