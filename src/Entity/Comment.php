<?php


namespace App\Entity;


class Comment {

  private $name;
  private $email;
  private $body;

  /**
   * @return string
   */
  public function getName(): ?string {
    return $this->name;
  }


  public function setName(string $title): self {
    $this->name = $title;

    return $this;
  }


  /**
   * @return string
   */
  public function getEmail(): ?string {
    return $this->email;
  }


  public function setEmail(string $email): self {
    $this->email = $email;

    return $this;
  }

  /**
   * @return string
   */
  public function getBody(): ?string {
    return $this->body;
  }


  public function setBody(string $body): self {
    $this->body = $body;

    return $this;
  }

}