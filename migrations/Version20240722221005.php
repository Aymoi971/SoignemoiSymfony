<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722221005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE medecin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE medecin (id INT NOT NULL, utilisateur_id INT DEFAULT NULL, matricule VARCHAR(35) NOT NULL, specialty VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BDA53C6FB88E14F ON medecin (utilisateur_id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE medecin_id_seq CASCADE');
        $this->addSql('ALTER TABLE medecin DROP CONSTRAINT FK_1BDA53C6FB88E14F');
        $this->addSql('DROP TABLE medecin');
    }
}
