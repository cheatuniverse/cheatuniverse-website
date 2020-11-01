<?php

namespace App\Extension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Cheat;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;

class ApprovedCheatExtension implements QueryCollectionExtensionInterface {
	private $security;

	public function __construct(Security $security)
	{
		$this->security = $security;
	}

	public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
	{
		$this->addWhere($queryBuilder, $resourceClass);
	}

	private function addWhere(QueryBuilder $queryBuilder, string $resourceClass)
	{
		if (Cheat::class !== $resourceClass) {
			return;
		}

		if ($this->security->isGranted('ROLE_MODERATOR')) {
			return;
		}

		$rootAlias = $queryBuilder->getRootAliases()[0];
		$queryBuilder->andWhere(sprintf('%s.approved = :approved', $rootAlias));
		$queryBuilder->setParameter('approved', true);
	}
}
