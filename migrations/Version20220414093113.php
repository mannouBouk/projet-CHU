<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414093113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repa_regime_al DROP FOREIGN KEY FK_2185B10B5DEAEC1E');
        $this->addSql('DROP TABLE patient_regime_al');
        $this->addSql('DROP TABLE repa');
        $this->addSql('DROP TABLE repa_regime_al');
        $this->addSql('ALTER TABLE patient ADD service INT DEFAULT NULL, DROP nom_service, CHANGE regime regime VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patient_regime_al (patient_id INT NOT NULL, regime_al_id INT NOT NULL, INDEX IDX_556E053172C6ADE6 (regime_al_id), INDEX IDX_556E05316B899279 (patient_id), PRIMARY KEY(patient_id, regime_al_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE repa (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE repa_regime_al (repa_id INT NOT NULL, regime_al_id INT NOT NULL, INDEX IDX_2185B10B72C6ADE6 (regime_al_id), INDEX IDX_2185B10B5DEAEC1E (repa_id), PRIMARY KEY(repa_id, regime_al_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE patient_regime_al ADD CONSTRAINT FK_556E053172C6ADE6 FOREIGN KEY (regime_al_id) REFERENCES regime_al (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_regime_al ADD CONSTRAINT FK_556E05316B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repa_regime_al ADD CONSTRAINT FK_2185B10B72C6ADE6 FOREIGN KEY (regime_al_id) REFERENCES regime_al (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repa_regime_al ADD CONSTRAINT FK_2185B10B5DEAEC1E FOREIGN KEY (repa_id) REFERENCES repa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient ADD nom_service VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP service, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE regime regime VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regime_al CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE service CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
