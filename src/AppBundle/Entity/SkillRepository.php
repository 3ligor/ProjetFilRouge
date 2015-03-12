<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SkillRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SkillRepository extends EntityRepository {

	public function getSkillsWithChilds() {
		$query = $this->createQueryBuilder('s')
				->leftJoin('s.childs','c')
				->addSelect('c')
				->leftJoin('s.userSkills','us')
				->addSelect('us');
		return $query->getQuery()->getResult();
	}

}
