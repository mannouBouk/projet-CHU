<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427125845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        /*$this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DB55987');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP INDEX IDX_8D93D6494DB55987 ON user');
        $this->addSql('ALTER TABLE user DROP rolee_id, role_id');
    */
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        /*  $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user ADD rolee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DB55987 FOREIGN KEY (rolee_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494DB55987 ON user (rolee_id)');
    */
    }
}
