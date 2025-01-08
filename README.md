# API-MagasinConnecté

Ce dépôt contient le code de l’API back-end du site web **Magasin Connecté**, hébergée sur un serveur AlwaysData.  
Le site est accessible à l’adresse suivante : https://mael-leperlier-etu.pedaweb.univ-amu.fr.

GitHub du projet principal : https://github.com/BELABBAS-Rayane-2225010aa/SAE5.01.  

Cette API est développée en **PHP 8.2**.  

Pour se connecter au serveur, nous utilisons une clé SSH. Si vous avez besoin d’y accéder, veuillez nous demander directement cette clé.  

L’objectif final de cette API est de servir de back-end au site web.  

## Fonctionnalités actuellement terminées :  
- Gestion de la **connextion** des utilisateur  
- Gestion des **événements** : opérations GET, POST, PUT et DELETE.  
- Gestion des **utilisateurs** : opération GET, POST, PUT et DELETE.  
- Gestion des **boutiques** : opération GET, POST, PUT et DELETE.  

## Fonctionnalités à revoir ou à implémenter :  
- Gestion du **login des utilisateurs** avec des tokens d’authentification, comme dans la version originale du site.  
- Modification du fonctionnement des **boutiques**, notamment les horaires d’ouverture.  
- Mise en place de **tests unitaires** pour les différentes fonctionnalités.  
- Intégration d’une **base de données** (à confirmer).  

## Limitations actuelles :  
Cette API n’utilise pas de base de données pour le moment, car nous ne sommes pas encore certains du serveur final qui sera utilisé. L’hébergement actuel est temporaire.  
