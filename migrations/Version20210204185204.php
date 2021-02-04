<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204185204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_comment (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, book_id INT DEFAULT NULL, created_at DATETIME NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_5048D0E5642B8210 (admin_id), INDEX IDX_5048D0E516A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE age_group (id INT AUTO_INCREMENT NOT NULL, min_age INT NOT NULL, max_age INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author_book (author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2F0A2BEEF675F31B (author_id), INDEX IDX_2F0A2BEE16A2B381 (book_id), PRIMARY KEY(author_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, age_group_id INT NOT NULL, admin_comment_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, extract LONGTEXT DEFAULT NULL, editor VARCHAR(255) NOT NULL, publishing_house VARCHAR(255) NOT NULL, publication_date INT NOT NULL, collection VARCHAR(255) NOT NULL, ean_code VARCHAR(255) NOT NULL, isbn_code VARCHAR(255) NOT NULL, number_pages INT NOT NULL, dimensions INT NOT NULL, weight INT NOT NULL, language VARCHAR(255) NOT NULL, original_language VARCHAR(255) NOT NULL, availability VARCHAR(255) NOT NULL, stock INT NOT NULL, price INT NOT NULL, admin_notation INT DEFAULT NULL, INDEX IDX_CBE5A331B09E220E (age_group_id), UNIQUE INDEX UNIQ_CBE5A3313057DB96 (admin_comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_photo (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_1A75916116A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, event_id INT DEFAULT NULL, customer_booking_id INT DEFAULT NULL, cancelled TINYINT(1) NOT NULL, INDEX IDX_E00CEDDE9395C3F3 (customer_id), INDEX IDX_E00CEDDE71F7E88B (event_id), INDEX IDX_E00CEDDEFEF918E2 (customer_booking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, age INT NOT NULL, photo VARCHAR(255) DEFAULT NULL, newsletter TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_comment (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, book_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_88A9F6D29395C3F3 (customer_id), INDEX IDX_88A9F6D216A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_notation (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, book_id INT DEFAULT NULL, notation INT NOT NULL, INDEX IDX_2EADFFBA9395C3F3 (customer_id), INDEX IDX_2EADFFBA16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_order (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_3B1CE6A39395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_order_book (id INT AUTO_INCREMENT NOT NULL, customer_order_id INT DEFAULT NULL, book_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_7BDD9DA4A15A2E17 (customer_order_id), INDEX IDX_7BDD9DA416A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, age_group_id INT NOT NULL, venue_id INT NOT NULL, title VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, duration INT NOT NULL, photo VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, booking TINYINT(1) NOT NULL, free TINYINT(1) NOT NULL, max_participants INT NOT NULL, price INT DEFAULT NULL, INDEX IDX_3BAE0AA7B09E220E (age_group_id), INDEX IDX_3BAE0AA740A73EBA (venue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E5642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E516A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE author_book ADD CONSTRAINT FK_2F0A2BEEF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_book ADD CONSTRAINT FK_2F0A2BEE16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331B09E220E FOREIGN KEY (age_group_id) REFERENCES age_group (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3313057DB96 FOREIGN KEY (admin_comment_id) REFERENCES admin_comment (id)');
        $this->addSql('ALTER TABLE book_photo ADD CONSTRAINT FK_1A75916116A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEFEF918E2 FOREIGN KEY (customer_booking_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_comment ADD CONSTRAINT FK_88A9F6D29395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_comment ADD CONSTRAINT FK_88A9F6D216A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE customer_notation ADD CONSTRAINT FK_2EADFFBA9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_notation ADD CONSTRAINT FK_2EADFFBA16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A39395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_order_book ADD CONSTRAINT FK_7BDD9DA4A15A2E17 FOREIGN KEY (customer_order_id) REFERENCES customer_order (id)');
        $this->addSql('ALTER TABLE customer_order_book ADD CONSTRAINT FK_7BDD9DA416A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B09E220E FOREIGN KEY (age_group_id) REFERENCES age_group (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA740A73EBA FOREIGN KEY (venue_id) REFERENCES venue (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E5642B8210');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3313057DB96');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331B09E220E');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B09E220E');
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_2F0A2BEEF675F31B');
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E516A2B381');
        $this->addSql('ALTER TABLE author_book DROP FOREIGN KEY FK_2F0A2BEE16A2B381');
        $this->addSql('ALTER TABLE book_photo DROP FOREIGN KEY FK_1A75916116A2B381');
        $this->addSql('ALTER TABLE customer_comment DROP FOREIGN KEY FK_88A9F6D216A2B381');
        $this->addSql('ALTER TABLE customer_notation DROP FOREIGN KEY FK_2EADFFBA16A2B381');
        $this->addSql('ALTER TABLE customer_order_book DROP FOREIGN KEY FK_7BDD9DA416A2B381');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE9395C3F3');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEFEF918E2');
        $this->addSql('ALTER TABLE customer_comment DROP FOREIGN KEY FK_88A9F6D29395C3F3');
        $this->addSql('ALTER TABLE customer_notation DROP FOREIGN KEY FK_2EADFFBA9395C3F3');
        $this->addSql('ALTER TABLE customer_order DROP FOREIGN KEY FK_3B1CE6A39395C3F3');
        $this->addSql('ALTER TABLE customer_order_book DROP FOREIGN KEY FK_7BDD9DA4A15A2E17');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE71F7E88B');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA740A73EBA');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE admin_comment');
        $this->addSql('DROP TABLE age_group');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE author_book');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_photo');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_comment');
        $this->addSql('DROP TABLE customer_notation');
        $this->addSql('DROP TABLE customer_order');
        $this->addSql('DROP TABLE customer_order_book');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE venue');
    }
}
