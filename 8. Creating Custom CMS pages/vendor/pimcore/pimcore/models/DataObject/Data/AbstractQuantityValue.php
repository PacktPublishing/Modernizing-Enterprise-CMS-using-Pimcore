<?php

namespace Pimcore\Model\DataObject\Data;

use Pimcore\Model\DataObject\OwnerAwareFieldInterface;
use Pimcore\Model\DataObject\QuantityValue\Unit;
use Pimcore\Model\DataObject\Traits\OwnerAwareFieldTrait;

abstract class AbstractQuantityValue implements OwnerAwareFieldInterface
{
    use OwnerAwareFieldTrait;

    /**
     * @var string|null
     */
    protected $unitId;

    /**
     * @var Unit|null
     */
    protected $unit;

    /**
     * @param Unit|string|null $unit
     */
    public function __construct($unit = null)
    {
        if ($unit instanceof Unit) {
            $this->unit = $unit;
            $this->unitId = $unit->getId();
        } elseif ($unit) {
            $this->unitId = $unit;
        }
        $this->markMeDirty();
    }

    /**
     * @param string $unitId
     */
    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
        $this->unit = null;
        $this->markMeDirty();
    }

    /**
     * @return string|null
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @return Unit|null
     */
    public function getUnit()
    {
        if (empty($this->unit)) {
            $this->unit = Unit::getById($this->unitId);
        }

        return $this->unit;
    }

    abstract public function getValue();

    abstract public function __toString();
}
