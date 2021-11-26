<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115141812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE security_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_52825A88E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music ADD security_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE music ADD CONSTRAINT FK_CD52224ACA85D888 FOREIGN KEY (security_user_id) REFERENCES security_user (id)');
        $this->addSql('CREATE INDEX IDX_CD52224ACA85D888 ON music (security_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music DROP FOREIGN KEY FK_CD52224ACA85D888');
        $this->addSql('DROP TABLE security_user');
        $this->addSql('DROP INDEX IDX_CD52224ACA85D888 ON music');
        $this->addSql('ALTER TABLE music DROP security_user_id');
    }
}