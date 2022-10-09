<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009185016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ALTER date_naissance_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE eleve ALTER date_naissance_at DROP DEFAULT');
        $this->addSql('ALTER TABLE eleve ALTER date_inscription_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE eleve ALTER date_inscription_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN eleve.date_naissance_at IS NULL');
        $this->addSql('COMMENT ON COLUMN eleve.date_inscription_at IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE eleve ALTER date_naissance_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE eleve ALTER date_naissance_at DROP DEFAULT');
        $this->addSql('ALTER TABLE eleve ALTER date_inscription_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE eleve ALTER date_inscription_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN eleve.date_naissance_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN eleve.date_inscription_at IS \'(DC2Type:datetime_immutable)\'');
    }
}
