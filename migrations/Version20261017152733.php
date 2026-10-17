<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261017152733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vitrine_montre (vitrine_id INTEGER NOT NULL, montre_id INTEGER NOT NULL, PRIMARY KEY (vitrine_id, montre_id), CONSTRAINT FK_386F703127F17893 FOREIGN KEY (vitrine_id) REFERENCES vitrine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_386F70311F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_386F703127F17893 ON vitrine_montre (vitrine_id)');
        $this->addSql('CREATE INDEX IDX_386F70311F3E1099 ON vitrine_montre (montre_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vitrine AS SELECT id, description, publiee FROM vitrine');
        $this->addSql('DROP TABLE vitrine');
        $this->addSql('CREATE TABLE vitrine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(255) NOT NULL, publiee BOOLEAN NOT NULL, member_id INTEGER NOT NULL, CONSTRAINT FK_71EB69B47597D3FE FOREIGN KEY (member_id) REFERENCES member (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO vitrine (id, description, publiee) SELECT id, description, publiee FROM __temp__vitrine');
        $this->addSql('DROP TABLE __temp__vitrine');
        $this->addSql('CREATE INDEX IDX_71EB69B47597D3FE ON vitrine (member_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vitrine_montre');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vitrine AS SELECT id, description, publiee FROM vitrine');
        $this->addSql('DROP TABLE vitrine');
        $this->addSql('CREATE TABLE vitrine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(255) NOT NULL, publiee BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO vitrine (id, description, publiee) SELECT id, description, publiee FROM __temp__vitrine');
        $this->addSql('DROP TABLE __temp__vitrine');
    }
}
