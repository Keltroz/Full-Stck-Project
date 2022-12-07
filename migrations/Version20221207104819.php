<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207104819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, fk_course_id_id INT DEFAULT NULL, booking_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_E00CEDDEB7329BA6 (fk_course_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, fk_trainer_id_id INT NOT NULL, description VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, price NUMERIC(10, 2) NOT NULL, capacity INT NOT NULL, available TINYINT(1) NOT NULL, INDEX IDX_169E6FB95649BAF8 (fk_trainer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, fk_user_id_id INT NOT NULL, fk_course_id_id INT NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_794381C66DE8AF9C (fk_user_id_id), UNIQUE INDEX UNIQ_794381C6B7329BA6 (fk_course_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainer (id INT AUTO_INCREMENT NOT NULL, fk_user_id_id INT NOT NULL, information VARCHAR(255) DEFAULT NULL, specialty VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C51508206DE8AF9C (fk_user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEB7329BA6 FOREIGN KEY (fk_course_id_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB95649BAF8 FOREIGN KEY (fk_trainer_id_id) REFERENCES trainer (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C66DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6B7329BA6 FOREIGN KEY (fk_course_id_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE trainer ADD CONSTRAINT FK_C51508206DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEB7329BA6');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB95649BAF8');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C66DE8AF9C');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6B7329BA6');
        $this->addSql('ALTER TABLE trainer DROP FOREIGN KEY FK_C51508206DE8AF9C');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE trainer');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
