<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401101532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //  $this->addSql('CREATE TABLE patient_service (patient_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_BCFECF396B899279 (patient_id), INDEX IDX_BCFECF39ED5CA9E6 (service_id), PRIMARY KEY(patient_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //  $this->addSql('ALTER TABLE patient_service ADD CONSTRAINT FK_BCFECF396B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        //   $this->addSql('ALTER TABLE patient_service ADD CONSTRAINT FK_BCFECF39ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        //  $this->addSql('ALTER TABLE patient DROP service');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //  $this->addSql('DROP TABLE patient_service');
        //   $this->addSql('ALTER TABLE patient ADD service VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE regime regime VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        //  $this->addSql('ALTER TABLE regime_al CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        //   $this->addSql('ALTER TABLE repas CHANGE petitdej petitdej VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dejeuner dejeuner VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diner diner VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        //  $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE service CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        //  $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
