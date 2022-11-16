<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116101544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, id_etat_id INT NOT NULL, nom VARCHAR(50) NOT NULL, INDEX IDX_82E48DB5D3C32F8F (id_etat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, id_marque_id INT NOT NULL, nom VARCHAR(20) NOT NULL, INDEX IDX_3C020C11C8120595 (id_marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5D3C32F8F FOREIGN KEY (id_etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE plateforme ADD CONSTRAINT FK_3C020C11C8120595 FOREIGN KEY (id_marque_id) REFERENCES marque (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5D3C32F8F');
        $this->addSql('ALTER TABLE plateforme DROP FOREIGN KEY FK_3C020C11C8120595');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE plateforme');
    }
}
