<?php
/** Freesewing\Patterns\TestBezier class */

namespace Freesewing\Patterns;

/**
 * Used for testing Bezier curve intersection
 *
 * @author Joost De Cock <joost@decock.org>
 * @copyright 2016 Joost De Cock
 * @license http://opensource.org/licenses/GPL-3.0 GNU General Public License, Version 3
 */
class TestBezier extends Pattern
{
    /**
     * Generates a draft 
     *
     * @param \Freesewing\Model $model The model to draft for
     *
     * @return void
     */
    public function draft($model)
    {
        $this->test();
    }

    /**
     * Generates a sample 
     *
     * @param \Freesewing\Model $model The model to sample for
     *
     * @return void
     */
    public function sample($model)
    {
        $this->test();
    }

    /**
     * The actual testing
     *
     * @return void
     */
    public function test()
    {
        $p = $this->parts['test'];

        // Center vertical axis
        $p->newPoint(1,   0,  -20);
        $p->newPoint(2,   120, 100);
        $p->newPoint(3,   120, 0);
        $p->newPoint(4,   -20, 100);
        $p->newPoint(5,   0, 400);
        $p->newPoint(6,   100, -300);
        $p->newPoint(7,   -300, 0);
        $p->newPoint(8,   450, 100);

        //$p->curveCrossesCurve(1,5,6,2,3,7,8,4,'test3'); 
        //$p->curveCrossesLine(5,6,1,3,2,4,'test1'); 
        //$p->curveCrossesY(1,3,2,4,50,'test2'); 
        
        
        // Paths
        $path = 'M 1 C 5 6 2 M 3 C 7 8 4';
        $p->newPath('test', $path);
        $p->curvesCross(1,5,6,2,3,7,8,4,'test3'); 

        // Paths
        //$path = 'M 1 C 2 3 4 M 3 C 1 1 4';
        //$p->newPath('test', $path);
        //$p->curveCrossesCurve(1,2,3,4,3,1,1,4,'test3'); 

        // Mark path for sample service
        $p->paths['test']->setSample(true);
    }
}