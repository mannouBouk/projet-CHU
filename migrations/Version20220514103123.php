<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514103123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repas_servis ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE repas_servis ADD CONSTRAINT FK_E829F7E36B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_E829F7E36B899279 ON repas_servis (patient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repas_servis DROP FOREIGN KEY FK_E829F7E36B899279');
        $this->addSql('DROP INDEX IDX_E829F7E36B899279 ON repas_servis');
        $this->addSql('ALTER TABLE repas_servis DROP patient_id');
    }
}
