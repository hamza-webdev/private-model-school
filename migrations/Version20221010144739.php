<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221010144739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP CONSTRAINT FK_ECA105F786EC68D8');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F786EC68D8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF3386EC68D8');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3386EC68D8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT fk_b723af3386ec68d8');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT fk_b723af3386ec68d8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE eleve DROP CONSTRAINT fk_eca105f786ec68d8');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT fk_eca105f786ec68d8 FOREIGN KEY (tuteur_id) REFERENCES tuteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
