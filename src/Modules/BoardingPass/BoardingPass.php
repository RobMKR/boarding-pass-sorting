<?php

namespace App\Modules\BoardingPass;

use App\Modules\BoardingPass\Types\IBoardingPassType;

class BoardingPass
{
    public function __construct(
        protected string $id,
        protected IBoardingPassType $type,
        protected string $source,
        protected string $destination,
        protected ?string $gate,
        protected ?string $seat
    )
    {

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): IBoardingPassType
    {
        return $this->type;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getGate(): ?string
    {
        return $this->gate;
    }

    public function getSeat(): ?string
    {
        return $this->seat;
    }

}