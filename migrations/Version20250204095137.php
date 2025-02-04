<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250204095137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE drivers_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE drivers (id INT NOT NULL, status SMALLINT NOT NULL, created_at DATE NOT NULL, updated_at DATE NOT NULL, approved_at DATE NOT NULL, phone VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, last_rent_id INT DEFAULT NULL, active_rent_id INT DEFAULT NULL, deleted_at DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN drivers.created_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN drivers.updated_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN drivers.approved_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN drivers.deleted_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, driver_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, is_blocked BOOLEAN NOT NULL, is_phone_verified BOOLEAN NOT NULL, role VARCHAR(255) NOT NULL, role_id INT NOT NULL, email VARCHAR(255) NOT NULL, email_verified_at DATE DEFAULT NULL, password VARCHAR(255) NOT NULL, status SMALLINT NOT NULL, created_at DATE NOT NULL, deleted_at DATE NOT NULL, updated_at DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9C3423909 ON users (driver_id)');
        $this->addSql('COMMENT ON COLUMN users.email_verified_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN users.created_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN users.deleted_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN users.updated_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE drivers_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9C3423909');
        $this->addSql('DROP TABLE drivers');
        $this->addSql('DROP TABLE users');
    }
}
