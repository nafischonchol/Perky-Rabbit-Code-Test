<?php
namespace App\Repositories;
use App\Repositories\Interface\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends Repository implements ICategoryRepository
{
    private $modelName;
    public function __construct()
    {
        $this->modelName = 'App\Models\Category';
        parent::__construct($this->modelName);
    }

}
