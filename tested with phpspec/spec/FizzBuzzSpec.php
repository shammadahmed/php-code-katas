<?php

namespace spec;

use FizzBuzz;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FizzBuzz::class);
    }

    public function it_translates_for_1_for_fizzbuzz()
    {
    	$this->execute(1)->shouldReturn(1);
    }

    public function it_translates_for_2_for_fizzbuzz()
    {
    	$this->execute(2)->shouldReturn(2);
    }

    public function it_translates_for_3_for_fizzbuzz()
    {
    	$this->execute(3)->shouldReturn('fizz');
    }

    public function it_translates_for_5_for_fizzbuzz()
    {
    	$this->execute(5)->shouldReturn('buzz');
    }

    public function it_translates_for_6_for_fizzbuzz()
    {
    	$this->execute(6)->shouldReturn('fizz');
    }

    public function it_translates_for_10_for_fizzbuzz()
    {
    	$this->execute(10)->shouldReturn('buzz');
    }

    public function it_translates_a_sequence_of_numbers_for_fizzbuzz()
    {
    	$this->executeUpTo(10)->shouldReturn([1, 2, 'fizz', 4, 'buzz', 'fizz', 7, 8, 'fizz', 'buzz']);
    }
}
