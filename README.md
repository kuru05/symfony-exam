# 🎓 Symfony EventHub
###### Fait avec IA car jamais fait de fichier .md 
Salut ! 👋 Bienvenue sur mon projet **Symfony EventHub**. 

Ceci est une application web développée dans le cadre de mon apprentissage du framework **Symfony**. Le but était de créer une plateforme web pour la gestion d'événements, avec une partie blog et une gestion complète des utilisateurs.

## 🚀 À propos du projet

L'application permet aux utilisateurs de s'inscrire, de consulter des événements à venir et de lire des articles de blog. Il y a aussi toute une partie "Admin" pour gérer le contenu tranquillement.

### ✨ Fonctionnalités principales

*   **📅 Gestion d'Événements** : Visualisation des événements disponibles.
*   **📝 Blog** : Section pour partager des news et articles.
*   **🔐 Espace Membre** :
    *   Inscription & Connexion sécurisée.
    *   Gestion du profil utilisateur.
*   **👑 Administration** :
    *   Dashboard administrateur.
    *   CRUD (Create, Read, Update, Delete) sur les événements et articles.
    *   Gestion des utilisateurs.
*   **💌 Contact** : Formulaire de contact fonctionnel.

## 🛠️ La Stack Technique

On est sur du solide et du moderne :

*   **Backend** : Symfony 7.4 (PHP 8.2)
*   **Frontend** : Twig, CSS
*   **Base de Données** : MySQL
*   **Outils** : Maker Bundle, Fixtures

## ⚙️ Installation (Pour tester chez toi)

Tu veux lancer le projet en local ? Pas de souci, suis le guide ! 👇

### 1. Prérequis
Assure-toi d'avoir **PHP 8.2+**, **Composer** et **Symfony CLI** installés sur ta machine.

### 2. Cloner le repo
```bash
git clone https://github.com/kuru05/symfony-test.git
cd symfony-test
```

### 3. Installer les dépendances
```bash
composer install
```

### 4. Configuration
Crée un fichier `.env.local` à la racine pour tes variables d'environnement
```bash
cp .env .env.local
```
Modifie la ligne `DATABASE_URL` dans `.env` avec les accès BDD.

### 5. Base de données & Données de test
On crée la base, on fait les migrations et on injecte de la fausse data pour voir ce que ça donne :

```bash
php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load
```
### Comptes de test
Pour tester l'application, les comptes suivants ont été générés par les Fixtures :

| Rôle | Email | Mot de passe | Accès |
| :--- | :--- | :--- | :--- |
| Administrateur | admin@eventhub.com | password | Accès complet + Back-Office (/admin) |
| Utilisateur | usertest@eventhub.com | password | Accès Front-Office + Profil |


### 6. Lancer le serveur 🚀
```bash
symfony serve
```
Ouvre le navigateur sur `http://127.0.0.1:8000`

## 🧐 Structure du code
*   `src/Controller` : Toute la logique de mes pages (Events, Admin, Blog...) est ici.
*   `src/Entity` : Mes Entités PHP qui représentent mes tables en BDD.
*   `templates/` : Toutes les vues Twig. J'ai essayé de bien organiser ça par dossier (`event/`, `admin/`, etc.).

# Captures d'écran pour mieux comprendre les fonctionnalités

### Page d'accueil
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/1f038b7f-acbb-4a15-acd7-c1578dcc63de" />

### Page "Event"
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/483a9cc4-de56-4e84-92da-fcb72d9c037c" />

### Organiser un évènement
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/9c676641-0785-4d26-ac24-8249a5ff4b9d" />

### Page de connexion/inscription 
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/3bbb31e7-3860-47e3-afea-ebca6d66c004" />

### Dashboard Admin (DA)
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/0d64eec4-84b7-4fe7-9797-a6b53c721d71" />

#### Gestion Users (DA)
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/fd7f1785-d8a3-49b8-b33d-a801dbfc4303" />

#### Gestion Evènements (DA)
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/3ca8d8d1-2a7e-43d9-9c6f-c6ad3de1d545" />

#### Gestion Réservations (DA)
<img width="1917" height="931" alt="image" src="https://github.com/user-attachments/assets/57df09ae-b6e1-4eba-bed1-28a9c60b4f0b" />



---
