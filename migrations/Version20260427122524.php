<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260427122524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carton ADD rencontre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carton ADD CONSTRAINT FK_415111066CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('CREATE INDEX IDX_415111066CFC0818 ON carton (rencontre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carton DROP FOREIGN KEY FK_415111066CFC0818');
        $this->addSql('DROP INDEX IDX_415111066CFC0818 ON carton');
        $this->addSql('ALTER TABLE carton DROP rencontre_id');
    }
}
