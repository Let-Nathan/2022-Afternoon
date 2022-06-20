<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620090639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, compagny VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_role (id INT AUTO_INCREMENT NOT NULL, business_role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, experience_id INT DEFAULT NULL, prime_id INT DEFAULT NULL, business_role_id INT DEFAULT NULL, validated_by_id INT DEFAULT NULL, curiculum_vitae VARCHAR(2500) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(2500) DEFAULT NULL, telework TINYINT(1) DEFAULT NULL, vehicle TINYINT(1) DEFAULT NULL, salary VARCHAR(255) NOT NULL, validate_sheet TINYINT(1) NOT NULL, observation VARCHAR(2500) DEFAULT NULL, created_at DATETIME NOT NULL, archived TINYINT(1) NOT NULL, is_visible TINYINT(1) NOT NULL, gender TINYINT(1) NOT NULL, expiration_date DATETIME NOT NULL, INDEX IDX_C8B28E44A76ED395 (user_id), INDEX IDX_C8B28E4446E90E27 (experience_id), INDEX IDX_C8B28E4469247986 (prime_id), INDEX IDX_C8B28E448B3099E1 (business_role_id), INDEX IDX_C8B28E44C69DE5E5 (validated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_skill (candidate_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_66DD0F8B91BD8781 (candidate_id), INDEX IDX_66DD0F8B5585C142 (skill_id), PRIMARY KEY(candidate_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_domain (candidate_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_139A40D791BD8781 (candidate_id), INDEX IDX_139A40D7115F0EE5 (domain_id), PRIMARY KEY(candidate_id, domain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_disponibility (candidate_id INT NOT NULL, disponibility_id INT NOT NULL, INDEX IDX_16CD894D91BD8781 (candidate_id), INDEX IDX_16CD894D31528CB4 (disponibility_id), PRIMARY KEY(candidate_id, disponibility_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_mobility (candidate_id INT NOT NULL, mobility_id INT NOT NULL, INDEX IDX_770E62CF91BD8781 (candidate_id), INDEX IDX_770E62CF8D92EAA4 (mobility_id), PRIMARY KEY(candidate_id, mobility_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, user_id INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', relance_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_964685A68D0EB82 (candidat_id), INDEX IDX_964685A6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibility (id INT AUTO_INCREMENT NOT NULL, disponibility VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, domaine_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mobility (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, parent_id INT DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prime (id INT AUTO_INCREMENT NOT NULL, prime VARCHAR(255) DEFAULT NULL, afternoon_prime VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, skill_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, compagny VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6498BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4469247986 FOREIGN KEY (prime_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448B3099E1 FOREIGN KEY (business_role_id) REFERENCES business_role (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44C69DE5E5 FOREIGN KEY (validated_by_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domain ADD CONSTRAINT FK_139A40D791BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_domain ADD CONSTRAINT FK_139A40D7115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_disponibility ADD CONSTRAINT FK_16CD894D31528CB4 FOREIGN KEY (disponibility_id) REFERENCES disponibility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_mobility ADD CONSTRAINT FK_770E62CF91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_mobility ADD CONSTRAINT FK_770E62CF8D92EAA4 FOREIGN KEY (mobility_id) REFERENCES mobility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A68D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44C69DE5E5');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E448B3099E1');
        $this->addSql('ALTER TABLE candidate_skill DROP FOREIGN KEY FK_66DD0F8B91BD8781');
        $this->addSql('ALTER TABLE candidate_domain DROP FOREIGN KEY FK_139A40D791BD8781');
        $this->addSql('ALTER TABLE candidate_disponibility DROP FOREIGN KEY FK_16CD894D91BD8781');
        $this->addSql('ALTER TABLE candidate_mobility DROP FOREIGN KEY FK_770E62CF91BD8781');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A68D0EB82');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE candidate_disponibility DROP FOREIGN KEY FK_16CD894D31528CB4');
        $this->addSql('ALTER TABLE candidate_domain DROP FOREIGN KEY FK_139A40D7115F0EE5');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate_mobility DROP FOREIGN KEY FK_770E62CF8D92EAA4');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4469247986');
        $this->addSql('ALTER TABLE candidate_skill DROP FOREIGN KEY FK_66DD0F8B5585C142');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6A76ED395');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE business_role');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE candidate_skill');
        $this->addSql('DROP TABLE candidate_domain');
        $this->addSql('DROP TABLE candidate_disponibility');
        $this->addSql('DROP TABLE candidate_mobility');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE disponibility');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE mobility');
        $this->addSql('DROP TABLE prime');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
