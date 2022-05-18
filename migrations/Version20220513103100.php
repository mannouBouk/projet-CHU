<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513103100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadre_medicale_service DROP FOREIGN KEY FK_73AF0B9A32A06E92');
        $this->addSql('DROP TABLE cadre_medicale');
        $this->addSql('DROP TABLE cadre_medicale_service');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cadre_medicale (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, service VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cadre_medicale_service (cadre_medicale_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_73AF0B9A32A06E92 (cadre_medicale_id), INDEX IDX_73AF0B9AED5CA9E6 (service_id), PRIMARY KEY(cadre_medicale_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cadre_medicale_service ADD CONSTRAINT FK_73AF0B9AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cadre_medicale_service ADD CONSTRAINT FK_73AF0B9A32A06E92 FOREIGN KEY (cadre_medicale_id) REFERENCES cadre_medicale (id) ON DELETE CASCADE');
    }
}
