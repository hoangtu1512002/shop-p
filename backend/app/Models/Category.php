<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = ['name', 'image_name', 'image_url'];

    private $limit = 10;

    public function findByConditions($request)
    {
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $status = $request->input('status');
        $selectedFilters = ['id' => $id, 'name' => $keyword, 'status' => $status];
        $conditions  = [];
        foreach ($selectedFilters as $field => $value) {
            if (isset($value)) {
                $conditions[] = [$field, 'like', '%' . $value . '%'];
            }
        }
        $result = $this->where($conditions)->paginate($this->limit)->appends($selectedFilters);

        if(empty($result)) {
            return [];
        }

        return $result;
    }
}
