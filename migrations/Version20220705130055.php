<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705130055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A68D0EB82');
        $this->addSql('DROP INDEX IDX_964685A68D0EB82 ON consultation');
        $this->addSql('ALTER TABLE consultation CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE relance_date relance_date DATETIME NOT NULL, CHANGE candidat_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A691BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('CREATE INDEX IDX_964685A691BD8781 ON consultation (candidate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A691BD8781');
        $this->addSql('DROP INDEX IDX_964685A691BD8781 ON consultation');
        $this->addSql('ALTER TABLE consultation CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE relance_date relance_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE candidate_id candidat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A68D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidate (id)');
        $this->addSql('CREATE INDEX IDX_964685A68D0EB82 ON consultation (candidat_id)');
    }
}
