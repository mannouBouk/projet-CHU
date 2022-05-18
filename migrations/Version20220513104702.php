<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513104702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repa_regime_al');
        $this->addSql('ALTER TABLE repa CHANGE prix repas DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repa_regime_al (repa_id INT NOT NULL, regime_al_id INT NOT NULL, INDEX IDX_2185B10B5DEAEC1E (repa_id), INDEX IDX_2185B10B72C6ADE6 (regime_al_id), PRIMARY KEY(repa_id, regime_al_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE repa_regime_al ADD CONSTRAINT FK_2185B10B72C6ADE6 FOREIGN KEY (regime_al_id) REFERENCES regime_al (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repa_regime_al ADD CONSTRAINT FK_2185B10B5DEAEC1E FOREIGN KEY (repa_id) REFERENCES repa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repa CHANGE repas prix DOUBLE PRECISION NOT NULL');
    }
}
