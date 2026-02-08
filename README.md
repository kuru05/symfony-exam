# 🎓 Symfony EventHub

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
git clone https://github.com/ton-repo/symfony-test.git
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

### 6. Lancer le serveur 🚀
```bash
symfony serve
```
Ouvre le navigateur sur `http://127.0.0.1:8000`

## 🧐 Structure du code
*   `src/Controller` : Toute la logique de mes pages (Events, Admin, Blog...) est ici.
*   `src/Entity` : Mes Entités PHP qui représentent mes tables en BDD.
*   `templates/` : Toutes les vues Twig. J'ai essayé de bien organiser ça par dossier (`event/`, `admin/`, etc.).

---
