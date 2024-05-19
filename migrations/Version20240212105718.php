<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212105718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, user_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, quantite DOUBLE PRECISION NOT NULL, date DATE NOT NULL, description VARCHAR(255) NOT NULL, action_score DOUBLE PRECISION NOT NULL, quantite_time TIME NOT NULL, niveau_danger INT NOT NULL, INDEX IDX_47CC8C92C54C8C93 (type_id), INDEX IDX_47CC8C92A76ED395 (user_id), INDEX IDX_47CC8C92BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type_score DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, produit_commande_id INT DEFAULT NULL, date_commande DATE NOT NULL, montant_totale DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), INDEX IDX_6EEAA67DFCF26AD0 (produit_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eco_depot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, capacite_stockage INT NOT NULL, statut_point_collecte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, date DATE NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_32FFA373FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, quantite_stock INT NOT NULL, categorie VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_29A5EC2782EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commande (id INT AUTO_INCREMENT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_rcyclable (id INT AUTO_INCREMENT NOT NULL, eco_depot_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, quantite INT NOT NULL, date_depot DATE NOT NULL, INDEX IDX_75A44A5D6F27F7A3 (eco_depot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, workshop_id INT DEFAULT NULL, question VARCHAR(255) NOT NULL, reponse VARCHAR(255) NOT NULL, score INT NOT NULL, INDEX IDX_D87F7E0C1FDCE57C (workshop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_name (id INT AUTO_INCREMENT NOT NULL, action_type_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, score DOUBLE PRECISION NOT NULL, materiel VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_892CBB0E1FEE0472 (action_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, workshop_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, numero INT NOT NULL, adress VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, INDEX IDX_8D93D6491FDCE57C (workshop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, cours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92C54C8C93 FOREIGN KEY (type_id) REFERENCES type_name (id)');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92BCF5E72D FOREIGN KEY (categorie_id) REFERENCES action_type (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFCF26AD0 FOREIGN KEY (produit_commande_id) REFERENCES produit_commande (id)');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA373FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2782EA2E54 FOREIGN KEY (commande_id) REFERENCES produit_commande (id)');
        $this->addSql('ALTER TABLE produit_rcyclable ADD CONSTRAINT FK_75A44A5D6F27F7A3 FOREIGN KEY (eco_depot_id) REFERENCES eco_depot (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C1FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id)');
        $this->addSql('ALTER TABLE type_name ADD CONSTRAINT FK_892CBB0E1FEE0472 FOREIGN KEY (action_type_id) REFERENCES action_type (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92C54C8C93');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92A76ED395');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92BCF5E72D');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFCF26AD0');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA373FD02F13');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2782EA2E54');
        $this->addSql('ALTER TABLE produit_rcyclable DROP FOREIGN KEY FK_75A44A5D6F27F7A3');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C1FDCE57C');
        $this->addSql('ALTER TABLE type_name DROP FOREIGN KEY FK_892CBB0E1FEE0472');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491FDCE57C');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_type');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE eco_depot');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_commande');
        $this->addSql('DROP TABLE produit_rcyclable');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE type_name');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE workshop');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
