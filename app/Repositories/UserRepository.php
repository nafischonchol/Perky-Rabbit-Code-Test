<?php
namespace App\Repositories;
use App\Repositories\Interface\IUserRepository;
use App\Models\User;

class UserRepository extends Repository implements IUserRepository
{
    private $modelName;
    public function __construct()
    {
        $this->modelName = 'App\Models\User';
        parent::__construct($this->modelName);
    }

}
