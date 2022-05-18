<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513105904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regime_al ADD nomonclature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regime_al ADD CONSTRAINT FK_F3E5D70E7A883CD9 FOREIGN KEY (nomonclature_id) REFERENCES nomonclature (id)');
        $this->addSql('CREATE INDEX IDX_F3E5D70E7A883CD9 ON regime_al (nomonclature_id)');
        $this->addSql('ALTER TABLE repa ADD nomonclature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE repa ADD CONSTRAINT FK_BBE496F87A883CD9 FOREIGN KEY (nomonclature_id) REFERENCES nomonclature (id)');
        $this->addSql('CREATE INDEX IDX_BBE496F87A883CD9 ON repa (nomonclature_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regime_al DROP FOREIGN KEY FK_F3E5D70E7A883CD9');
        $this->addSql('DROP INDEX IDX_F3E5D70E7A883CD9 ON regime_al');
        $this->addSql('ALTER TABLE regime_al DROP nomonclature_id');
        $this->addSql('ALTER TABLE repa DROP FOREIGN KEY FK_BBE496F87A883CD9');
        $this->addSql('DROP INDEX IDX_BBE496F87A883CD9 ON repa');
        $this->addSql('ALTER TABLE repa DROP nomonclature_id');
    }
}
