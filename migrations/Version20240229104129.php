<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229104129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, adrnom VARCHAR(255) NOT NULL, adrprenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, adrcp VARCHAR(10) NOT NULL, adrville VARCHAR(255) NOT NULL, adrpays VARCHAR(255) NOT NULL, adrtel VARCHAR(20) NOT NULL, adremail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boxeur (id INT AUTO_INCREMENT NOT NULL, formedeboxe VARCHAR(255) NOT NULL, palmares VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(5) NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, panier_id INT NOT NULL, is_paid TINYINT(1) NOT NULL, methode VARCHAR(255) NOT NULL, stripe_session_id INT NOT NULL, reference VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', com_fact_id INT DEFAULT NULL, INDEX IDX_6EEAA67D4DE7DC5C (adresse_id), INDEX IDX_6EEAA67DF77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formedeboxe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, prix NUMERIC(7, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, datenaiss VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, sexe VARCHAR(10) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, codepostal VARCHAR(5) NOT NULL, datecreat VARCHAR(255) NOT NULL, nomlicence VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, panierqte INT NOT NULL, prixunite NUMERIC(7, 2) NOT NULL, total INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(5) NOT NULL, ville VARCHAR(150) NOT NULL, telephone VARCHAR(20) NOT NULL, photo VARCHAR(255) NOT NULL, sexe VARCHAR(5) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D4DE7DC5C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF77D927C');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE boxeur');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE formedeboxe');
        $this->addSql('DROP TABLE licence');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
