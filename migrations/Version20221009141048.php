<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009141048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD tuteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F786EC68D8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_ECA105F786EC68D8 ON eleve (tuteur_id)');
        $this->addSql('ALTER TABLE student ADD tuteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3386EC68D8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B723AF3386EC68D8 ON student (tuteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF3386EC68D8');
        $this->addSql('DROP INDEX IDX_B723AF3386EC68D8');
        $this->addSql('ALTER TABLE student DROP tuteur_id');
        $this->addSql('ALTER TABLE eleve DROP CONSTRAINT FK_ECA105F786EC68D8');
        $this->addSql('DROP INDEX IDX_ECA105F786EC68D8');
        $this->addSql('ALTER TABLE eleve DROP tuteur_id');
    }
}
