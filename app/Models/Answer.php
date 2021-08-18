<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $question_id
 * @property string $text
 * @property int $is_correct
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereText($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable=[
       'text',
       'is_correct'
    ];

    public function question()
    {
        $this->belongsTo(Question::class);
    }
}
