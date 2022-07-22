<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722083856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidate_disponibility');
        $this->addSql('ALTER TABLE candidate ADD disponibilities_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E442443ED83 FOREIGN KEY (disponibilities_id) REFERENCES disponibility (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E442443ED83 ON candidate (disponibilities_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate_disponibility (candidate_id INT NOT NULL, disponibility_id INT NOT NULL, INDEX IDX_16CD894D91BD8781 (candidate_id), INDEX IDX_16CD894D31528CB4 (disponibility_id), PRIMARY KEY(candidate_id, disponibility_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D31528CB4 FOREIGN KEY (disponibility_id) REFERENCES disponibility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E442443ED83');
        $this->addSql('DROP INDEX IDX_C8B28E442443ED83 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP disponibilities_id');
    }
}
