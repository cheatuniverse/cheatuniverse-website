<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Migrations\Helpers\Create\Cheat;
use App\Migrations\Helpers\Create\Version;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017191616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Populate cheat versions';
    }

    public function up(Schema $schema) : void
    {
    	/** @var Version[] $versions */
    	$versions = [
			new Version('1.7'),
			new Version('1.8'),
			new Version('1.9'),
			new Version('1.10'),
			new Version('1.11'),
			new Version('1.12'),
			new Version('1.13'),
			new Version('1.14'),
		];

    	$sqlStatement = "";

    	for ($i = 0; $i < \count($versions); $i++) {
    		$sqlStatement .= \sprintf("%s%s", $versions[$i]->toInsertStatement(), (isset($versions[$i + 1]) ? ', ' : ''));
		}

		$this->addSql(<<<SQL
INSERT INTO version (id, name) VALUES {$sqlStatement}
SQL
);
    }

    public function down(Schema $schema) : void
    {
    	$this->addSql("DELETE FROM version WHERE 1=1");
    }
}
