<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122110635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rent (
                            id INT NOT NULL, 
                            vehicle_id INT DEFAULT NULL,
                            driver_id INT DEFAULT NULL, 
                            cost_total NUMERIC(10, 2) DEFAULT NULL, 
                            status VARCHAR(255) DEFAULT NULL, 
                            is_allowed_zone_left BOOLEAN DEFAULT NULL, 
                            location_start VARCHAR(255) DEFAULT NULL, 
                            location_end VARCHAR(255) DEFAULT NULL,
                            is_active BOOLEAN DEFAULT NULL, 
                            finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, 
                            PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN rent.finished_at IS \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rent');
//        $this->addSql('DROP TABLE "user"');
    }
}
