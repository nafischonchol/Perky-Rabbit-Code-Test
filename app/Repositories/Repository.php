<?php
namespace App\Repositories;
use App\Repositories\Interface\IRepository;
use App\Models\Purchase;
use App\Helpers\GuidHelper;

class Repository implements IRepository
{
    private $modelName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
    }

    public function all()
    {
        return $this->modelName::get();
    }

    public function allDesc()
    {
        return $this->modelName::orderBy("created_at","desc")->get();
    }

    public function get($id)
    {
        return $this->modelName::find($id);
    }

    public function first()
    {
        return $this->modelName::first();
    }

    function withLimit($limit=10)
    {
        return $this->modelName::take(10)->get();
    }

    public function store(array $data)
    {
        return $this->modelName::create($data);
    }

    public function multipleStore(array $data)
    {
        return $this->modelName::query()->insert($data);
    }

    function updateOrCreate($data,$columnName,$value)
    {
        $record = $this->modelName::where($columnName, $value)->first();
        if ($record) {
            $record->update($data);
            return $record;
        }
        else
        {
            $record = $this->modelName::create($data);
        }
    }

    function updateOrCreateWithTrashed($data,$columnName,$value)
    {
        $record = $this->modelName::withTrashed()->where($columnName, $value)->first();
        if ($record) {
            $record->restore();
            $record->update($data);
        } else {
            $record = $this->modelName::create($data);
        }
    }

    public function update(array $data,$id)
    {
        $update = $this->modelName::find($id);
        if($update)
            $update->update($data);
        return $update;
    }

    public function delete($id)
    {
        return $this->modelName::destroy($id);
    }

    public function forceDelete($id)
    {
        $data = $this->modelName::find($id);

        return $data->forceDelete();
    }

    public function deleteWithData($id)
    {
        $data = $this->modelName::where("id",$id)->first();
        $data->delete();
        return $data;
    }

    public function forceDeleteAll()
    {
        return $this->modelName::query()->truncate();
    }

    public function softDeleteAll()
    {
        return $this->modelName::query()->delete();
    }
}
