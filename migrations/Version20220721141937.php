<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721141937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4469247986');
        $this->addSql('DROP TABLE prime');
        $this->addSql('DROP INDEX IDX_C8B28E4469247986 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD prime DOUBLE PRECISION DEFAULT NULL, DROP prime_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prime (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, prime VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, afternoon_prime VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_544B0F5762FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE prime ADD CONSTRAINT FK_544B0F5762FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE candidate ADD prime_id INT DEFAULT NULL, DROP prime');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4469247986 FOREIGN KEY (prime_id) REFERENCES prime (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4469247986 ON candidate (prime_id)');
    }
}
