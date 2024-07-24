<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723003404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('DROP SEQUENCE medecin_id_seq CASCADE');
        // $this->addSql('ALTER TABLE medecin DROP CONSTRAINT fk_1bda53c6fb88e14f');
        // $this->addSql('DROP TABLE medecin');
        // $this->addSql('ALTER TABLE "user" DROP nom');
        // $this->addSql('ALTER TABLE "user" DROP prenom');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE medecin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE medecin (id INT NOT NULL, utilisateur_id INT DEFAULT NULL, matricule VARCHAR(35) NOT NULL, specialty VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_1bda53c6fb88e14f ON medecin (utilisateur_id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT fk_1bda53c6fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD nom VARCHAR(55) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD prenom VARCHAR(35) DEFAULT NULL');
    }
}
