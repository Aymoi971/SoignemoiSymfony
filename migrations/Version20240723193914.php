<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723193914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE SEQUENCE specialty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE TABLE specialty (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('ALTER TABLE medecin ADD specialty_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE medecin DROP specialty');
        // $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C69A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_1BDA53C69A353316 ON medecin (specialty_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE medecin DROP CONSTRAINT FK_1BDA53C69A353316');
        $this->addSql('DROP SEQUENCE specialty_id_seq CASCADE');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP INDEX IDX_1BDA53C69A353316');
        $this->addSql('ALTER TABLE medecin ADD specialty VARCHAR(55) NOT NULL');
        $this->addSql('ALTER TABLE medecin DROP specialty_id');
    }
}
