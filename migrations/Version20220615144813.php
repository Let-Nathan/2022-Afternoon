<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615144813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_role (id INT AUTO_INCREMENT NOT NULL, business_role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, gender_id_id INT DEFAULT NULL, experience_id_id INT DEFAULT NULL, prime_id_id INT DEFAULT NULL, role_id_id INT DEFAULT NULL, admin_id_id INT DEFAULT NULL, cv VARCHAR(2500) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(2500) DEFAULT NULL, telework TINYINT(1) DEFAULT NULL, vehicle TINYINT(1) DEFAULT NULL, salary VARCHAR(255) NOT NULL, validate_sheet TINYINT(1) NOT NULL, observation VARCHAR(2500) DEFAULT NULL, created_at DATETIME NOT NULL, archived TINYINT(1) NOT NULL, visibility TINYINT(1) NOT NULL, INDEX IDX_C8B28E449D86650F (user_id_id), INDEX IDX_C8B28E446F7F214C (gender_id_id), INDEX IDX_C8B28E441C16E241 (experience_id_id), INDEX IDX_C8B28E4441078405 (prime_id_id), INDEX IDX_C8B28E4488987678 (role_id_id), INDEX IDX_C8B28E44DF6E65AD (admin_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_skills (candidate_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_610248AC91BD8781 (candidate_id), INDEX IDX_610248AC7FF61858 (skills_id), PRIMARY KEY(candidate_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_disponibility (candidate_id INT NOT NULL, disponibility_id INT NOT NULL, INDEX IDX_16CD894D91BD8781 (candidate_id), INDEX IDX_16CD894D31528CB4 (disponibility_id), PRIMARY KEY(candidate_id, disponibility_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_mobility (candidate_id INT NOT NULL, mobility_id INT NOT NULL, INDEX IDX_770E62CF91BD8781 (candidate_id), INDEX IDX_770E62CF8D92EAA4 (mobility_id), PRIMARY KEY(candidate_id, mobility_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, candidat_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, prime_id_id INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', relance_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_964685A6BFA9F225 (candidat_id_id), INDEX IDX_964685A69D86650F (user_id_id), UNIQUE INDEX UNIQ_964685A641078405 (prime_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibility (id INT AUTO_INCREMENT NOT NULL, disponibility VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domains (id INT AUTO_INCREMENT NOT NULL, domaines_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mobility (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, parent_id INT DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prime (id INT AUTO_INCREMENT NOT NULL, prime VARCHAR(255) DEFAULT NULL, afternoon_prime VARCHAR(255) DEFAULT NULL, candidat_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skills_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, compagny VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_8D93D6493CCE3900 (city_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E446F7F214C FOREIGN KEY (gender_id_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E441C16E241 FOREIGN KEY (experience_id_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4441078405 FOREIGN KEY (prime_id_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4488987678 FOREIGN KEY (role_id_id) REFERENCES business_role (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44DF6E65AD FOREIGN KEY (admin_id_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE candidate_skills ADD CONSTRAINT FK_610248AC91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_skills ADD CONSTRAINT FK_610248AC7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D31528CB4 FOREIGN KEY (disponibility_id) REFERENCES disponibility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_mobility ADD CONSTRAINT FK_770E62CF91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_mobility ADD CONSTRAINT FK_770E62CF8D92EAA4 FOREIGN KEY (mobility_id) REFERENCES mobility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6BFA9F225 FOREIGN KEY (candidat_id_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A69D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A641078405 FOREIGN KEY (prime_id_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('ALTER TABLE admin ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD compagny VARCHAR(255) NOT NULL, ADD role VARCHAR(255) NOT NULL, DROP name, DROP email, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4488987678');
        $this->addSql('ALTER TABLE candidate_skills DROP FOREIGN KEY FK_610248AC91BD8781');
        $this->addSql('ALTER TABLE candidate_disponibility DROP FOREIGN KEY FK_16CD894D91BD8781');
        $this->addSql('ALTER TABLE candidate_mobility DROP FOREIGN KEY FK_770E62CF91BD8781');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6BFA9F225');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493CCE3900');
        $this->addSql('ALTER TABLE candidate_disponibility DROP FOREIGN KEY FK_16CD894D31528CB4');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E441C16E241');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E446F7F214C');
        $this->addSql('ALTER TABLE candidate_mobility DROP FOREIGN KEY FK_770E62CF8D92EAA4');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4441078405');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A641078405');
        $this->addSql('ALTER TABLE candidate_skills DROP FOREIGN KEY FK_610248AC7FF61858');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E449D86650F');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A69D86650F');
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, Prénom VARCHAR(120) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Nom VARCHAR(120) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, cv VARCHAR(2500) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE business_role');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE candidate_skills');
        $this->addSql('DROP TABLE candidate_disponibility');
        $this->addSql('DROP TABLE candidate_mobility');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE disponibility');
        $this->addSql('DROP TABLE domains');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE mobility');
        $this->addSql('DROP TABLE prime');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE admin ADD name VARCHAR(60) NOT NULL, ADD email VARCHAR(60) NOT NULL, DROP firstname, DROP lastname, DROP compagny, DROP role, CHANGE password password VARCHAR(120) NOT NULL');
    }
}
