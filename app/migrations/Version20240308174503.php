<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308174503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE farmer_id_seq CASCADE');
        $this->addSql('DROP INDEX uniq_ec85ac8fd532c99c');
        $this->addSql('ALTER TABLE farmer DROP CONSTRAINT farmer_pkey');
        $this->addSql('ALTER TABLE farmer DROP id');
        $this->addSql('ALTER TABLE farmer ADD PRIMARY KEY (farmer_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE farmer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX farmer_pkey');
        $this->addSql('ALTER TABLE farmer ADD id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_ec85ac8fd532c99c ON farmer (farmer_id_id)');
        $this->addSql('ALTER TABLE farmer ADD PRIMARY KEY (id)');
    }
}
