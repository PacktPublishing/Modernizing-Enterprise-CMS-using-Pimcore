<?php

declare(strict_types=1);

namespace Location;

use PHPUnit\Framework\TestCase;

class Issue15Test extends TestCase
{
    /**
     * @see https://github.com/mjaschen/phpgeo/issues/15
     */
    public function testIfIssue15IsFixed()
    {
        $data = [
            [20.6579781231, -103.422906054],
            [20.6580106449, -103.422897337],
            [20.6580357067, -103.422887027],
            [20.6580530573, -103.422873113],
            [20.6580754789, -103.422858864],
            [20.6581169274, -103.422843861],
            [20.6581701944, -103.422823409],
            [20.6582261855, -103.422804549],
            [20.6582879601, -103.422781583],
            [20.6583917403, -103.422747897],
            [20.6584564535, -103.422721072],
            [20.6585244273, -103.422692896],
            [20.6586065208, -103.422658867],
            [20.6586790699, -103.422628794],
            [20.6587552535, -103.422597214],
            [20.6588130308, -103.422573891],
            [20.6588720341, -103.42255021],
            [20.6589324369, -103.422525967],
            [20.6590027634, -103.422497741],
            [20.6590702995, -103.422468988],
            [20.6591201277, -103.422444292],
            [20.6591365207, -103.422436166],
            [20.6591257477, -103.422441506],
            [20.6591381119, -103.422435378],
            [20.6592482509, -103.42239942],
            [20.6592598032, -103.422395672],
            [20.6592684096, -103.42239288],
            [20.659233168, -103.422404313],
            [20.6592154847, -103.42241005],
            [20.6592024446, -103.422414281],
            [20.6592397671, -103.422538089],
            [20.6592234224, -103.422524845],
            [20.6592450058, -103.422512105],
            [20.6592722051, -103.422502633],
            [20.6594071957, -103.422540268],
            [20.6594734127, -103.42251244],
            [20.6596607482, -103.422478996],
            [20.6597573077, -103.42242334],
            [20.6598714693, -103.422378581],
            [20.6600107346, -103.422340276],
            [20.6601370663, -103.422289965],
            [20.6602900948, -103.422230188],
            [20.6604063622, -103.422165179],
            [20.660509254, -103.422112257],
            [20.6606362708, -103.422059897],
            [20.6607423011, -103.42200584],
            [20.660834149, -103.421968132],
            [20.6608913904, -103.421965255],
            [20.660888676, -103.421957729],
            [20.6608924298, -103.421968137],
            [20.6608892495, -103.421959319],
            [20.6608915012, -103.421965562],
            [20.6608967866, -103.421980217],
            [20.6608905586, -103.421962949],
            [20.6608862009, -103.421950866],
            [20.6608818429, -103.421938783],
            [20.6608846513, -103.421946569],
            [20.6608818429, -103.421938783],
            [20.6610598314, -103.421866543],
            [20.6610790881, -103.421889792],
        ];

        $polyline = new \Location\Polyline();
        foreach ($data as $point) {
            $polyline->addPoint(new \Location\Coordinate($point[0], $point[1]));
        }

        $processor  = new \Location\Processor\Polyline\SimplifyDouglasPeucker(2);
        $simplified = $processor->simplify($polyline);

        $firstPoint = new \Location\Coordinate(20.6579781231, -103.422906054);
        $lastPoint = new \Location\Coordinate(20.6610790881, -103.421889792);

        $this->assertEquals($firstPoint, $simplified->getPoints()[0]);
        $this->assertEquals($lastPoint, $simplified->getPoints()[$simplified->getNumberOfPoints() - 1]);
    }
}
