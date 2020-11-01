<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200901182353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        /*$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE cheat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE launcher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE launcher_version_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE platform_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE version_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cheat (id INT NOT NULL, version_id INT NOT NULL, name VARCHAR(255) NOT NULL, download_link VARCHAR(1024) NOT NULL, youtube_link VARCHAR(1024) NOT NULL, approved BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_83B0C3644BBC2705 ON cheat (version_id)');
        $this->addSql('CREATE TABLE launcher (id INT NOT NULL, launcher_version_id INT NOT NULL, platform_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7B9C3515A417CA64 ON launcher (launcher_version_id)');
        $this->addSql('CREATE INDEX IDX_7B9C3515FFE6496F ON launcher (platform_id)');
        $this->addSql('CREATE TABLE launcher_version (id INT NOT NULL, name VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tag_cheat (tag_id INT NOT NULL, cheat_id INT NOT NULL, PRIMARY KEY(tag_id, cheat_id))');
        $this->addSql('CREATE INDEX IDX_A15CDA62BAD26311 ON tag_cheat (tag_id)');
        $this->addSql('CREATE INDEX IDX_A15CDA62229914E ON tag_cheat (cheat_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE TABLE platform (id INT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(1024) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE version (id INT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cheat ADD CONSTRAINT FK_83B0C3644BBC2705 FOREIGN KEY (version_id) REFERENCES version (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE launcher ADD CONSTRAINT FK_7B9C3515A417CA64 FOREIGN KEY (launcher_version_id) REFERENCES launcher_version (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE launcher ADD CONSTRAINT FK_7B9C3515FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_cheat ADD CONSTRAINT FK_A15CDA62BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_cheat ADD CONSTRAINT FK_A15CDA62229914E FOREIGN KEY (cheat_id) REFERENCES cheat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');*/
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        /*$this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tag_cheat DROP CONSTRAINT FK_A15CDA62229914E');
        $this->addSql('ALTER TABLE launcher DROP CONSTRAINT FK_7B9C3515A417CA64');
        $this->addSql('ALTER TABLE tag_cheat DROP CONSTRAINT FK_A15CDA62BAD26311');
        $this->addSql('ALTER TABLE launcher DROP CONSTRAINT FK_7B9C3515FFE6496F');
        $this->addSql('ALTER TABLE cheat DROP CONSTRAINT FK_83B0C3644BBC2705');
        $this->addSql('DROP SEQUENCE cheat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE launcher_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE launcher_version_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE platform_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE version_id_seq CASCADE');
        $this->addSql('DROP TABLE cheat');
        $this->addSql('DROP TABLE launcher');
        $this->addSql('DROP TABLE launcher_version');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_cheat');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE version');*/
    }
}
