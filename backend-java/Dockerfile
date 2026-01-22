# Étape 1 : Construction (Build)
FROM eclipse-temurin:21-jdk-alpine AS build
WORKDIR /app
# On copie les fichiers de configuration Gradle
COPY gradlew .
COPY gradle gradle
COPY build.gradle .
# On copie le code source
COPY src src
# On donne les droits d'exécution et on build le JAR à l'intérieur de Docker
RUN chmod +x gradlew
RUN ./gradlew build -x test

# Étape 2 : Image finale légère
FROM eclipse-temurin:21-jdk-alpine
WORKDIR /app
# On récupère seulement le JAR généré à l'étape précédente
COPY --from=build /app/build/libs/*.jar app.jar
ENTRYPOINT ["java", "-jar", "app.jar"]