<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240807151329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach ADD accepted TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD coach_id INT NOT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F33C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('CREATE INDEX IDX_F87474F33C105691 ON lesson (coach_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach DROP accepted');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F33C105691');
        $this->addSql('DROP INDEX IDX_F87474F33C105691 ON lesson');
        $this->addSql('ALTER TABLE lesson DROP coach_id');
    }
}
