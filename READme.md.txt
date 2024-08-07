Documentation Technique de l'Application du Zoo Arcadia

1. Réflexions Initiales Technologiques sur le Sujet
Choix Technologiques
Pour créer l'application du Zoo Arcadia, nous avons choisi des technologies permettant de garantir une solution robuste, évolutive et facile à maintenir.

Back-end : PHP a été sélectionné pour le développement côté serveur. Sa compatibilité avec MySQL et sa large adoption dans le développement web sont des atouts majeurs.
Front-end : Bootstrap a été adopté pour garantir une interface utilisateur moderne et réactive. jQuery a été utilisé pour faciliter les interactions AJAX, permettant des mises à jour dynamiques des pages sans rechargement complet.
Serveur : Apache a été choisi pour sa compatibilité avec PHP et sa gestion flexible des modules.
Sécurité : Des pratiques de codage sécurisées ont été mises en place, comme l'utilisation de requêtes préparées pour éviter les injections SQL et une gestion rigoureuse des sessions pour protéger les données des utilisateurs.
2. Configuration de Mon Environnement de Travail
Environnement de Développement
Pour garantir une efficacité maximale, un environnement de travail bien structuré a été mis en place :

Système d'exploitation : Windows.
Serveur local : XAMPP, fournissant Apache, MySQL, et PHP. Ce choix a permis de développer et tester localement avant le déploiement sur un serveur de production.
Éditeur de code : Visual Studio Code, pour sa légèreté et ses extensions adaptées à PHP, JavaScript, et au contrôle de version avec Git.
Contrôle de version : Git pour le suivi des versions et Bitbucket pour le stockage des dépôts en ligne.
Gestion des dépendances : Composer pour PHP et npm pour les paquets JavaScript.
Automatisation des tests : PHPUnit pour PHP, afin de garantir la fiabilité du code tout au long du développement.
3. Modèle Conceptuel de Données (MCD)
Entités Principales
Le modèle conceptuel de données est crucial pour comprendre les relations entre les différentes entités de l'application :

Utilisateur : ID unique, nom, adresse e-mail, mot de passe. Les utilisateurs peuvent être administrateurs ou visiteurs.
Service : ID unique, nom, description des services offerts par le zoo.
Animal : ID unique, nom, espèce, habitat, âge, santé.
Habitat : ID unique, type d'environnement (savane, forêt, aquarium, etc.).
Rapport Vétérinaire : ID unique, date, description, lié à un animal et un vétérinaire.
Relations Principales
Les utilisateurs peuvent créer et gérer des services, animaux, habitats et rapports.
Chaque animal est associé à un habitat spécifique.
Les rapports vétérinaires sont liés à des animaux spécifiques.
4. Diagrammes
Diagramme d'Utilisation
Le diagramme d'utilisation illustre les principales interactions des utilisateurs avec le système :

Administrateur :

Gérer les utilisateurs
Gérer les services
Gérer les animaux
Gérer les habitats
Gérer les rapports vétérinaires
Consulter les rapports
Visiteur :

Consulter les services
Consulter les animaux
Consulter les habitats
Consulter les rapports vétérinaires
Diagramme de Séquence
Le diagramme de séquence décrit les interactions pour la création d'un nouveau service :

L'Administrateur sélectionne "Ajouter un service".
L'Interface Utilisateur affiche le formulaire de création.
L'Administrateur remplit et soumet le formulaire.
L'Interface Utilisateur envoie les données au Contrôleur PHP.
Le Contrôleur PHP valide les données et envoie une requête à la Base de Données.
La Base de Données confirme l'ajout du nouveau service.
Le Contrôleur PHP retourne une confirmation à l'Interface Utilisateur.
L'Interface Utilisateur affiche un message de succès à l'Administrateur.
5. Documentation du Déploiement de l'Application
Étapes de Déploiement
Préparation du Serveur :

Installation d'Apache, MySQL, et PHP.
Configuration des paramètres de sécurité, y compris les certificats SSL pour HTTPS.
Mise en place des règles de pare-feu.
Déploiement Initial :

Clonage du dépôt Git sur le serveur de production.
Configuration des variables d'environnement pour le mode production.
Installation des dépendances via Composer et npm.
Migration de la Base de Données :

Exportation et importation des schémas et données de la base de données.
Exécution des scripts de migration pour assurer la conformité de la structure.
Configuration et Tests :

Configuration du fichier config.php pour l'environnement de production.
Réalisation de tests exhaustifs pour vérifier les fonctionnalités.
Lancement et Surveillance :

Mise en ligne de l'application.
Surveillance des journaux et performances.
Mise en place de backups réguliers.
6. Difficultés Rencontrées
Le projet a rencontré plusieurs défis, principalement liés à l'utilisation de PHP et à la gestion de la base de données.

LIEN DU GIT HUB


https://github.com/Fleursdhistoire/Gestion_Arcadia



Problèmes avec PHP
Gestion des Versions : Certaines versions de PHP ont introduit des changements incompatibles avec le code existant, nécessitant des ajustements fréquents.
Débogage : Identifier et corriger les erreurs de code PHP a été difficile, surtout avec des erreurs d'exécution parfois peu explicites.
Difficultés avec la Base de Données
Compatibilité des Technologies : Nous avons constaté que certaines technologies et fonctionnalités disponibles en développement local n'étaient pas autorisées en environnement de production. Par exemple, certaines extensions PHP utilisées localement ne l’étaient pas sur le serveur de production, ce qui a entraîné des incompatibilités et des erreurs inattendues.
Migration de Données : La migration des données de la base de développement vers la base de production a été compliquée par des différences de configuration et de structure.
Ces difficultés ont nécessité une attention particulière et une adaptation continue des configurations et des pratiques de développement pour assurer la réussite du projet.