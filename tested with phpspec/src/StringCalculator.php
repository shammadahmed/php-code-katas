<?php

class StringCalculator
{
	const MAX_NUMBER_ALLOWED = 1000;

	public function add(string $numbers) : int
	{
		$numbers = $this->parseNumbers($numbers);

		$solution = 0;

		return array_sum(array_map(function ($number)
		{
			$this->guardAgainstInvalidNumbers($number);
			if ($number >= self::MAX_NUMBER_ALLOWED) {
				return 0;
			}

			return $number;
		}, $numbers));
	
		foreach ($numbers as $number) {
			$this->guardAgainstInvalidNumbers($number);
			if ($number >= self::MAX_NUMBER_ALLOWED) continue;
			
			$solution += $number;
		}

		return $solution;
	}

	public function parseNumbers($numbers)
	{
		return preg_split('/\s*(,|\\\n)\s*/', $numbers);
	}

	public function guardAgainstInvalidNumbers($number)
	{
		if ($number < 0) throw new InvalidArgumentException('Invalid number provided: ' . $number);
	}
}
