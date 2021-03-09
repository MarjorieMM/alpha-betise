<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215173632 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_comment DROP INDEX UNIQ_5048D0E516A2B381, ADD INDEX IDX_5048D0E516A2B381 (book_id)');
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E5E237B440');
        $this->addSql('DROP INDEX IDX_5048D0E5E237B440 ON admin_comment');
        $this->addSql('ALTER TABLE admin_comment DROP book_name_id, CHANGE book_id book_id INT NOT NULL');
        $this->addSql('ALTER TABLE book CHANGE age_group_id age_group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('DROP INDEX IDX_F52993989395C3F3 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP customer_id');
        $this->addSql('ALTER TABLE order_book CHANGE book_id book_id INT NOT NULL, CHANGE orderid_id orderid_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_comment DROP INDEX IDX_5048D0E516A2B381, ADD UNIQUE INDEX UNIQ_5048D0E516A2B381 (book_id)');
        $this->addSql('ALTER TABLE admin_comment ADD book_name_id INT DEFAULT NULL, CHANGE book_id book_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E5E237B440 FOREIGN KEY (book_name_id) REFERENCES book (id)');
        $this->addSql('CREATE INDEX IDX_5048D0E5E237B440 ON admin_comment (book_name_id)');
        $this->addSql('ALTER TABLE book CHANGE age_group_id age_group_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_F52993989395C3F3 ON `order` (customer_id)');
        $this->addSql('ALTER TABLE order_book CHANGE orderid_id orderid_id INT DEFAULT NULL, CHANGE book_id book_id INT DEFAULT NULL');
    }
}
