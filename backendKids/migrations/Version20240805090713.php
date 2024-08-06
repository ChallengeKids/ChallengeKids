<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805090713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, chapter_id INT DEFAULT NULL, lesson_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_64C19C1579F4768 (chapter_id), INDEX IDX_64C19C1CDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE challenge (id INT AUTO_INCREMENT NOT NULL, kid_id INT DEFAULT NULL, coach_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image_file_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D70989512B36786B (title), INDEX IDX_D70989516A973770 (kid_id), INDEX IDX_D70989513C105691 (coach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE challenge_category (challenge_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_9B72FE2198A21AC6 (challenge_id), INDEX IDX_9B72FE2112469DE2 (category_id), PRIMARY KEY(challenge_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapter (id INT AUTO_INCREMENT NOT NULL, challenge_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, chapter_number INT DEFAULT NULL, INDEX IDX_F981B52E98A21AC6 (challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach (id INT NOT NULL, accepted TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach_category (coach_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_7EF0008B3C105691 (coach_id), INDEX IDX_7EF0008B12469DE2 (category_id), PRIMARY KEY(coach_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kid (id INT NOT NULL, points INT DEFAULT NULL, level VARCHAR(255) NOT NULL, friends JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kid_category (kid_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1F054AD16A973770 (kid_id), INDEX IDX_1F054AD112469DE2 (category_id), PRIMARY KEY(kid_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kid_parent (id INT NOT NULL, kid_id INT NOT NULL, UNIQUE INDEX UNIQ_373D56FD6A973770 (kid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kid_response (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, kid_id INT DEFAULT NULL, INDEX IDX_273258EB853CD175 (quiz_id), INDEX IDX_273258EB6A973770 (kid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, chapter_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, lesson_number INT NOT NULL, INDEX IDX_F87474F3579F4768 (chapter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, response_id INT DEFAULT NULL, type TINYINT(1) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_5A8600B01E27F6BF (question_id), UNIQUE INDEX UNIQ_5A8600B0FBF32840 (response_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, lesson_id INT DEFAULT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, added_date DATETIME NOT NULL, media_file_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_5A8A6C8DCDF80196 (lesson_id), INDEX IDX_5A8A6C8DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9A190604B89032C (post_id), INDEX IDX_B9A1906012469DE2 (category_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, question_number INT NOT NULL, type VARCHAR(255) NOT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, lesson_id INT NOT NULL, title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A412FA92CDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reaction (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, user_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_A4D707F74B89032C (post_id), INDEX IDX_A4D707F7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, birth_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1579F4768 FOREIGN KEY (chapter_id) REFERENCES chapter (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D70989516A973770 FOREIGN KEY (kid_id) REFERENCES kid (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D70989513C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE challenge_category ADD CONSTRAINT FK_9B72FE2198A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge_category ADD CONSTRAINT FK_9B72FE2112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chapter ADD CONSTRAINT FK_F981B52E98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCCBF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_category ADD CONSTRAINT FK_7EF0008B3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_category ADD CONSTRAINT FK_7EF0008B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887CBF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid_category ADD CONSTRAINT FK_1F054AD16A973770 FOREIGN KEY (kid_id) REFERENCES kid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid_category ADD CONSTRAINT FK_1F054AD112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid_parent ADD CONSTRAINT FK_373D56FD6A973770 FOREIGN KEY (kid_id) REFERENCES kid (id)');
        $this->addSql('ALTER TABLE kid_parent ADD CONSTRAINT FK_373D56FDBF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kid_response ADD CONSTRAINT FK_273258EB853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE kid_response ADD CONSTRAINT FK_273258EB6A973770 FOREIGN KEY (kid_id) REFERENCES kid (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3579F4768 FOREIGN KEY (chapter_id) REFERENCES chapter (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B01E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B0FBF32840 FOREIGN KEY (response_id) REFERENCES kid_response (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A190604B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A1906012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F74B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1579F4768');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1CDF80196');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D70989516A973770');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D70989513C105691');
        $this->addSql('ALTER TABLE challenge_category DROP FOREIGN KEY FK_9B72FE2198A21AC6');
        $this->addSql('ALTER TABLE challenge_category DROP FOREIGN KEY FK_9B72FE2112469DE2');
        $this->addSql('ALTER TABLE chapter DROP FOREIGN KEY FK_F981B52E98A21AC6');
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCCBF396750');
        $this->addSql('ALTER TABLE coach_category DROP FOREIGN KEY FK_7EF0008B3C105691');
        $this->addSql('ALTER TABLE coach_category DROP FOREIGN KEY FK_7EF0008B12469DE2');
        $this->addSql('ALTER TABLE kid DROP FOREIGN KEY FK_4523887CBF396750');
        $this->addSql('ALTER TABLE kid_category DROP FOREIGN KEY FK_1F054AD16A973770');
        $this->addSql('ALTER TABLE kid_category DROP FOREIGN KEY FK_1F054AD112469DE2');
        $this->addSql('ALTER TABLE kid_parent DROP FOREIGN KEY FK_373D56FD6A973770');
        $this->addSql('ALTER TABLE kid_parent DROP FOREIGN KEY FK_373D56FDBF396750');
        $this->addSql('ALTER TABLE kid_response DROP FOREIGN KEY FK_273258EB853CD175');
        $this->addSql('ALTER TABLE kid_response DROP FOREIGN KEY FK_273258EB6A973770');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3579F4768');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B01E27F6BF');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B0FBF32840');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DCDF80196');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA76ED395');
        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A190604B89032C');
        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A1906012469DE2');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92CDF80196');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F74B89032C');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F7A76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE challenge');
        $this->addSql('DROP TABLE challenge_category');
        $this->addSql('DROP TABLE chapter');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE coach_category');
        $this->addSql('DROP TABLE kid');
        $this->addSql('DROP TABLE kid_category');
        $this->addSql('DROP TABLE kid_parent');
        $this->addSql('DROP TABLE kid_response');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE reaction');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
