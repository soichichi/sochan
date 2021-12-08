<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //変更後
    protected $fillable = [
    'title',
    'body',
    'category_id'
    
   
];
    //変更後
    public function getPaginateByLimit(int $limit_count = 5)
    {
        #updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
    }
   
    //Categoryに対するリレーション
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
