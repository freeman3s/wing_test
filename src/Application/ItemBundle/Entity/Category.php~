<?php

namespace Application\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
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
	 * Many Categories have Many Items.
	 * @ORM\ManyToMany(targetEntity="Item", mappedBy="categories")
	 */
	private $items;

	public function __construct() {
		$this->items = new ArrayCollection();
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
	public function getItems()
	{
		return $this->items ?: $this->items = new ArrayCollection();
	}

    /**
     * Add item
     *
     * @param \Application\ItemBundle\Entity\Item $item
     *
     * @return Category
     */
    public function addItem(\Application\ItemBundle\Entity\Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \Application\ItemBundle\Entity\Item $item
     */
    public function removeItem(\Application\ItemBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
    }
}
