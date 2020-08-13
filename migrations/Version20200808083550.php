<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200808083550 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE budget ADD association_id INT NOT NULL');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77BEFB9C8A5 FOREIGN KEY (association_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_73F2F77BEFB9C8A5 ON budget (association_id)');
        $this->addSql('ALTER TABLE operation ADD associatione_id INT DEFAULT NULL, ADD associationc_id INT DEFAULT NULL, ADD associationt_id INT DEFAULT NULL, ADD associationmp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D34505BC9 FOREIGN KEY (associatione_id) REFERENCES echeances (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D113B0415 FOREIGN KEY (associationc_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DDCF56B33 FOREIGN KEY (associationt_id) REFERENCES tiers (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D27387345 FOREIGN KEY (associationmp_id) REFERENCES mode_paiement (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D34505BC9 ON operation (associatione_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D113B0415 ON operation (associationc_id)');
        $this->addSql('CREATE INDEX IDX_1981A66DDCF56B33 ON operation (associationt_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D27387345 ON operation (associationmp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE budget DROP FOREIGN KEY FK_73F2F77BEFB9C8A5');
        $this->addSql('DROP INDEX IDX_73F2F77BEFB9C8A5 ON budget');
        $this->addSql('ALTER TABLE budget DROP association_id');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D34505BC9');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D113B0415');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DDCF56B33');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D27387345');
        $this->addSql('DROP INDEX IDX_1981A66D34505BC9 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66D113B0415 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66DDCF56B33 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66D27387345 ON operation');
        $this->addSql('ALTER TABLE operation DROP associatione_id, DROP associationc_id, DROP associationt_id, DROP associationmp_id');
    }
}
