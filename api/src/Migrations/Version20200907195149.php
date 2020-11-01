<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907195149 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        /*$this->addSql('CREATE TABLE cheat_user (cheat_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(cheat_id, user_id))');
        $this->addSql('CREATE INDEX IDX_D0C03AF229914E ON cheat_user (cheat_id)');
        $this->addSql('CREATE INDEX IDX_D0C03AFA76ED395 ON cheat_user (user_id)');
        $this->addSql('ALTER TABLE cheat_user ADD CONSTRAINT FK_D0C03AF229914E FOREIGN KEY (cheat_id) REFERENCES cheat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cheat_user ADD CONSTRAINT FK_D0C03AFA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cheat ADD submitter_id INT NOT NULL');
        $this->addSql('ALTER TABLE cheat ADD CONSTRAINT FK_83B0C364919E5513 FOREIGN KEY (submitter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_83B0C364919E5513 ON cheat (submitter_id)');*/
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        /*$this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE cheat_user');
        $this->addSql('ALTER TABLE cheat DROP CONSTRAINT FK_83B0C364919E5513');
        $this->addSql('DROP INDEX IDX_83B0C364919E5513');
        $this->addSql('ALTER TABLE cheat DROP submitter_id');*/
    }
}
