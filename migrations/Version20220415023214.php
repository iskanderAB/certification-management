<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415023214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE salary_certificate (id INT AUTO_INCREMENT NOT NULL, p1 DOUBLE PRECISION NOT NULL, p2 DOUBLE PRECISION NOT NULL, p3 DOUBLE PRECISION NOT NULL, p4 DOUBLE PRECISION NOT NULL, p5 DOUBLE PRECISION NOT NULL, p6 DOUBLE PRECISION NOT NULL, p7 DOUBLE PRECISION NOT NULL, p8 DOUBLE PRECISION NOT NULL, p9 DOUBLE PRECISION NOT NULL, p10 DOUBLE PRECISION NOT NULL, p11 DOUBLE PRECISION NOT NULL, p12 DOUBLE PRECISION NOT NULL, p13 DOUBLE PRECISION NOT NULL, p14 DOUBLE PRECISION NOT NULL, p15 DOUBLE PRECISION NOT NULL, p16 DOUBLE PRECISION NOT NULL, p17 DOUBLE PRECISION NOT NULL, p18 DOUBLE PRECISION NOT NULL, p19 DOUBLE PRECISION NOT NULL, p20 DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_certificate (id INT AUTO_INCREMENT NOT NULL, worker_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, created_at DATE NOT NULL, chef VARCHAR(255) NOT NULL, Signature VARCHAR(255) NOT NULL, INDEX IDX_3E5D3A896B20BA36 (worker_id), INDEX IDX_3E5D3A89B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE worker (id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) DEFAULT NULL, Prenom VARCHAR(255) NOT NULL, cin INT DEFAULT NULL, ref VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, Genre VARCHAR(1) NOT NULL, poste VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9FB2BF62146F3EA3 (ref), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_certificate ADD CONSTRAINT FK_3E5D3A896B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE work_certificate ADD CONSTRAINT FK_3E5D3A89B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_certificate DROP FOREIGN KEY FK_3E5D3A89B03A8386');
        $this->addSql('ALTER TABLE work_certificate DROP FOREIGN KEY FK_3E5D3A896B20BA36');
        $this->addSql('DROP TABLE salary_certificate');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE work_certificate');
        $this->addSql('DROP TABLE worker');
    }
}
