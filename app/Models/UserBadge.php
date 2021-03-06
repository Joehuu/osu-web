<?php

/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace App\Models;

/**
 * @property \Carbon\Carbon|null $awarded
 * @property string $description
 * @property string $image
 * @property string $url
 * @property int $user_id
 */
class UserBadge extends Model
{
    protected $table = 'osu_badges';
    protected $primaryKey = 'user_id';

    protected $dates = ['awarded'];
    public $timestamps = false;

    public function imageUrl()
    {
        return "https://assets.ppy.sh/profile-badges/{$this->image}";
    }
}
