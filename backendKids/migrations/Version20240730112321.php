<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240730112321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coach_category (coach_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_7EF0008B3C105691 (coach_id), INDEX IDX_7EF0008B12469DE2 (category_id), PRIMARY KEY(coach_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coach_category ADD CONSTRAINT FK_7EF0008B3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_category ADD CONSTRAINT FK_7EF0008B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C13C105691');
        $this->addSql('DROP INDEX IDX_64C19C13C105691 ON category');
        $this->addSql('ALTER TABLE category DROP coach_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach_category DROP FOREIGN KEY FK_7EF0008B3C105691');
        $this->addSql('ALTER TABLE coach_category DROP FOREIGN KEY FK_7EF0008B12469DE2');
        $this->addSql('DROP TABLE coach_category');
        $this->addSql('ALTER TABLE category ADD coach_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C13C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('CREATE INDEX IDX_64C19C13C105691 ON category (coach_id)');
    }
}
