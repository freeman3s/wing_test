<?php

namespace Application\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="item")
  * @ORM\Entity(repositoryClass="Application\ItemBundle\Repository\ItemRepository")
 */
class Item
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $name;

	/**
	 * Many Items have Many Categories.
	 * @ORM\ManyToMany(targetEntity="Category", inversedBy="items")
	 * @ORM\JoinTable(name="items_categories")
	 */
	private $categories;

	public function __construct() {
		$this->categories = new ArrayCollection();
	}

	public function __toString()
	{
		if(!is_null($this->name))
		{
			return $this->name;
		}
		else{
			return "";
		}
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Gets the categories granted to the item.
	 *
	 * @return Collection
	 */
	public function getCategories()
	{
		return $this->categories ?: $this->categories = new ArrayCollection();
	}

	public function addCategory(Category $category)
	{
		if (!$this->categories->contains($category)) {
			$this->categories->add($category);
		}

		return $this;
	}

	public function removeCategory(Category $category)
	{
		if ($this->categories->contains($category)) {
			$this->categories->removeElement($category);
		}
	}
}
