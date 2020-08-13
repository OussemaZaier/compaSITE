<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200801134036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, association_id INT NOT NULL, nom_compte VARCHAR(255) NOT NULL, solde_compte DOUBLE PRECISION NOT NULL, device_compte VARCHAR(3) NOT NULL, separateur_milles VARCHAR(1) NOT NULL, separateur_decimale VARCHAR(1) NOT NULL, nombre_decimale INT NOT NULL, devise_droite TINYINT(1) NOT NULL, masquer_compte TINYINT(1) NOT NULL, classe_compte VARCHAR(255) DEFAULT NULL, INDEX IDX_CFF65260EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260EFB9C8A5 FOREIGN KEY (association_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compte');
    }
}
