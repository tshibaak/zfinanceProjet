-- Schéma de la base Zfinances
CREATE DATABASE IF NOT EXISTS zfinance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE zfinance;

-- Messages du formulaire de contact
CREATE TABLE IF NOT EXISTS contacts (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nom        VARCHAR(255) NOT NULL,
  email      VARCHAR(255) NOT NULL,
  telephone  VARCHAR(50),
  sujet      VARCHAR(150) NOT NULL,
  message    TEXT NOT NULL,
  statut     ENUM('lu','non_lu') NOT NULL DEFAULT 'non_lu',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Abonnés newsletter
CREATE TABLE IF NOT EXISTS subscribers (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  email      VARCHAR(255) NOT NULL UNIQUE,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Témoignages
CREATE TABLE IF NOT EXISTS testimonials (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  author     VARCHAR(255) NOT NULL,
  company    VARCHAR(255),
  message    TEXT NOT NULL,
  rating     TINYINT NOT NULL DEFAULT 5,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Comptes admin (mot de passe HASHÉ — voir database/seed.php)
CREATE TABLE IF NOT EXISTS admin (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nameAdmin  VARCHAR(60) NOT NULL UNIQUE,
  passAdmin  VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
