<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tbl_posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
    	'post_title',
		'post_content',
		'post_status',
		'post_author'
	];
}
