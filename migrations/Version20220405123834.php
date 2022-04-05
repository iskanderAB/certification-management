<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405123834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE salary_certificate (id INT AUTO_INCREMENT NOT NULL, p1 DOUBLE PRECISION NOT NULL, p2 DOUBLE PRECISION NOT NULL, p3 DOUBLE PRECISION NOT NULL, p4 DOUBLE PRECISION NOT NULL, p5 DOUBLE PRECISION NOT NULL, p6 DOUBLE PRECISION NOT NULL, p7 DOUBLE PRECISION NOT NULL, p8 DOUBLE PRECISION NOT NULL, p9 DOUBLE PRECISION NOT NULL, p10 DOUBLE PRECISION NOT NULL, p11 DOUBLE PRECISION NOT NULL, p12 DOUBLE PRECISION NOT NULL, p13 DOUBLE PRECISION NOT NULL, p14 DOUBLE PRECISION NOT NULL, p15 DOUBLE PRECISION NOT NULL, p16 DOUBLE PRECISION NOT NULL, p17 DOUBLE PRECISION NOT NULL, p18 DOUBLE PRECISION NOT NULL, p19 DOUBLE PRECISION NOT NULL, p20 DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE salary_certificate');
    }
}
