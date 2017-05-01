<?php

namespace Application\ItemBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ItemRepository extends EntityRepository
{
	public function findAll()
	{
		return $this->createQueryBuilder("p");
	}

	public function findAllIncluded($id)
	{
		$em = $this->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT id, name FROM items_categories LEFT OUTER JOIN item ON item.id = items_categories.item_id WHERE category_id = :id");
		$statement->bindValue('id', $id);
		$statement->execute();
		return $statement->fetchAll();
	}
}
