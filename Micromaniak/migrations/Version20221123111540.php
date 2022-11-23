<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123111540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE jeu ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE marque ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE plateforme ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeu drop image');
        $this->addSql('ALTER TABLE marque DROP image');
        $this->addSql('ALTER TABLE plateforme DROP image');
    }
}