<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723073016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE SEQUENCE avis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE item_prescription_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE medecin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE patient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE prescription_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE sejour_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE visite_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE TABLE avis (id INT NOT NULL, medecin_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_8F91ABF04F31A84 ON avis (medecin_id)');
        // $this->addSql('CREATE TABLE item_prescription (id INT NOT NULL, prescription_id INT NOT NULL, medicament VARCHAR(255) NOT NULL, posologie VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_D0E5451893DB413D ON item_prescription (prescription_id)');
        // $this->addSql('CREATE TABLE medecin (id INT NOT NULL, utilisateur_id INT DEFAULT NULL, matricule VARCHAR(35) NOT NULL, specialty VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_1BDA53C6FB88E14F ON medecin (utilisateur_id)');
        // $this->addSql('CREATE TABLE patient (id INT NOT NULL, utilisateur_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBFB88E14F ON patient (utilisateur_id)');
        // $this->addSql('CREATE TABLE prescription (id INT NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE TABLE sejour (id INT NOT NULL, medecin_id INT NOT NULL, patient_id INT NOT NULL, date_in DATE NOT NULL, date_out DATE NOT NULL, motif VARCHAR(255) NOT NULL, specialty VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_96F520284F31A84 ON sejour (medecin_id)');
        // $this->addSql('CREATE INDEX IDX_96F520286B899279 ON sejour (patient_id)');
        // $this->addSql('CREATE TABLE visite (id INT NOT NULL, patient_id INT NOT NULL, avis_id INT DEFAULT NULL, prescription_id INT DEFAULT NULL, medecin_id INT NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_B09C8CBB6B899279 ON visite (patient_id)');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_B09C8CBB197E709F ON visite (avis_id)');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_B09C8CBB93DB413D ON visite (prescription_id)');
        // $this->addSql('CREATE INDEX IDX_B09C8CBB4F31A84 ON visite (medecin_id)');
        // $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF04F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE item_prescription ADD CONSTRAINT FK_D0E5451893DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F520284F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F520286B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB197E709F FOREIGN KEY (avis_id) REFERENCES avis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB93DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE "user" ADD nom VARCHAR(55) DEFAULT NULL');
        // $this->addSql('ALTER TABLE "user" ADD prenom VARCHAR(35) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE avis_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_prescription_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE medecin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE patient_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE prescription_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sejour_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE visite_id_seq CASCADE');
        $this->addSql('ALTER TABLE avis DROP CONSTRAINT FK_8F91ABF04F31A84');
        $this->addSql('ALTER TABLE item_prescription DROP CONSTRAINT FK_D0E5451893DB413D');
        $this->addSql('ALTER TABLE medecin DROP CONSTRAINT FK_1BDA53C6FB88E14F');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EBFB88E14F');
        $this->addSql('ALTER TABLE sejour DROP CONSTRAINT FK_96F520284F31A84');
        $this->addSql('ALTER TABLE sejour DROP CONSTRAINT FK_96F520286B899279');
        $this->addSql('ALTER TABLE visite DROP CONSTRAINT FK_B09C8CBB6B899279');
        $this->addSql('ALTER TABLE visite DROP CONSTRAINT FK_B09C8CBB197E709F');
        $this->addSql('ALTER TABLE visite DROP CONSTRAINT FK_B09C8CBB93DB413D');
        $this->addSql('ALTER TABLE visite DROP CONSTRAINT FK_B09C8CBB4F31A84');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE item_prescription');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE sejour');
        $this->addSql('DROP TABLE visite');
        $this->addSql('ALTER TABLE "user" DROP nom');
        $this->addSql('ALTER TABLE "user" DROP prenom');
    }
}
