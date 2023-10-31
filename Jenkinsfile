pipeline {
    agent any
    checkout scm
    def dockerImage

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
                script{
                    docker.withRegistry('https://registry-1.docker.io/v2/', 'dockerhub') {
                       dockerImage = docker.build("aymane55/automated-web-app:88")
                       dockerImage.push() 
                    }
                }
            }
        }
    }
}
