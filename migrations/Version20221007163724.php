<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007163724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE classeroom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lesson_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE primary_school_level_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE specialization_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE teacher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE classeroom (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE lesson (id INT NOT NULL, teacher_id INT DEFAULT NULL, education_material_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F87474F341807E1D ON lesson (teacher_id)');
        $this->addSql('CREATE INDEX IDX_F87474F3A68A0CED ON lesson (education_material_id)');
        $this->addSql('COMMENT ON COLUMN lesson.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN lesson.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE lesson_classeroom (lesson_id INT NOT NULL, classeroom_id INT NOT NULL, PRIMARY KEY(lesson_id, classeroom_id))');
        $this->addSql('CREATE INDEX IDX_207A8F22CDF80196 ON lesson_classeroom (lesson_id)');
        $this->addSql('CREATE INDEX IDX_207A8F22856F58DA ON lesson_classeroom (classeroom_id)');
        $this->addSql('CREATE TABLE primary_school_level (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE primary_school_level_classeroom (primary_school_level_id INT NOT NULL, classeroom_id INT NOT NULL, PRIMARY KEY(primary_school_level_id, classeroom_id))');
        $this->addSql('CREATE INDEX IDX_11EA392B498ED4F ON primary_school_level_classeroom (primary_school_level_id)');
        $this->addSql('CREATE INDEX IDX_11EA392856F58DA ON primary_school_level_classeroom (classeroom_id)');
        $this->addSql('CREATE TABLE specialization (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE specialization_teacher (specialization_id INT NOT NULL, teacher_id INT NOT NULL, PRIMARY KEY(specialization_id, teacher_id))');
        $this->addSql('CREATE INDEX IDX_2D7304BDFA846217 ON specialization_teacher (specialization_id)');
        $this->addSql('CREATE INDEX IDX_2D7304BD41807E1D ON specialization_teacher (teacher_id)');
        $this->addSql('CREATE TABLE teacher (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, gendre VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F341807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3A68A0CED FOREIGN KEY (education_material_id) REFERENCES specialization (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson_classeroom ADD CONSTRAINT FK_207A8F22CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson_classeroom ADD CONSTRAINT FK_207A8F22856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE primary_school_level_classeroom ADD CONSTRAINT FK_11EA392B498ED4F FOREIGN KEY (primary_school_level_id) REFERENCES primary_school_level (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE primary_school_level_classeroom ADD CONSTRAINT FK_11EA392856F58DA FOREIGN KEY (classeroom_id) REFERENCES classeroom (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE specialization_teacher ADD CONSTRAINT FK_2D7304BDFA846217 FOREIGN KEY (specialization_id) REFERENCES specialization (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE specialization_teacher ADD CONSTRAINT FK_2D7304BD41807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE lesson_classeroom DROP CONSTRAINT FK_207A8F22856F58DA');
        $this->addSql('ALTER TABLE primary_school_level_classeroom DROP CONSTRAINT FK_11EA392856F58DA');
        $this->addSql('ALTER TABLE lesson_classeroom DROP CONSTRAINT FK_207A8F22CDF80196');
        $this->addSql('ALTER TABLE primary_school_level_classeroom DROP CONSTRAINT FK_11EA392B498ED4F');
        $this->addSql('ALTER TABLE lesson DROP CONSTRAINT FK_F87474F3A68A0CED');
        $this->addSql('ALTER TABLE specialization_teacher DROP CONSTRAINT FK_2D7304BDFA846217');
        $this->addSql('ALTER TABLE lesson DROP CONSTRAINT FK_F87474F341807E1D');
        $this->addSql('ALTER TABLE specialization_teacher DROP CONSTRAINT FK_2D7304BD41807E1D');
        $this->addSql('DROP SEQUENCE classeroom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lesson_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE primary_school_level_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE specialization_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE teacher_id_seq CASCADE');
        $this->addSql('DROP TABLE classeroom');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE lesson_classeroom');
        $this->addSql('DROP TABLE primary_school_level');
        $this->addSql('DROP TABLE primary_school_level_classeroom');
        $this->addSql('DROP TABLE specialization');
        $this->addSql('DROP TABLE specialization_teacher');
        $this->addSql('DROP TABLE teacher');
    }
}
