<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Teko
 *
 * @property int $id
 * @property string $article
 * @property string $name
 * @property float $count
 * @property int $mounth
 * @property string $mag
 * @property string $grupa
 * @property string $TM
 * @property string $torg3
 * @method static \Illuminate\Database\Eloquent\Builder|Teko newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teko newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teko query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereGrupa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereMag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereMounth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereTM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teko whereTorg3($value)
 * @mixin \Eloquent
 */
class Teko extends Model
{
    use HasFactory;
}
