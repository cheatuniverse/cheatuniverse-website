<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20201017191611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create tables';
    }

	public function up(Schema $schema) : void
	{
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

		$this->addSql('CREATE TABLE cheat (id UUID NOT NULL, version_id UUID NOT NULL, submitter_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, download_link VARCHAR(1024) NOT NULL, youtube_link VARCHAR(1024) DEFAULT NULL, approved BOOLEAN NOT NULL, PRIMARY KEY(id))');
		$this->addSql('CREATE INDEX IDX_83B0C3644BBC2705 ON cheat (version_id)');
		$this->addSql('CREATE INDEX IDX_83B0C364919E5513 ON cheat (submitter_id)');
		$this->addSql('COMMENT ON COLUMN cheat.id IS \'(DC2Type:uuid)\'');
		$this->addSql('COMMENT ON COLUMN cheat.version_id IS \'(DC2Type:uuid)\'');
		$this->addSql('COMMENT ON COLUMN cheat.submitter_id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE cheat_user (cheat_id UUID NOT NULL, user_id UUID NOT NULL, PRIMARY KEY(cheat_id, user_id))');
		$this->addSql('CREATE INDEX IDX_D0C03AF229914E ON cheat_user (cheat_id)');
		$this->addSql('CREATE INDEX IDX_D0C03AFA76ED395 ON cheat_user (user_id)');
		$this->addSql('COMMENT ON COLUMN cheat_user.cheat_id IS \'(DC2Type:uuid)\'');
		$this->addSql('COMMENT ON COLUMN cheat_user.user_id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE launcher (id UUID NOT NULL, platform_id UUID NOT NULL, name VARCHAR(10) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
		$this->addSql('CREATE INDEX IDX_7B9C3515FFE6496F ON launcher (platform_id)');
		$this->addSql('COMMENT ON COLUMN launcher.id IS \'(DC2Type:uuid)\'');
		$this->addSql('COMMENT ON COLUMN launcher.platform_id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE platform (id UUID NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(1024) NOT NULL, PRIMARY KEY(id))');
		$this->addSql('COMMENT ON COLUMN platform.id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE tag (id UUID NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
		$this->addSql('COMMENT ON COLUMN tag.id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE tag_cheat (tag_id UUID NOT NULL, cheat_id UUID NOT NULL, PRIMARY KEY(tag_id, cheat_id))');
		$this->addSql('CREATE INDEX IDX_A15CDA62BAD26311 ON tag_cheat (tag_id)');
		$this->addSql('CREATE INDEX IDX_A15CDA62229914E ON tag_cheat (cheat_id)');
		$this->addSql('COMMENT ON COLUMN tag_cheat.tag_id IS \'(DC2Type:uuid)\'');
		$this->addSql('COMMENT ON COLUMN tag_cheat.cheat_id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE "user" (id UUID NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, authentication_token VARCHAR(512) NOT NULL, PRIMARY KEY(id))');
		$this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
		$this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
		$this->addSql('CREATE TABLE version (id UUID NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
		$this->addSql('COMMENT ON COLUMN version.id IS \'(DC2Type:uuid)\'');
		$this->addSql('ALTER TABLE cheat ADD CONSTRAINT FK_83B0C3644BBC2705 FOREIGN KEY (version_id) REFERENCES version (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE cheat ADD CONSTRAINT FK_83B0C364919E5513 FOREIGN KEY (submitter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE cheat_user ADD CONSTRAINT FK_D0C03AF229914E FOREIGN KEY (cheat_id) REFERENCES cheat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE cheat_user ADD CONSTRAINT FK_D0C03AFA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE launcher ADD CONSTRAINT FK_7B9C3515FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE tag_cheat ADD CONSTRAINT FK_A15CDA62BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
		$this->addSql('ALTER TABLE tag_cheat ADD CONSTRAINT FK_A15CDA62229914E FOREIGN KEY (cheat_id) REFERENCES cheat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
	}

	public function down(Schema $schema) : void
	{
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

		$this->addSql('CREATE SCHEMA public');
		$this->addSql('ALTER TABLE cheat_user DROP CONSTRAINT FK_D0C03AF229914E');
		$this->addSql('ALTER TABLE tag_cheat DROP CONSTRAINT FK_A15CDA62229914E');
		$this->addSql('ALTER TABLE launcher DROP CONSTRAINT FK_7B9C3515FFE6496F');
		$this->addSql('ALTER TABLE tag_cheat DROP CONSTRAINT FK_A15CDA62BAD26311');
		$this->addSql('ALTER TABLE cheat DROP CONSTRAINT FK_83B0C364919E5513');
		$this->addSql('ALTER TABLE cheat_user DROP CONSTRAINT FK_D0C03AFA76ED395');
		$this->addSql('ALTER TABLE cheat DROP CONSTRAINT FK_83B0C3644BBC2705');
		$this->addSql('DROP TABLE cheat');
		$this->addSql('DROP TABLE cheat_user');
		$this->addSql('DROP TABLE launcher');
		$this->addSql('DROP TABLE platform');
		$this->addSql('DROP TABLE tag');
		$this->addSql('DROP TABLE tag_cheat');
		$this->addSql('DROP TABLE "user"');
		$this->addSql('DROP TABLE version');
	}
}
