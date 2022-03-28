<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="categories")
 * @UniqueEntity("name")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message = "The name of category is required")
     * @ORM\Column(type="string", length=45, unique = true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="subcategories")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="parent")
     */
    private $subcategories;

    /**
     * @ORM\OneToMany(targetEntity=VideoNew::class, mappedBy="category")
     */
    private $videoNews;

    public function __construct()
    {
        $this->subcategories = new ArrayCollection();
        $this->videoNews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSubcategories(): Collection
    {
        return $this->subcategories;
    }

    public function addSubcategory(self $subcategory): self
    {
        if (!$this->subcategories->contains($subcategory)) {
            $this->subcategories[] = $subcategory;
            $subcategory->setParent($this);
        }

        return $this;
    }

    public function removeSubcategory(self $subcategory): self
    {
        if ($this->subcategories->removeElement($subcategory)) {
            // set the owning side to null (unless already changed)
            if ($subcategory->getParent() === $this) {
                $subcategory->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VideoNew[]
     */
    public function getVideoNews(): Collection
    {
        return $this->videoNews;
    }

    public function addVideoNews(VideoNew $videoNews): self
    {
        if (!$this->videoNews->contains($videoNews)) {
            $this->videoNews[] = $videoNews;
            $videoNews->setCategory($this);
        }

        return $this;
    }

    public function removeVideoNews(VideoNew $videoNews): self
    {
        if ($this->videoNews->removeElement($videoNews)) {
            // set the owning side to null (unless already changed)
            if ($videoNews->getCategory() === $this) {
                $videoNews->setCategory(null);
            }
        }

        return $this;
    }
}
