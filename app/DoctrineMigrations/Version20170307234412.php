<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170307234412 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, location_code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, additional_information VARCHAR(255) NOT NULL, last_update DATETIME NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_profile (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, identity_card VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, last_update DATETIME NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travel (id INT AUTO_INCREMENT NOT NULL, origin_location_id INT DEFAULT NULL, destiny_location_id INT DEFAULT NULL, user_profile_id INT DEFAULT NULL, travel_code VARCHAR(255) NOT NULL, number_places INT NOT NULL, travel_date VARCHAR(255) NOT NULL, additional_information VARCHAR(255) NOT NULL, last_update DATETIME NOT NULL, created DATETIME NOT NULL, INDEX IDX_2D0B6BCEE99C7F9 (origin_location_id), INDEX IDX_2D0B6BCEAEA3639 (destiny_location_id), INDEX IDX_2D0B6BCE6B9DD454 (user_profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCEE99C7F9 FOREIGN KEY (origin_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCEAEA3639 FOREIGN KEY (destiny_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCE6B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCEE99C7F9');
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCEAEA3639');
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCE6B9DD454');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE travel');
    }
}
