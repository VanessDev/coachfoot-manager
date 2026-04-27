<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260427073405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carton (id INT AUTO_INCREMENT NOT NULL, couleur_carton VARCHAR(20) NOT NULL, date_carton DATE NOT NULL, motif LONGTEXT DEFAULT NULL, joueur_id INT NOT NULL, INDEX IDX_41511106A9E2D76C (joueur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE entrainement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, date_entrainement DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, lieu VARCHAR(150) DEFAULT NULL, equipe_id INT NOT NULL, INDEX IDX_A27444E56D861B89 (equipe_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE entraineur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom_equipe VARCHAR(100) NOT NULL, categorie VARCHAR(50) NOT NULL, saison VARCHAR(20) NOT NULL, entraineur_id INT NOT NULL, INDEX IDX_2449BA15F8478A1 (entraineur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, date_naissance DATE NOT NULL, genre VARCHAR(20) DEFAULT NULL, docteur_nom VARCHAR(100) DEFAULT NULL, docteur_phone VARCHAR(30) DEFAULT NULL, poste_prefere VARCHAR(50) DEFAULT NULL, statut VARCHAR(30) NOT NULL, equipe_id INT NOT NULL, joueur_id INT DEFAULT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), INDEX IDX_FD71A9C5A9E2D76C (joueur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, nom_materiel VARCHAR(100) NOT NULL, quantite_actuelle INT NOT NULL, seuil_alerte INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE rencontre (id INT AUTO_INCREMENT NOT NULL, date_match DATE NOT NULL, heure_match TIME NOT NULL, lieu VARCHAR(150) DEFAULT NULL, adversaire VARCHAR(100) DEFAULT NULL, type_match VARCHAR(50) DEFAULT NULL, score_equipe INT DEFAULT NULL, score_adversaire INT DEFAULT NULL, resume LONGTEXT DEFAULT NULL, equipe_id INT NOT NULL, INDEX IDX_460C35ED6D861B89 (equipe_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, telephone VARCHAR(30) DEFAULT NULL, email VARCHAR(150) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE suivi_stock (id INT AUTO_INCREMENT NOT NULL, date_mouvement DATE NOT NULL, type_mouvement VARCHAR(30) NOT NULL, quantite INT NOT NULL, materiel_id INT NOT NULL, INDEX IDX_E83A764316880AAF (materiel_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE carton ADD CONSTRAINT FK_41511106A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE entrainement ADD CONSTRAINT FK_A27444E56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15F8478A1 FOREIGN KEY (entraineur_id) REFERENCES entraineur (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5A9E2D76C FOREIGN KEY (joueur_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35ED6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE suivi_stock ADD CONSTRAINT FK_E83A764316880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carton DROP FOREIGN KEY FK_41511106A9E2D76C');
        $this->addSql('ALTER TABLE entrainement DROP FOREIGN KEY FK_A27444E56D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15F8478A1');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5A9E2D76C');
        $this->addSql('ALTER TABLE rencontre DROP FOREIGN KEY FK_460C35ED6D861B89');
        $this->addSql('ALTER TABLE suivi_stock DROP FOREIGN KEY FK_E83A764316880AAF');
        $this->addSql('DROP TABLE carton');
        $this->addSql('DROP TABLE entrainement');
        $this->addSql('DROP TABLE entraineur');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE rencontre');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE suivi_stock');
    }
}
