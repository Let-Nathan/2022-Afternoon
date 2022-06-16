<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615180810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate_domains (candidate_id INT NOT NULL, domains_id INT NOT NULL, INDEX IDX_3AA123C91BD8781 (candidate_id), INDEX IDX_3AA123C3700F4DC (domains_id), PRIMARY KEY(candidate_id, domains_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate_domains ADD CONSTRAINT FK_3AA123C91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domains ADD CONSTRAINT FK_3AA123C3700F4DC FOREIGN KEY (domains_id) REFERENCES domains (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate CHANGE cv curiculum_vitae VARCHAR(2500) NOT NULL');
        $this->addSql('ALTER TABLE domains CHANGE domaines_name domaine_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skills CHANGE skills_name skill_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidate_domains');
        $this->addSql('ALTER TABLE candidate CHANGE curiculum_vitae cv VARCHAR(2500) NOT NULL');
        $this->addSql('ALTER TABLE domains CHANGE domaine_name domaines_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skills CHANGE skill_name skills_name VARCHAR(255) NOT NULL');
    }
}
