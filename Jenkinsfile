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
                    withDockerRegistry([ credentialsId: "dockerhub", url: "" ]) {
                       sh "sudo docker build -t aymane55/automated-web-app:999 ."
                       sh "sudo docker push aymane55/automated-web-app:999"
                    }
            }
        }
    }
}
