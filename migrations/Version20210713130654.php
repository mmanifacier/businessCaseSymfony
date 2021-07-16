<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713130654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announce (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, model_id INT NOT NULL, fuel_id INT NOT NULL, garage_id INT NOT NULL, title VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, description LONGTEXT NOT NULL, date DATE NOT NULL, km INT NOT NULL, year DATE NOT NULL, INDEX IDX_E6D6DD7544F5D008 (brand_id), INDEX IDX_E6D6DD757975B7E7 (model_id), INDEX IDX_E6D6DD7597C79677 (fuel_id), INDEX IDX_E6D6DD75C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_9F26610B7E3C61F9 (owner_id), INDEX IDX_9F26610B8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, announce_id INT NOT NULL, link VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_16DB4F896F5DA3DE (announce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnal (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, siren BIGINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD7544F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD757975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD7597C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD75C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B7E3C61F9 FOREIGN KEY (owner_id) REFERENCES professionnal (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F896F5DA3DE FOREIGN KEY (announce_id) REFERENCES announce (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F896F5DA3DE');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD7544F5D008');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B8BAC62AF');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD7597C79677');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD75C4FFF555');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD757975B7E7');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B7E3C61F9');
        $this->addSql('DROP TABLE announce');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE professionnal');
    }
}
