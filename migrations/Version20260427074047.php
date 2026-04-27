<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260427074047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY `FK_FD71A9C5A9E2D76C`');
        $this->addSql('DROP INDEX IDX_FD71A9C5A9E2D76C ON joueur');
        $this->addSql('ALTER TABLE joueur ADD responsable_id INT NOT NULL, DROP joueur_id');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C553C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_FD71A9C553C59D72 ON joueur (responsable_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C553C59D72');
        $this->addSql('DROP INDEX IDX_FD71A9C553C59D72 ON joueur');
        $this->addSql('ALTER TABLE joueur ADD joueur_id INT DEFAULT NULL, DROP responsable_id');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT `FK_FD71A9C5A9E2D76C` FOREIGN KEY (joueur_id) REFERENCES responsable (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FD71A9C5A9E2D76C ON joueur (joueur_id)');
    }
}
