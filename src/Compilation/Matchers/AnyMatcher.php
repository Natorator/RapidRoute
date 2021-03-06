<?php

namespace RapidRoute\Compilation\Matchers;

/**
 * The any matcher matches any (non-empty) route segment.
 *
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class AnyMatcher extends SegmentMatcher
{
    /**
     * @param string $segmentVariable
     * @param int    $uniqueKey
     *
     * @return string
     */
    public function getConditionExpression($segmentVariable, $uniqueKey)
    {
        return $segmentVariable . ' !== \'\'';
    }

    /**
     * Returns a unique hash for the matching criteria of the segment.
     *
     * @return string
     */
    protected function getMatchHash()
    {
        return '';
    }
}