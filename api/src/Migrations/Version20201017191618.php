<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Migrations\Helpers\Create\Cheat;
use App\Migrations\Helpers\Retriever\Retriever;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017191618 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Populate cheats';
    }

    public function up(Schema $schema) : void
    {
    	$version_ids = (new Retriever())->retrieveIds($this->connection, 'version', 'length(name), name');

    	/** @var Cheat[] $cheats */
    	$cheats = [
    		new Cheat($version_ids[1]['id'], 'Aces', 'https://www.mediafire.com/file/4luk5akoxx1oxxd', ''),
			new Cheat($version_ids[7]['id'], 'Alien', 'https://www.mediafire.com/file/gm6f1np3cqqdh5m', ''),
			new Cheat($version_ids[2]['id'], 'Alive B14', 'https://www.mediafire.com/file/sfxhqsxh3rk0zhs', ''),
			new Cheat($version_ids[1]['id'], 'Aljami', 'https://www.mediafire.com/file/gfeacuklzcujo60', ''),
			new Cheat($version_ids[1]['id'], 'Amplitude', 'https://www.mediafire.com/file/vd2zzf7trt0eeon', ''),
			new Cheat($version_ids[3]['id'], 'Amusement et artisanat', 'https://www.mediafire.com/file/7fp4rnux0qxz7gb', ''),
			new Cheat($version_ids[2]['id'], 'Apinity', 'https://www.mediafire.com/file/mp67f7o7zyqg3bh', ''),
			new Cheat($version_ids[1]['id'], 'Argon', 'https://www.mediafire.com/file/tgzgekr9chh4txw', ''),
			new Cheat($version_ids[1]['id'], 'Atlas', 'https://www.mediafire.com/file/qqwriip30gwd4am', ''),
			new Cheat($version_ids[1]['id'], 'Atmosphere', 'https://www.mediafire.com/file/gbu3k4wzk4o818n', ''),
			new Cheat($version_ids[1]['id'], 'Atom B7', 'https://www.mediafire.com/file/4gumd5l2gdw1g5m', ''),
			new Cheat($version_ids[1]['id'], 'Baracon', 'https://www.mediafire.com/file/w5u4szyfw1tab0t', ''),
			new Cheat($version_ids[1]['id'], 'Black Hole', 'https://www.mediafire.com/file/9x5cxs5ey9goiyy', ''),
			new Cheat($version_ids[2]['id'], 'BlazeClient', 'https://www.mediafire.com/file/3xka9kvkavj0lqr', ''),
			new Cheat($version_ids[1]['id'], 'Bombed', 'https://www.mediafire.com/file/5k4xlc6phncc3p1', ''),
			new Cheat($version_ids[1]['id'], 'Brainfreeze', 'https://www.mediafire.com/file/ofdu12h9fs5eqsu', ''),
			new Cheat($version_ids[1]['id'], 'Captive', 'https://www.mediafire.com/file/m8x9v2z8dzo3idt', ''),
			new Cheat($version_ids[3]['id'], 'Carrot B5', 'https://www.mediafire.com/file/lnaf7vkv5srltga', ''),
			new Cheat($version_ids[1]['id'], 'Cheese', 'https://www.mediafire.com/file/xsm5xx4xpg7gwm1', ''),
			new Cheat($version_ids[1]['id'], 'Cherry', 'https://www.mediafire.com/file/x2r70j4k529ptu8', ''),
			new Cheat($version_ids[1]['id'], 'Client', 'https://www.mediafire.com/file/jhp9z1mvabh7to6', ''),
			new Cheat($version_ids[1]['id'], 'CheatnGrief', 'https://www.mediafire.com/file/egr9oaljn3d8suc', ''),
			new Cheat($version_ids[1]['id'], 'Colgate', 'https://www.mediafire.com/file/dcax1a7r4fplq65', ''),
			new Cheat($version_ids[1]['id'], 'Conceit', 'https://www.mediafire.com/file/pv777e7u478rqx7', ''),
			new Cheat($version_ids[1]['id'], 'CoresClient 1.4', 'https://www.mediafire.com/file/wnlmtk18yqchhhh', ''),
			new Cheat($version_ids[1]['id'], 'Cyanit', 'https://www.mediafire.com/file/6ecnbm6z436zbe3', ''),
			new Cheat($version_ids[1]['id'], 'Darkcloudz', 'https://www.mediafire.com/file/4348h11j0ebst8g', ''),
			new Cheat($version_ids[1]['id'], 'Def', 'https://www.mediafire.com/file/ne5b47ulqvb6rvi', ''),
			new Cheat($version_ids[1]['id'], 'Deluge', 'https://www.mediafire.com/file/garh2qp8rj2w2lj', ''),
			new Cheat($version_ids[1]['id'], 'DezztroyzClient', 'https://www.mediafire.com/file/vkdtkralplprgvo', ''),
			new Cheat($version_ids[1]['id'], 'Disintegrated', 'https://www.mediafire.com/file/9x2dlt2y5n5np4h', ''),
			new Cheat($version_ids[1]['id'], 'Dumbo B18', 'https://www.mediafire.com/file/9lxj0j2gc7pw428', ''),
			new Cheat($version_ids[1]['id'], 'Echo', 'https://www.mediafire.com/file/7hdtht2zbcl2ozd', ''),
			new Cheat($version_ids[1]['id'], 'Eload', 'https://www.mediafire.com/file/pirfnho3r69rfsc', ''),
			new Cheat($version_ids[1]['id'], 'Energy', 'https://www.mediafire.com/file/crbt956c2v6gln0', ''),
			new Cheat($version_ids[1]['id'], 'Euphoria', 'https://www.mediafire.com/file/l9rrv1p59151u6k', ''),
			new Cheat($version_ids[1]['id'], 'EvilHack', 'https://www.mediafire.com/file/bgbc8mdx0x3y7zm', ''),
			new Cheat($version_ids[1]['id'], 'Exeter', 'https://www.mediafire.com/file/uj2dcx2j1it2j82', ''),
			new Cheat($version_ids[1]['id'], 'Eximius', 'https://www.mediafire.com/file/6rh5cu93hi6b9n9', ''),
			new Cheat($version_ids[1]['id'], 'Fade', 'https://www.mediafire.com/file/f5og8n2pco0w4ay', ''),
			new Cheat($version_ids[1]['id'], 'Faurax', 'https://www.mediafire.com/file/0uppdeck6kqxzyf', ''),
			new Cheat($version_ids[3]['id'], 'Flare', 'https://www.mediafire.com/file/l30u363ym5m8z6j', ''),
			new Cheat($version_ids[1]['id'], 'Flare 3.7', 'https://www.mediafire.com/file/dr29f3mdvb9y6vs', ''),
			new Cheat($version_ids[1]['id'], 'Flashlight', 'https://www.mediafire.com/file/6oxao1cm1xfk1ay', ''),
			new Cheat($version_ids[1]['id'], 'Floon', 'https://www.mediafire.com/file/8asup65rtfnnx3a', ''),
			new Cheat($version_ids[1]['id'], 'Flux', 'https://www.mediafire.com/file/ronpq8ln1m4cybe', ''),
			new Cheat($version_ids[1]['id'], 'FusionX B2', 'https://www.mediafire.com/file/3dej0a0cl8cvjaf', ''),
			new Cheat($version_ids[1]['id'], 'Ghost', 'https://www.mediafire.com/file/ks03o830t0bs2es', ''),
			new Cheat($version_ids[1]['id'], 'Glade', 'https://www.mediafire.com/file/j4w9wwdlghvqreo', ''),
			new Cheat($version_ids[1]['id'], 'Grey', 'https://www.mediafire.com/file/3qwjgzwbxtzud2w', ''),
			new Cheat($version_ids[1]['id'], 'Helios', 'https://www.mediafire.com/file/stj45j625tg8vbj', ''),
			new Cheat($version_ids[1]['id'], 'Hexloit', 'https://www.mediafire.com/file/c080bt4et5po860', ''),
			new Cheat($version_ids[1]['id'], 'Horizon', 'https://www.mediafire.com/file/suewd3imw2n2kyc', ''),
			new Cheat($version_ids[1]['id'], 'Huzuni', 'https://www.mediafire.com/file/tfdzug0zsigzgdf', ''),
			new Cheat($version_ids[1]['id'], 'Huzuni', 'https://www.mediafire.com/file/3ub7p11114ul626', ''),
			new Cheat($version_ids[1]['id'], 'Icarus', 'https://www.mediafire.com/file/b0ty6q8wtyllgvo', ''),
			new Cheat($version_ids[2]['id'], 'ImpactClient', 'https://www.mediafire.com/file/g8479h7372k88p4', ''),
			new Cheat($version_ids[1]['id'], 'Inertia', 'https://www.mediafire.com/file/0wirzn0yvxhd8w6', ''),
			new Cheat($version_ids[1]['id'], 'Insanity', 'https://www.mediafire.com/file/x6w32672lrfztdh', ''),
			new Cheat($version_ids[1]['id'], 'Intel', 'https://www.mediafire.com/file/k09p9g1ghspr7ds', ''),
			new Cheat($version_ids[1]['id'], 'Irus', 'https://www.mediafire.com/file/ns905wetfbrcpa5', ''),
			new Cheat($version_ids[1]['id'], 'JamClient', 'https://www.mediafire.com/file/99ymddx88nl8fmg', ''),
			new Cheat($version_ids[0]['id'], 'Jigsaw', 'https://www.mediafire.com/file/7uhfvbt9w0dlqro', ''),
			new Cheat($version_ids[1]['id'], 'Kr0w', 'https://www.mediafire.com/file/sd19g6wjyx2y7a1', ''),
			new Cheat($version_ids[1]['id'], 'Kronos', 'https://www.mediafire.com/file/8o0a5fuefwugg4s', ''),
			new Cheat($version_ids[1]['id'], 'Kryptonite', 'https://www.mediafire.com/file/73i5f6bstnzi218', ''),
			new Cheat($version_ids[3]['id'], 'Liquid', 'https://www.mediafire.com/file/3iywq6ha1klpdw1', ''),
			new Cheat($version_ids[2]['id'], 'LiquidBounce', 'https://www.mediafire.com/file/65374nlzn5y15in', ''),
			new Cheat($version_ids[1]['id'], 'Lucid', 'https://www.mediafire.com/file/o7iof3f6n7c37iu', ''),
			new Cheat($version_ids[1]['id'], 'Lyfe', 'https://www.mediafire.com/file/dnaykufco969z9f', ''),
			new Cheat($version_ids[2]['id'], 'Matix', 'https://www.mediafire.com/file/avlg285z6zvcwpu', ''),
			new Cheat($version_ids[1]['id'], 'Metro', 'https://www.mediafire.com/file/63t56yrb8n3e2se', ''),
			new Cheat($version_ids[3]['id'], 'Moudoux', 'https://www.mediafire.com/file/jkd1qi3424x1n9g', ''),
			new Cheat($version_ids[1]['id'], 'Ne0n', 'https://www.mediafire.com/file/27tqrj7adnin462', ''),
			new Cheat($version_ids[1]['id'], 'Nodus', 'https://www.mediafire.com/file/6dc6mt9lo7evha2', ''),
			new Cheat($version_ids[1]['id'], 'Nodus', 'https://www.mediafire.com/file/73776fhka1v488h', ''),
			new Cheat($version_ids[1]['id'], 'Noobcraft', 'https://www.mediafire.com/file/wd085mb7u9kpd7j', ''),
			new Cheat($version_ids[1]['id'], 'Northstar', 'https://www.mediafire.com/file/wx6kd1uo5auob84', ''),
			new Cheat($version_ids[1]['id'], 'Nova B14', 'https://www.mediafire.com/file/d3gb59772etntbl', ''),
			new Cheat($version_ids[1]['id'], 'Nulled', 'https://www.mediafire.com/file/y3fgihl0c44tmr2', ''),
			new Cheat($version_ids[1]['id'], 'Optifine', 'https://www.mediafire.com/file/q8y7rfuquuttkri', ''),
			new Cheat($version_ids[1]['id'], 'Optifine HD', 'https://www.mediafire.com/file/hvrfvuommmd387c', ''),
			new Cheat($version_ids[1]['id'], 'Oxygen', 'https://www.mediafire.com/file/l12wb9gdqlorncb', ''),
			new Cheat($version_ids[1]['id'], 'Pandora', 'https://www.mediafire.com/file/5f6wra8s85jdizy', ''),
			new Cheat($version_ids[1]['id'], 'Paralyzed', 'https://www.mediafire.com/file/0e64un7pge5zq34', ''),
			new Cheat($version_ids[1]['id'], 'Phantom', 'https://www.mediafire.com/file/4s39sc3pzgq3lyo', ''),
			new Cheat($version_ids[1]['id'], 'ProClient', 'https://www.mediafire.com/file/i8sl8h9wdd4nna5', ''),
			new Cheat($version_ids[2]['id'], 'Protocol', 'https://www.mediafire.com/file/hbswaq0hkxbtyu8', ''),
			new Cheat($version_ids[1]['id'], 'Puberty', 'https://www.mediafire.com/file/b7kbf68r74plir5', ''),
			new Cheat($version_ids[1]['id'], 'Python', 'https://www.mediafire.com/file/3m4imxqqt9go64r', ''),
			new Cheat($version_ids[1]['id'], 'Radeon B4', 'https://www.mediafire.com/file/hp1776x51kypene', ''),
			new Cheat($version_ids[1]['id'], 'Redmod', 'https://www.mediafire.com/file/czkj51zmsd69ppy', ''),
			new Cheat($version_ids[1]['id'], 'Reflex', 'https://www.mediafire.com/file/yvdd6rrcdv3i2yr', ''),
			new Cheat($version_ids[1]['id'], 'Reflex', 'https://www.mediafire.com/file/tai1o2bjrmp5pk2', ''),
			new Cheat($version_ids[1]['id'], 'Rekt', 'https://www.mediafire.com/file/3expj3okv4xb98c', ''),
			new Cheat($version_ids[1]['id'], 'Remix', 'https://www.mediafire.com/file/3ryjhcpj4luo994', ''),
			new Cheat($version_ids[1]['id'], 'Saint', 'https://www.mediafire.com/file/ewsbx0wa4uhtqq8', ''),
			new Cheat($version_ids[1]['id'], 'Sallos', 'https://www.mediafire.com/file/9a4yq887l9eis0d', ''),
			new Cheat($version_ids[1]['id'], 'Sapphire', 'https://www.mediafire.com/file/vhvxnvwyfprxese', ''),
			new Cheat($version_ids[3]['id'], 'Sektor', 'https://www.mediafire.com/file/t2c14c8p6lfh3rv', ''),
			new Cheat($version_ids[1]['id'], 'Senos', 'https://www.mediafire.com/file/ipqkc6k63n34lnq', ''),
			new Cheat($version_ids[1]['id'], 'Serenity', 'https://www.mediafire.com/file/l0da84ovd3p0e1x', ''),
			new Cheat($version_ids[1]['id'], 'Serpent', 'https://www.mediafire.com/file/r5rbd2df65l835o', ''),
			new Cheat($version_ids[1]['id'], 'Shad0w', 'https://www.mediafire.com/file/gsb7pywj9ufnf14', ''),
			new Cheat($version_ids[2]['id'], 'SkillClient', 'https://www.mediafire.com/file/sgg2v693g1tdqgm', ''),
			new Cheat($version_ids[3]['id'], 'SkillClient', 'https://www.mediafire.com/file/t6e5tv7y4fdd8t2', ''),
			new Cheat($version_ids[1]['id'], 'Snow', 'https://www.mediafire.com/file/233pih1kjut3elb', ''),
			new Cheat($version_ids[1]['id'], 'Solstice', 'https://www.mediafire.com/file/g9qrxanggntkbks', ''),
			new Cheat($version_ids[1]['id'], 'Summer', 'https://www.mediafire.com/file/vt4spq3fz84b2s3', ''),
			new Cheat($version_ids[1]['id'], 'Sunshine', 'https://www.mediafire.com/file/cz31d69x67685ax', ''),
			new Cheat($version_ids[1]['id'], 'Taco', 'https://www.mediafire.com/file/xw0p7c8ohazbfc0', ''),
			new Cheat($version_ids[1]['id'], 'TeamBattle', 'https://www.mediafire.com/file/gwi2dyi41jwng3i', ''),
			new Cheat($version_ids[1]['id'], 'Tomato', 'https://www.mediafire.com/file/332o2yua99xlukp', ''),
			new Cheat($version_ids[1]['id'], 'Trendy', 'https://www.mediafire.com/file/82ne7dv6zzx1y8e', ''),
			new Cheat($version_ids[1]['id'], 'Tropical B89', 'https://www.mediafire.com/file/52jz733padibiu2', ''),
			new Cheat($version_ids[1]['id'], 'Tyrant', 'https://www.mediafire.com/file/c20gwaptcz8cawq', ''),
			new Cheat($version_ids[1]['id'], 'UHCMod', 'https://www.mediafire.com/file/jao1z95l95xd4c3', ''),
			new Cheat($version_ids[1]['id'], 'Ultima', 'https://www.mediafire.com/file/8z6i3gu8px85erj', ''),
			new Cheat($version_ids[1]['id'], 'United', 'https://www.mediafire.com/file/u5oy7cs585p4evl', ''),
			new Cheat($version_ids[1]['id'], 'Vape', 'https://www.mediafire.com/file/a5p3vgpd1r8i65t', ''),
			new Cheat($version_ids[1]['id'], 'Vatic', 'https://www.mediafire.com/file/f0jbqcbp6qub0cm', ''),
			new Cheat($version_ids[1]['id'], 'Vivid', 'https://www.mediafire.com/file/aol094ybftp2a6x', ''),
			new Cheat($version_ids[1]['id'], 'Vixtron', 'https://www.mediafire.com/file/8c222skijuivt8c', ''),
			new Cheat($version_ids[1]['id'], 'Weepcraft', 'https://www.mediafire.com/file/2277tt6w92okr8q', ''),
			new Cheat($version_ids[1]['id'], 'Winter', 'https://www.mediafire.com/file/rj2349daw5f8g21', ''),
			new Cheat($version_ids[1]['id'], 'Wolfram', 'https://www.mediafire.com/file/7bh53or2eln4cct', ''),
			new Cheat($version_ids[3]['id'], 'Wolfram', 'https://www.mediafire.com/file/lotq9awk5r443mm', ''),
			new Cheat($version_ids[1]['id'], 'Wolfram', 'https://www.mediafire.com/file/5ed6l5p48y6jkc5', ''),
			new Cheat($version_ids[1]['id'], 'Wurst', 'https://www.mediafire.com/file/e57cz34agy7guw5', ''),
			new Cheat($version_ids[2]['id'], 'Wurst', 'https://www.mediafire.com/file/6uotscfuuq2mxok', ''),
			new Cheat($version_ids[1]['id'], 'Xenon', 'https://www.mediafire.com/file/6ru88t661hmaozl', ''),
			new Cheat($version_ids[1]['id'], 'Xiv', 'https://www.mediafire.com/file/iyea9j7asg4yd33', ''),
			new Cheat($version_ids[1]['id'], 'Zapped', 'https://www.mediafire.com/file/8gnar4sn5kq53jq', ''),
			new Cheat($version_ids[3]['id'], 'Zitrox', 'https://www.mediafire.com/file/838nyp6pyexo0mu', ''),
			new Cheat($version_ids[2]['id'], 'Zitrox', 'https://www.mediafire.com/file/79q7jyzo6ily7ut', ''),
			new Cheat($version_ids[1]['id'], 'Zues', 'https://www.mediafire.com/file/6d8evo2x7eq1ofc', ''),
		];

    	$sqlStatement = "";

    	for ($i = 0; $i < \count($cheats); $i++) {
    		$sqlStatement .= \sprintf("%s%s", $cheats[$i]->toInsertStatement(), isset($cheats[$i + 1]) ? ', ' : '');
		}

		$this->addSql(<<<SQL
INSERT INTO cheat (id, version_id, name, download_link, youtube_link, approved) VALUES {$sqlStatement}
SQL
);
    }

    public function down(Schema $schema) : void
    {
    	$this->addSql("DELETE FROM cheat WHERE 1=1");
    }
}
