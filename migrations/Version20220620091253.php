<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620091253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prime ADD consultation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prime ADD CONSTRAINT FK_544B0F5762FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_544B0F5762FF6CDF ON prime (consultation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prime DROP FOREIGN KEY FK_544B0F5762FF6CDF');
        $this->addSql('DROP INDEX UNIQ_544B0F5762FF6CDF ON prime');
        $this->addSql('ALTER TABLE prime DROP consultation_id');
    }
}
