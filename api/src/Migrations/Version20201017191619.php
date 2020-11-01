<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Migrations\Helpers\Create\Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017191619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Populate platforms';
    }

    public function up(Schema $schema) : void
    {
    	/** @var Platform[] $versions */
    	$platforms = [
			new Platform('Windows', 'https://res.cloudinary.com/dmhnkqgsw/image/upload/v1563038886/windows_zdmdxn.svg'),
			new Platform('Linux', 'https://res.cloudinary.com/dmhnkqgsw/image/upload/v1563038886/linux_uexiy7.svg'),
			new Platform('Macos', 'https://res.cloudinary.com/dmhnkqgsw/image/upload/v1563038886/macos_yslbqt.svg'),
		];

    	$sqlStatement = "";

    	for ($i = 0; $i < \count($platforms); $i++) {
    		$sqlStatement .= \sprintf("%s%s", $platforms[$i]->toInsertStatement(), (isset($platforms[$i + 1]) ? ', ' : ''));
		}

		$this->addSql(<<<SQL
INSERT INTO platform (id, name, logo) VALUES {$sqlStatement}
SQL
);
    }

    public function down(Schema $schema) : void
    {
    	$this->addSql("DELETE FROM platform WHERE 1=1");
    }
}
