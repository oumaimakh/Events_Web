# EventsWeb
C'est une application web pour la gestion des événements:

Fonctionnalités pour visiteur:

    -Consulter les événements et leurs détailles 
      le lieu de l'événement, la localisation de l'utilisateur et l'itinéraire sont affiché sur une carte Bing
    -Réserver une place dans un événement (Gestion des doublons)
    -Accéder à ses réservations
    -Supprimer une réservation

Fonctionnalités pour l'administrateur:

    - Les fonctions CRUD pour les événements; il peut consulter, modifier, ajouter et supprimer un événement
    - Consulter la liste des inscrits pour un événement
    - La modification et l'affichage de l'événement se font sur la meme page en utilisant (ContentEditable)
    
Description de la base de données: On a 4 tables:

Admin: identifiant, login et un mot de passe
Inscrit qui contient les information sur les utilisateurs inscrits: identifiant, nom, prenom, adresse mail, code qui est un mode passe généré après la première réservation faite par l'inscrit
Evénement: identifiant, un titre, une description, une date, le lieu, la categorie, le prix, l'heure de début et l'heure de la fin
Inscription qui est une table de jointure: identifiant, identifiant de l'inscrit et identifiant de l'événement  
