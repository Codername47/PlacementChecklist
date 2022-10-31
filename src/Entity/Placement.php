<?php

namespace Dread\Htdocs\Entity;

use Dread\Htdocs\Core\Request;

class Placement
{
    private bool $isPlacement;
    private ?string $value;
    private ?string $currentField;
    private ?int $dealId;
    private string $mode;
    public function __construct(Request $request)
    {
        $placement = $request->get('PLACEMENT');
        $placementOptions = !is_null($request->get('PLACEMENT_OPTIONS')) ? json_decode($request->get('PLACEMENT_OPTIONS'), true) : array();
        $placementOptions['VALUE'] = str_replace("\\\"", "", $placementOptions['VALUE']);
        if(!is_array($placementOptions))
            $placementOptions = array();
        if ($placement !== 'USERFIELD_TYPE')
        {
            $this->isPlacement = false;
            $this->value = null;
            $this->dealId = null;
            $this->currentField = null;
            $this->mode = "index";
            return;
        }

        $this->isPlacement = true;
        $this->value = $placementOptions['VALUE'];
        $this->dealId = $placementOptions['ENTITY_VALUE_ID'];
        $this->currentField = $placementOptions['FIELD_NAME'];
        $this->mode = $placementOptions['MODE'];
    }

    /**
     * @return mixed|string
     */
    public function getCurrentField()
    {
        return $this->currentField;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int|mixed
     */
    public function getDealId()
    {
        return $this->dealId;
    }

    /**
     * @return bool
     */
    public function isPlacement(): bool
    {
        return $this->isPlacement;
    }
}