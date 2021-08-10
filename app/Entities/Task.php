<?php

namespace App\Entities;

class Task extends \CodeIgniter\Entity\Entity
{
	public function getDescription() {
		if ( key_exists( 'description', $this->attributes ) ) {
			return esc($this->attributes['description']);
		} else {
			return false;
		}
	}
}