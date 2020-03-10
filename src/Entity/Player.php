<?php
namespace App\Entity;

class Player
{
    private const PLAY_PLAY_STATUS = 'play';
    private const BENCH_PLAY_STATUS = 'bench';

    private int $number;
    private string $name;
    private int $goals;
    private bool $yellowCard;
    private bool $redCard;
    private string $playStatus;
    private int $inMinute;
    private int $outMinute;

    public function __construct(int $number, string $name)
    {
        $this->number = $number;
        $this->name = $name;
        $this->playStatus = self::BENCH_PLAY_STATUS;
        $this->goals = 0;
        $this->redCard = false;
        $this->yellowCard = false;
        $this->inMinute = 0;
        $this->outMinute = 0;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGoal(): string
    {
        return $this->goals;
    }

    public function addYellowCard(): void
    {
        $this->yellowCard = true;
    }

    public function hasYellowCard(): bool
    {
        return $this->yellowCard;
    }

    public function addRedCard(): void
    {
        $this->redCard = true;
    }

    public function hasRedCard(): bool
    {
        return $this->redCard;
    }

    public function addGoal(): void
    {
        $this->goals++;
    }

    public function getInMinute(): int
    {
        return $this->inMinute;
    }

    public function getOutMinute(): int
    {
        return $this->outMinute;
    }

    public function isPlay(): bool
    {
        return $this->playStatus === self::PLAY_PLAY_STATUS;
    }

    public function getPlayTime(): int
    {
        if(!$this->outMinute) {
            return 0;
        }

        return $this->outMinute - $this->inMinute;
    }

    public function goToPlay(int $minute): void
    {
        $this->inMinute = $minute;
        $this->playStatus = self::PLAY_PLAY_STATUS;
    }

    public function goToBench(int $minute): void
    {
        $this->outMinute = $minute;
        $this->playStatus = self::BENCH_PLAY_STATUS;
    }
}