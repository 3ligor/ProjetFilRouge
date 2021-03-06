<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PromoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PromoRepository extends EntityRepository {

	public function findPromoByTitle($title) {
				$query = $this->createQueryBuilder('p')
				->where('p.title = :title')
				->setParameter('title', $title);
		return $query->getQuery()->getOneOrNullResult();
	}

}
