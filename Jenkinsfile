pipeline {
    agent any

    environment {
    	registry = "aymane55/automated-web-app"
        registryCredential = 'dockerhub' 
        buildNumber = "${env.BUILD_NUMBER}"
    }

    stages {
        stage('Build Docker Image') {
            steps {
                script {
                    sh "sudo docker build -t ${registry}:${buildNumber} ."
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    sh "sudo docker run -d -p 3000:3000 ${registry}:${buildNumber}"
                }
            }
        }
        stage('Push to DockerHub') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v1/', registryCredential) {
                        sh "sudo docker push ${registry}:${buildNumber}"

                    }
                }
            }
        }
    }
}

