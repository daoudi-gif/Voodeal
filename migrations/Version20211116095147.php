<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116095147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utlilisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utlilisateur_annonce (utlilisateur_id INT NOT NULL, annonce_id INT NOT NULL, INDEX IDX_53DBCFFEBB306B89 (utlilisateur_id), INDEX IDX_53DBCFFE8805AB2F (annonce_id), PRIMARY KEY(utlilisateur_id, annonce_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utlilisateur_annonce ADD CONSTRAINT FK_53DBCFFEBB306B89 FOREIGN KEY (utlilisateur_id) REFERENCES utlilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utlilisateur_annonce ADD CONSTRAINT FK_53DBCFFE8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utlilisateur_annonce DROP FOREIGN KEY FK_53DBCFFE8805AB2F');
        $this->addSql('ALTER TABLE utlilisateur_annonce DROP FOREIGN KEY FK_53DBCFFEBB306B89');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utlilisateur');
        $this->addSql('DROP TABLE utlilisateur_annonce');
    }
}
