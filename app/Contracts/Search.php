<?php


namespace App\Contracts;

interface Search {

	public function index($index);

	public function getIndex($index);

	public function get($query);
}
