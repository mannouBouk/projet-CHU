<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513110849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nomonclature ADD repa_id INT DEFAULT NULL, ADD regime_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nomonclature ADD CONSTRAINT FK_ECB4BCCC5DEAEC1E FOREIGN KEY (repa_id) REFERENCES repa (id)');
        $this->addSql('ALTER TABLE nomonclature ADD CONSTRAINT FK_ECB4BCCC35E7D534 FOREIGN KEY (regime_id) REFERENCES regime_al (id)');
        $this->addSql('CREATE INDEX IDX_ECB4BCCC5DEAEC1E ON nomonclature (repa_id)');
        $this->addSql('CREATE INDEX IDX_ECB4BCCC35E7D534 ON nomonclature (regime_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nomonclature DROP FOREIGN KEY FK_ECB4BCCC5DEAEC1E');
        $this->addSql('ALTER TABLE nomonclature DROP FOREIGN KEY FK_ECB4BCCC35E7D534');
        $this->addSql('DROP INDEX IDX_ECB4BCCC5DEAEC1E ON nomonclature');
        $this->addSql('DROP INDEX IDX_ECB4BCCC35E7D534 ON nomonclature');
        $this->addSql('ALTER TABLE nomonclature DROP repa_id, DROP regime_id');
    }
}
