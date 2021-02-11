<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211211307 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_comment (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, book_name_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_5048D0E516A2B381 (book_id), INDEX IDX_5048D0E5E237B440 (book_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE age_group (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, min_age INT NOT NULL, max_age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author_book (author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2F0A2BEEF675F31B (author_id), INDEX IDX_2F0A2BEE16A2B381 (book_id), PRIMARY KEY(author_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, availability_id INT DEFAULT NULL, age_group_id INT NOT NULL, title VARCHAR(255) NOT NULL, extract LONGTEXT DEFAULT NULL, editor VARCHAR(255) NOT NULL, cover_photo VARCHAR(255) NOT NULL, photo_1 VARCHAR(255) DEFAULT NULL, photo_2 VARCHAR(255) DEFAULT NULL, publishing_house VARCHAR(255) NOT NULL, publication_date DATE NOT NULL, collection VARCHAR(255) NOT NULL, ean_code VARCHAR(255) NOT NULL, isbn_code VARCHAR(255) NOT NULL, number_pages INT NOT NULL, dimension_h INT NOT NULL, dimension_w INT NOT NULL, weight INT NOT NULL, language VARCHAR(255) NOT NULL, original_language VARCHAR(255) NOT NULL, stock INT NOT NULL, price INT NOT NULL, admin_notation INT DEFAULT NULL, INDEX IDX_CBE5A33161778466 (availability_id), INDEX IDX_CBE5A331B09E220E (age_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, event_id INT NOT NULL, number_participants INT NOT NULL, INDEX IDX_E00CEDDE9395C3F3 (customer_id), INDEX IDX_E00CEDDE71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(6) NOT NULL, city VARCHAR(255) NOT NULL, age VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, newsletter TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_comment (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, customer_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_88A9F6D216A2B381 (book_id), INDEX IDX_88A9F6D29395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_notation (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, book_id INT NOT NULL, notation INT NOT NULL, INDEX IDX_2EADFFBA9395C3F3 (customer_id), INDEX IDX_2EADFFBA16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, age_group_id INT DEFAULT NULL, venue_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, category VARCHAR(255) NOT NULL, date DATETIME NOT NULL, duration DATETIME NOT NULL, presentation LONGTEXT DEFAULT NULL, booking_required TINYINT(1) NOT NULL, free TINYINT(1) NOT NULL, price INT DEFAULT NULL, max_participants INT DEFAULT NULL, INDEX IDX_3BAE0AA7B09E220E (age_group_id), INDEX IDX_3BAE0AA740A73EBA (venue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_F52993989395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_book (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, orderid_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_8614992616A2B381 (book_id), INDEX IDX_861499266F90D45B (orderid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(6) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E516A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E5E237B440 FOREIGN KEY (book_name_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE author_book ADD CONSTRAINT FK_2F0A2BEEF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_book ADD CONSTRAINT FK_2F0A2BEE16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33161778466 FOREIGN KEY (availability_id) REFERENCES availability (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331B09E220E FOREIGN KEY (age_group_id) REFERENCES age_group (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE customer_comment ADD CONSTRAINT FK_88A9F6D216A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE customer_comment ADD CONSTRAINT FK_88A9F6D29395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_notation ADD CONSTRAINT FK_2EADFFBA9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_notation ADD CONSTRAINT FK_2EADFFBA16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B09E220E FOREIGN KEY (age_group_id) REFERENCES age_group (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA740A73EBA FOREIGN KEY (venue_id) REFERENCES venue (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_8614992616A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_861499266F90D45B FOREIGN KEY (orderid_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331B09E220E');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B09E220E');
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_2F0A2BEEF675F31B');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33161778466');
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E516A2B381');
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E5E237B440');
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_2F0A2BEE16A2B381');
        $this->addSql('ALTER TABLE customer_comment DROP FOREIGN KEY FK_88A9F6D216A2B381');
        $this->addSql('ALTER TABLE customer_notation DROP FOREIGN KEY FK_2EADFFBA16A2B381');
        $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_8614992616A2B381');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE9395C3F3');
        $this->addSql('ALTER TABLE customer_comment DROP FOREIGN KEY FK_88A9F6D29395C3F3');
        $this->addSql('ALTER TABLE customer_notation DROP FOREIGN KEY FK_2EADFFBA9395C3F3');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE71F7E88B');
        $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_861499266F90D45B');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA740A73EBA');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE admin_comment');
        $this->addSql('DROP TABLE age_group');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE author_book');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_comment');
        $this->addSql('DROP TABLE customer_notation');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_book');
        $this->addSql('DROP TABLE venue');
    }
}