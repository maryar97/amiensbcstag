<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229121211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recap_details (commande_id INT NOT NULL, formedeboxe_id INT NOT NULL, quantite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, total_recap VARCHAR(255) NOT NULL, INDEX IDX_1D1FD6982EA2E54 (commande_id), INDEX IDX_1D1FD69C88D977A (formedeboxe_id), PRIMARY KEY(commande_id, formedeboxe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recap_details ADD CONSTRAINT FK_1D1FD6982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE recap_details ADD CONSTRAINT FK_1D1FD69C88D977A FOREIGN KEY (formedeboxe_id) REFERENCES formedeboxe (id)');
        $this->addSql('ALTER TABLE adresse ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F081667B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C35F081667B3B43D ON adresse (users_id)');
        $this->addSql('ALTER TABLE commande ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D67B3B43D ON commande (users_id)');
        $this->addSql('ALTER TABLE formedeboxe ADD panier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formedeboxe ADD CONSTRAINT FK_7512EFDCF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE INDEX IDX_7512EFDCF77D927C ON formedeboxe (panier_id)');
        $this->addSql('ALTER TABLE licence ADD numlicence_id INT NOT NULL');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE64819ADD208 FOREIGN KEY (numlicence_id) REFERENCES boxeur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DAAE64819ADD208 ON licence (numlicence_id)');
        $this->addSql('ALTER TABLE panier ADD forme_de_boxe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2729B07AF FOREIGN KEY (forme_de_boxe_id) REFERENCES formedeboxe (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF2729B07AF ON panier (forme_de_boxe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recap_details DROP FOREIGN KEY FK_1D1FD6982EA2E54');
        $this->addSql('ALTER TABLE recap_details DROP FOREIGN KEY FK_1D1FD69C88D977A');
        $this->addSql('DROP TABLE recap_details');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F081667B3B43D');
        $this->addSql('DROP INDEX IDX_C35F081667B3B43D ON adresse');
        $this->addSql('ALTER TABLE adresse DROP users_id');
        $this->addSql('ALTER TABLE formedeboxe DROP FOREIGN KEY FK_7512EFDCF77D927C');
        $this->addSql('DROP INDEX IDX_7512EFDCF77D927C ON formedeboxe');
        $this->addSql('ALTER TABLE formedeboxe DROP panier_id');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2729B07AF');
        $this->addSql('DROP INDEX IDX_24CC0DF2729B07AF ON panier');
        $this->addSql('ALTER TABLE panier DROP forme_de_boxe_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D67B3B43D');
        $this->addSql('DROP INDEX IDX_6EEAA67D67B3B43D ON commande');
        $this->addSql('ALTER TABLE commande DROP users_id');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE64819ADD208');
        $this->addSql('DROP INDEX UNIQ_1DAAE64819ADD208 ON licence');
        $this->addSql('ALTER TABLE licence DROP numlicence_id');
    }
}
