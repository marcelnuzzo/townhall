<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201130212706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE summar summary LONGTEXT DEFAULT NULL, CHANGE image_name image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE structure ADD createdat VARCHAR(255) NOT NULL, DROP created_at, CHANGE summar summary LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE town_hall ADD logo VARCHAR(255) NOT NULL, ADD photo_mayor VARCHAR(255) NOT NULL, CHANGE image_name image_name VARCHAR(255) NOT NULL, CHANGE summar summary LONGTEXT DEFAULT NULL, CHANGE logo_name town_hall_team VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE summary summar LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE structure ADD created_at DATETIME NOT NULL, DROP createdat, CHANGE summary summar LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE town_hall DROP logo, DROP photo_mayor, CHANGE image_name image_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE town_hall_team logo_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE summary summar LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
