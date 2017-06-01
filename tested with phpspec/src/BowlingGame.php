<?php

class BowlingGame
{
	protected $rolls = [];

	public function roll($pins)
	{
		$this->guardAgainstInvalidRoll($pins);

		$this->rolls[] = $pins;
	}

	public function score()
	{
		$score = 0;
		$roll = 0;

		for ($frame = 1; $frame <= 10; $frame++)
		{
			if ($this->isStrike($roll))
			{
				$score += $this->getStrikeFrameScore($roll);
				$roll += 1;
			}
			elseif ($this->isSpare($roll))
			{
				$score += $this->getSpareFrameScore($roll);
				$roll += 2;
			}
			else
			{
				$score += $this->getDefaultFrameScore($roll);
				$roll += 2;
			}
		}

		return $score;
	}

	public function guardAgainstInvalidRoll($pins)
	{
		if ($pins < 0) throw new InvalidArgumentException;
	}

	public function isSpare($roll)
	{
		return $this->rolls[$roll] + $this->rolls[$roll +1] == 10;
	}

	public function isStrike($roll)
	{
		return $this->rolls[$roll] == 10;
	}

	public function getDefaultFrameScore($roll)
	{
		return $this->rolls[$roll] + $this->rolls[$roll + 1];
	}

	public function getSpareFrameScore($roll)
	{
		return 10 + $this->rolls[$roll + 2];
	}

	public function getStrikeFrameScore($roll)
	{
		return 10 + $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
	}
}
