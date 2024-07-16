


CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    role_id INT NOT NULL
);

CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL
);

CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    race VARCHAR(50) NOT NULL,
    habitat_id INT NOT NULL,
    etat VARCHAR(50)
);

CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    commentaire_habitat VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT NOT NULL,
    date DATE NOT NULL,
    detail VARCHAR(255)
);

CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    commentaire VARCHAR(255) NOT NULL,
    isVisible BOOLEAN DEFAULT TRUE
);

CREATE TABLE contact (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data BLOB
);

CREATE TABLE nourriture (
    nourriture_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    type_nourriture VARCHAR(50) NOT NULL,
    quantite INT NOT NULL
);

CREATE TABLE consultation (
    consultation_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE commentaire_habitat (
    commentaire_habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    habitat_id INT NOT NULL,
    commentaire VARCHAR(255) NOT NULL
);

-- Indexes and foreign keys
ALTER TABLE utilisateur ADD CONSTRAINT fk_role FOREIGN KEY (role_id) REFERENCES role(role_id);
ALTER TABLE animal ADD CONSTRAINT fk_habitat FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id);
ALTER TABLE rapport_veterinaire ADD CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES animal(animal_id);
ALTER TABLE nourriture ADD CONSTRAINT fk_animal_nourriture FOREIGN KEY (animal_id) REFERENCES animal(animal_id);
ALTER TABLE consultation ADD CONSTRAINT fk_animal_consultation FOREIGN KEY (animal_id) REFERENCES animal(animal_id);
ALTER TABLE commentaire_habitat ADD CONSTRAINT fk_habitat_commentaire FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id);
