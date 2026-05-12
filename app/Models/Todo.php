<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Todo extends Model
{
	protected $fillable = [
		'category_id',
		'title',
		'body',
		'attachment_path',
		'is_done',
		'user_id',
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
