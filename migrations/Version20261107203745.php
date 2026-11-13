<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261107203745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE montre ADD COLUMN image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE montre ADD COLUMN image_size INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE montre ADD COLUMN updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__montre AS SELECT id, nom, description, watch_collection_id FROM montre');
        $this->addSql('DROP TABLE montre');
        $this->addSql('CREATE TABLE montre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, watch_collection_id INTEGER NOT NULL, CONSTRAINT FK_B61A93A44541AB1A FOREIGN KEY (watch_collection_id) REFERENCES watch_collection (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO montre (id, nom, description, watch_collection_id) SELECT id, nom, description, watch_collection_id FROM __temp__montre');
        $this->addSql('DROP TABLE __temp__montre');
        $this->addSql('CREATE INDEX IDX_B61A93A44541AB1A ON montre (watch_collection_id)');
    }
}
