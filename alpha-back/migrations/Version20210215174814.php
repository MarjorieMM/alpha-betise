<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215174814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_comment ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE admin_comment ADD CONSTRAINT FK_5048D0E5642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_5048D0E5642B8210 ON admin_comment (admin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_comment DROP FOREIGN KEY FK_5048D0E5642B8210');
        $this->addSql('DROP INDEX IDX_5048D0E5642B8210 ON admin_comment');
        $this->addSql('ALTER TABLE admin_comment DROP admin_id');
    }
}
