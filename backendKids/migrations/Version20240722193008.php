<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722193008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kid_category (kid_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1F054AD16A973770 (kid_id), INDEX IDX_1F054AD112469DE2 (category_id), PRIMARY KEY(kid_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kid_category ADD CONSTRAINT FK_1F054AD16A973770 FOREIGN KEY (kid_id) REFERENCES kid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid_category ADD CONSTRAINT FK_1F054AD112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C16A973770');
        $this->addSql('DROP INDEX IDX_64C19C16A973770 ON category');
        $this->addSql('ALTER TABLE category DROP kid_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid_category DROP FOREIGN KEY FK_1F054AD16A973770');
        $this->addSql('ALTER TABLE kid_category DROP FOREIGN KEY FK_1F054AD112469DE2');
        $this->addSql('DROP TABLE kid_category');
        $this->addSql('ALTER TABLE category ADD kid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C16A973770 FOREIGN KEY (kid_id) REFERENCES kid (id)');
        $this->addSql('CREATE INDEX IDX_64C19C16A973770 ON category (kid_id)');
    }
}
