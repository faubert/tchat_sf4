<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001100323 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message ADD connexion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8D566613 FOREIGN KEY (connexion_id) REFERENCES connexion (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F8D566613 ON message (connexion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8D566613');
        $this->addSql('DROP INDEX IDX_B6BD307F8D566613 ON message');
        $this->addSql('ALTER TABLE message DROP connexion_id');
    }
}
