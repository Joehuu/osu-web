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

namespace App\Libraries\Elasticsearch;

use Exception;

class QueryHelper
{
    /**
     * @param array|Queryable $clause
     *
     * @return array
     */
    public static function clauseToArray($clause): array
    {
        if (is_array($clause)) {
            return $clause;
        }

        if (is_object($clause) && $clause instanceof Queryable) {
            return $clause->toArray();
        }

        throw new Exception('$clause should be array or Queryable.');
    }

    /**
     * Helper method that creates the simple_query_string query.
     *
     * @param string $query The query string.
     * @param array $fields The fields to search; Use an empty array to search all fields.
     *
     * @return array
     */
    public static function queryString(string $query, array $fields = [], string $operator = 'or', float $boost = 1): array
    {
        return [
            'simple_query_string' => [
                'query' => $query,
                'fields' => $fields,
                'default_operator' => $operator,
                'boost' => $boost,
            ],
        ];
    }
}
