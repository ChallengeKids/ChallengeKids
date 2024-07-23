<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722231612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE challenge_category (challenge_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_9B72FE2198A21AC6 (challenge_id), INDEX IDX_9B72FE2112469DE2 (category_id), PRIMARY KEY(challenge_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9A190604B89032C (post_id), INDEX IDX_B9A1906012469DE2 (category_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge_category ADD CONSTRAINT FK_9B72FE2198A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge_category ADD CONSTRAINT FK_9B72FE2112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A190604B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A1906012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C198A21AC6');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C14B89032C');
        $this->addSql('DROP INDEX IDX_64C19C14B89032C ON category');
        $this->addSql('DROP INDEX IDX_64C19C198A21AC6 ON category');
        $this->addSql('ALTER TABLE category DROP challenge_id, DROP post_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge_category DROP FOREIGN KEY FK_9B72FE2198A21AC6');
        $this->addSql('ALTER TABLE challenge_category DROP FOREIGN KEY FK_9B72FE2112469DE2');
        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A190604B89032C');
        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A1906012469DE2');
        $this->addSql('DROP TABLE challenge_category');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('ALTER TABLE category ADD challenge_id INT DEFAULT NULL, ADD post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C198A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C14B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_64C19C14B89032C ON category (post_id)');
        $this->addSql('CREATE INDEX IDX_64C19C198A21AC6 ON category (challenge_id)');
    }
}
