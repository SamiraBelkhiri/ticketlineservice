<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312133554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments ADD comment_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF8697D13 FOREIGN KEY (comment_id) REFERENCES tickets (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AF8697D13 ON comments (comment_id)');
        $this->addSql('ALTER TABLE tickets ADD open_timee DATETIME NOT NULL, ADD close_timee DATETIME DEFAULT NULL, ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4A76ED395 ON tickets (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF8697D13');
        $this->addSql('DROP INDEX IDX_5F9E962AF8697D13 ON comments');
        $this->addSql('ALTER TABLE comments DROP comment_id, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('DROP INDEX IDX_54469DF4A76ED395 ON tickets');
        $this->addSql('ALTER TABLE tickets DROP open_timee, DROP close_timee, DROP description');
    }
}
