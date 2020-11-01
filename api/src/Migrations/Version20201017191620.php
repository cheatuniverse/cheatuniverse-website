<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Migrations\Helpers\Create\Launcher;
use App\Migrations\Helpers\Retriever\Retriever;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017191620 extends AbstractMigration
{
	const VERSIONS = [
		'0.1.1',
		'1.1.0',
		'1.2.0',
		'1.3.0',
		'1.4.0',
		'1.5.0',
		'1.6.0'
	];

    public function getDescription() : string
    {
        return 'Populate launchers';
    }

    private function generateLaunchersForSystem(string $platform, array $urls): array
	{
    	$launchers = [];

    	for ($i = 0; $i < \count(self::VERSIONS); $i++) {
    		$launchers[] = new Launcher($platform, self::VERSIONS[$i], $urls[$i]);
		}

		return $launchers;
	}

    public function up(Schema $schema) : void
    {
    	$platform_ids = (new Retriever())->retrieveIds($this->connection, 'platform');

    	/** @var Launcher[] $launchers */
		$launchers = \array_merge(
			$this->generateLaunchersForSystem(
				$platform_ids[2]['id'], [
					'https://www.mediafire.com/file/1fwq0ayc6ucgoli',
					'https://www.mediafire.com/file/ga3o11gb06o6x1x',
					'https://www.mediafire.com/file/rfi62ubbpsce07g',
					'https://www.mediafire.com/file/p1j8cfzqju1mfo3',
					'https://www.mediafire.com/file/o3tsii9aa60vq1w',
					'https://www.mediafire.com/file/29w7tq86yzxgp06',
					'https://www.mediafire.com/file/lfjgjdimmxvqzni',
				]
			),
			$this->generateLaunchersForSystem(
				$platform_ids[0]['id'], [
					'https://www.mediafire.com/file/z53svno63sc8huv',
					'https://www.mediafire.com/file/d6klqf9tx4sv9m7',
					'https://www.mediafire.com/file/e75b9pqbdkp59xd',
					'https://www.mediafire.com/file/zy7nx9118dr7wmq',
					'https://www.mediafire.com/file/xoglb3ql1yhhhmq',
					'https://www.mediafire.com/file/cubffj2fsrqy84n',
					'https://www.mediafire.com/file/wfggb2q8wowb00l'
				]
			),
			$this->generateLaunchersForSystem(
				$platform_ids[1]['id'], [
					'https://www.mediafire.com/file/na313gb1fc8kaqy',
					'https://www.mediafire.com/file/g77km1my2ggh7ag',
					'https://www.mediafire.com/file/m735ya32pgkza9w',
					'https://www.mediafire.com/file/zng9ni45tqp2lhs',
					'https://www.mediafire.com/file/kbrcj9niw0k5hhh',
					'https://www.mediafire.com/file/zg2l2442bb328qy',
					'https://www.mediafire.com/file/aqfxcdbkcby5w5y',
				]
			)
		);

		$sqlStatement = "";

		for ($i = 0; $i < \count($launchers); $i++) {
			$sqlStatement .= \sprintf("%s%s", $launchers[$i]->toInsertStatement(), (isset($launchers[$i + 1]) ? ', ' : ''));
		}

		$this->addSql(<<<SQL
INSERT INTO launcher (id, name, url, platform_id) VALUES {$sqlStatement}
SQL
		);
    }

    public function down(Schema $schema) : void
    {
    	$this->addSql("DELETE FROM launcher WHERE 1=1");
    }
}
