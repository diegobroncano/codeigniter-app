<?php

namespace App\Entities;

class Task extends \CodeIgniter\Entity\Entity
{
	public function getDescription() {
		return esc($this->attributes['description']);
	}
}