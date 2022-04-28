<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220328151054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('DROP TABLE profilrole');
        // $this->addSql('ALTER TABLE role ADD description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE profilrole (id INT AUTO_INCREMENT NOT NULL, ajouterutilisateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, activutilisateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, desactutilisateur TINYINT(1) NOT NULL, modifierutilisateur TINYINT(1) NOT NULL, ajouterservice TINYINT(1) NOT NULL, supprimerservice TINYINT(1) NOT NULL, modifierservice TINYINT(1) NOT NULL, ajouteregimesalimentaires TINYINT(1) NOT NULL, supprimerregimesalimentaires TINYINT(1) NOT NULL, ajouterpi TINYINT(1) NOT NULL, ajouterlespatients TINYINT(1) NOT NULL, activationoudesactivationdespatients TINYINT(1) NOT NULL, ajouterregimesalimentairesp TINYINT(1) NOT NULL, ajouterprofilerole TINYINT(1) NOT NULL, modifierprofilerole TINYINT(1) NOT NULL, supprimerprofilerole TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        // $this->addSql('ALTER TABLE patient CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE service service VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE regime regime VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE regime_al CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE repas CHANGE petitdej petitdej VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dejeuner dejeuner VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diner diner VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE role DROP description, CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE profilrole profilrole VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE service CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        //  $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
