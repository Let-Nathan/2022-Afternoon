<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616095706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_domains DROP FOREIGN KEY FK_3AA123C3700F4DC');
        $this->addSql('ALTER TABLE candidate_skills DROP FOREIGN KEY FK_610248AC7FF61858');
        $this->addSql('CREATE TABLE candidate_skill (candidate_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_66DD0F8B91BD8781 (candidate_id), INDEX IDX_66DD0F8B5585C142 (skill_id), PRIMARY KEY(candidate_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_domain (candidate_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_139A40D791BD8781 (candidate_id), INDEX IDX_139A40D7115F0EE5 (domain_id), PRIMARY KEY(candidate_id, domain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, domaine_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domain ADD CONSTRAINT FK_139A40D791BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domain ADD CONSTRAINT FK_139A40D7115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE candidate_domains');
        $this->addSql('DROP TABLE candidate_skills');
        $this->addSql('DROP TABLE domains');
        $this->addSql('DROP TABLE skills');
        $this->addSql('ALTER TABLE admin ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD roles JSON NOT NULL, DROP firstname, DROP lastname, DROP role');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4488987678');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44DF6E65AD');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E441C16E241');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E446F7F214C');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E449D86650F');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4441078405');
        $this->addSql('DROP INDEX IDX_C8B28E44DF6E65AD ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E446F7F214C ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4441078405 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E449D86650F ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E441C16E241 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4488987678 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD gender_id INT DEFAULT NULL, ADD experience_id INT DEFAULT NULL, ADD prime_id INT DEFAULT NULL, ADD business_role_id INT DEFAULT NULL, ADD admin_id INT DEFAULT NULL, DROP gender_id_id, DROP experience_id_id, DROP prime_id_id, DROP role_id_id, DROP admin_id_id, CHANGE user_id_id user_id INT NOT NULL, CHANGE visibility is_visible TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4469247986 FOREIGN KEY (prime_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448B3099E1 FOREIGN KEY (business_role_id) REFERENCES business_role (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44A76ED395 ON candidate (user_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44708A0E0 ON candidate (gender_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4446E90E27 ON candidate (experience_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4469247986 ON candidate (prime_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E448B3099E1 ON candidate (business_role_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44642B8210 ON candidate (admin_id)');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A641078405');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6BFA9F225');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A69D86650F');
        $this->addSql('DROP INDEX IDX_964685A6BFA9F225 ON consultation');
        $this->addSql('DROP INDEX UNIQ_964685A641078405 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A69D86650F ON consultation');
        $this->addSql('ALTER TABLE consultation ADD candidat_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP candidat_id_id, DROP user_id_id, DROP prime_id_id');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A68D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_964685A68D0EB82 ON consultation (candidat_id)');
        $this->addSql('CREATE INDEX IDX_964685A6A76ED395 ON consultation (user_id)');
        $this->addSql('ALTER TABLE prime DROP candidat_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493CCE3900');
        $this->addSql('DROP INDEX IDX_8D93D6493CCE3900 ON user');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, DROP firstname, DROP lastname, DROP password, DROP role, CHANGE city_id_id city_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BAC62AF ON user (city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_domain DROP FOREIGN KEY FK_139A40D7115F0EE5');
        $this->addSql('ALTER TABLE candidate_skill DROP FOREIGN KEY FK_66DD0F8B5585C142');
        $this->addSql('CREATE TABLE candidate_domains (candidate_id INT NOT NULL, domains_id INT NOT NULL, INDEX IDX_3AA123C91BD8781 (candidate_id), INDEX IDX_3AA123C3700F4DC (domains_id), PRIMARY KEY(candidate_id, domains_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE candidate_skills (candidate_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_610248AC91BD8781 (candidate_id), INDEX IDX_610248AC7FF61858 (skills_id), PRIMARY KEY(candidate_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE domains (id INT AUTO_INCREMENT NOT NULL, domaine_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidate_domains ADD CONSTRAINT FK_3AA123C3700F4DC FOREIGN KEY (domains_id) REFERENCES domains (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domains ADD CONSTRAINT FK_3AA123C91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_skills ADD CONSTRAINT FK_610248AC7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_skills ADD CONSTRAINT FK_610248AC91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE candidate_skill');
        $this->addSql('DROP TABLE candidate_domain');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE skill');
        $this->addSql('ALTER TABLE admin ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD role VARCHAR(255) NOT NULL, DROP first_name, DROP last_name, DROP email, DROP roles');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44708A0E0');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4469247986');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E448B3099E1');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44642B8210');
        $this->addSql('DROP INDEX IDX_C8B28E44A76ED395 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E44708A0E0 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4446E90E27 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4469247986 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E448B3099E1 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E44642B8210 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD gender_id_id INT DEFAULT NULL, ADD experience_id_id INT DEFAULT NULL, ADD prime_id_id INT DEFAULT NULL, ADD role_id_id INT DEFAULT NULL, ADD admin_id_id INT DEFAULT NULL, DROP gender_id, DROP experience_id, DROP prime_id, DROP business_role_id, DROP admin_id, CHANGE user_id user_id_id INT NOT NULL, CHANGE is_visible visibility TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4488987678 FOREIGN KEY (role_id_id) REFERENCES business_role (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44DF6E65AD FOREIGN KEY (admin_id_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E441C16E241 FOREIGN KEY (experience_id_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E446F7F214C FOREIGN KEY (gender_id_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4441078405 FOREIGN KEY (prime_id_id) REFERENCES prime (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44DF6E65AD ON candidate (admin_id_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E446F7F214C ON candidate (gender_id_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4441078405 ON candidate (prime_id_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E449D86650F ON candidate (user_id_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E441C16E241 ON candidate (experience_id_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4488987678 ON candidate (role_id_id)');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A68D0EB82');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6A76ED395');
        $this->addSql('DROP INDEX IDX_964685A68D0EB82 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A6A76ED395 ON consultation');
        $this->addSql('ALTER TABLE consultation ADD candidat_id_id INT DEFAULT NULL, ADD user_id_id INT DEFAULT NULL, ADD prime_id_id INT DEFAULT NULL, DROP candidat_id, DROP user_id');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A641078405 FOREIGN KEY (prime_id_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6BFA9F225 FOREIGN KEY (candidat_id_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A69D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_964685A6BFA9F225 ON consultation (candidat_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_964685A641078405 ON consultation (prime_id_id)');
        $this->addSql('CREATE INDEX IDX_964685A69D86650F ON consultation (user_id_id)');
        $this->addSql('ALTER TABLE prime ADD candidat_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('DROP INDEX IDX_8D93D6498BAC62AF ON user');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD role VARCHAR(255) NOT NULL, DROP first_name, DROP last_name, CHANGE city_id city_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493CCE3900 ON user (city_id_id)');
    }
}
