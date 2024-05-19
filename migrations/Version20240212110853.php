<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212110853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_recyclable (id INT AUTO_INCREMENT NOT NULL, eco_depot_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, quantite INT NOT NULL, date_depot DATE NOT NULL, INDEX IDX_67952B796F27F7A3 (eco_depot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_recyclable ADD CONSTRAINT FK_67952B796F27F7A3 FOREIGN KEY (eco_depot_id) REFERENCES eco_depot (id)');
        $this->addSql('ALTER TABLE produit_rcyclable DROP FOREIGN KEY FK_75A44A5D6F27F7A3');
        $this->addSql('DROP TABLE produit_rcyclable');
        $this->addSql('ALTER TABLE user DROP roles, DROP password, DROP numero, DROP adress, DROP genre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_rcyclable (id INT AUTO_INCREMENT NOT NULL, eco_depot_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, quantite INT NOT NULL, date_depot DATE NOT NULL, INDEX IDX_75A44A5D6F27F7A3 (eco_depot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_rcyclable ADD CONSTRAINT FK_75A44A5D6F27F7A3 FOREIGN KEY (eco_depot_id) REFERENCES eco_depot (id)');
        $this->addSql('ALTER TABLE produit_recyclable DROP FOREIGN KEY FK_67952B796F27F7A3');
        $this->addSql('DROP TABLE produit_recyclable');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, ADD numero INT NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD genre VARCHAR(255) NOT NULL');
    }
}
