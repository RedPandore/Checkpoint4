<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\InformationRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 * @Vich\Uploadable
 */

class Information
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $curriculum;

    /**
     * @Vich\UploadableField(mapping="curriculumFile", fileNameProperty="curriculum")
     * @Assert\File(
     * mimeTypes={
     * "application/pdf",
     * "application/msword",
     * "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
     * "application/vnd.openxmlformats-officedocument.wordprocessingml.template",
     * "application/vnd.ms-word.document.macroEnabled.12",
     * "application/vnd.ms-word.template.macroEnabled.12",
     * "application/vnd.ms-excel",
     * "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
     * "application/vnd.openxmlformats-officedocument.spreadsheetml.template",
     * "application/vnd.ms-excel.sheet.macroEnabled.12",
     * "application/vnd.ms-excel.template.macroEnabled.12",
     * }
     * )
     * @var File
     */
    private $curriculumFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCurriculum(): ?string
    {
        return $this->curriculum;
    }

    public function setCurriculum(string $curriculum): self
    {
        $this->curriculum = $curriculum;

        return $this;
    }

    /**
     * @param File|null $curriculumFile
     * @return $this
     */
    public function setCurriculumFile(File $curriculumFile = null): self
    {
        $this->curriculumFile = $curriculumFile;
        if (null !== $curriculumFile) {
            $this->updatedAt = new DateTime();
        }
        return $this;
    }

    public function getCurriculumFile(): ?File
    {
        return $this->curriculumFile;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTime  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
