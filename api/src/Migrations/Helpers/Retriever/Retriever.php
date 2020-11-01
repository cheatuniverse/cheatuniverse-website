<?php


namespace App\Migrations\Helpers\Retriever;


use Doctrine\DBAL\Connection;

class Retriever
{
	public function retrieveIds(Connection $connection, string $from, string $order = 'name'): array
	{
		return
			$categoryIds = $connection->fetchAll("SELECT id FROM {$from} ORDER BY {$order}");
	}
}
