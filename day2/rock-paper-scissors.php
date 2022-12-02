<?php

declare(strict_types=1);

$input = file('input.txt');

$score = 0;

const OPPONENT = 0;
const ME = 2;
const OPPONENT_ROCK = "A";
const OPPONENT_PAPER = "B";
const OPPONENT_SCISSORS = "C";

const ME_ROCK = "X";
const ME_PAPER = "Y";
const ME_SCISSORS = "Z";

foreach ($input as $moves) {
    $score += getWinnerScore($moves[OPPONENT], $moves[ME]);
    $score += getScoreByMoveShape($moves[ME]);
}

var_dump($score);

function getWinnerScore(string $opponentMove, string $myMove): int
{
    if (
        $opponentMove === OPPONENT_ROCK && $myMove === ME_ROCK ||
        $opponentMove === OPPONENT_PAPER && $myMove === ME_PAPER ||
        $opponentMove === OPPONENT_SCISSORS && $myMove === ME_SCISSORS
    ) {
        return 3;
    }

    if (
        $opponentMove == OPPONENT_ROCK && $myMove === ME_SCISSORS ||
        $opponentMove == OPPONENT_PAPER && $myMove === ME_ROCK ||
        $opponentMove == OPPONENT_SCISSORS && $myMove === ME_PAPER
    ) {
        return 0;
    }

    if (
        $opponentMove == OPPONENT_ROCK && $myMove === ME_PAPER ||
        $opponentMove == OPPONENT_PAPER && $myMove === ME_SCISSORS ||
        $opponentMove == OPPONENT_SCISSORS && $myMove === ME_ROCK
    ) {
        return 6;
    }

    throw new \Exception('Invalid move');
}

function getScoreByMoveShape(string $shape): int
{
    if ($shape === ME_ROCK) {
        return 1;
    }

    if ($shape === ME_PAPER) {
        return 2;
    }

    if ($shape === ME_SCISSORS) {
        return 3;
    }

    throw new \Exception('Invalid shape');
}
