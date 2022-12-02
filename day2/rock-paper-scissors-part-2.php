<?php

declare(strict_types=1);

const OPPONENT_MOVE = 0;
const STRATEGY = 2;
const OPPONENT_ROCK = "A";
const OPPONENT_PAPER = "B";
const OPPONENT_SCISSORS = "C";

const ROCK_CHOSEN_POINTS = 1;
const PAPER_CHOSEN_POINTS = 2;
const SCISSORS_CHOSEN_POINTS = 3;

const LOSE = "X";
const DRAW = "Y";
const WIN = "Z";

const WIN_POINTS = 6;
const DRAW_POINTS = 3;

interface MoveStrategyInterface
{
    public function getScoreByStrategy(string $opponentMove): int;
}

class LoseStrategy implements MoveStrategyInterface
{
    public function getScoreByStrategy(string $opponentMove): int
    {
        if ($opponentMove === OPPONENT_ROCK) {
            return SCISSORS_CHOSEN_POINTS;
        }

        if ($opponentMove === OPPONENT_PAPER) {
            return ROCK_CHOSEN_POINTS;
        }

        if ($opponentMove === OPPONENT_SCISSORS) {
            return PAPER_CHOSEN_POINTS;
        }
    }
}

class DrawStrategy implements MoveStrategyInterface
{
    public function getScoreByStrategy(string $opponentMove): int
    {
        if ($opponentMove === OPPONENT_ROCK) {
            return ROCK_CHOSEN_POINTS + DRAW_POINTS;
        }

        if ($opponentMove === OPPONENT_PAPER) {
            return PAPER_CHOSEN_POINTS + DRAW_POINTS;
        }

        if ($opponentMove === OPPONENT_SCISSORS) {
            return SCISSORS_CHOSEN_POINTS + DRAW_POINTS;
        }
    }
}

class WinStrategy implements MoveStrategyInterface
{
    public function getScoreByStrategy(string $opponentMove): int
    {
        if ($opponentMove === OPPONENT_ROCK) {
            return PAPER_CHOSEN_POINTS + WIN_POINTS;
        }

        if ($opponentMove === OPPONENT_PAPER) {
            return SCISSORS_CHOSEN_POINTS + WIN_POINTS;
        }

        if ($opponentMove === OPPONENT_SCISSORS) {
            return ROCK_CHOSEN_POINTS + WIN_POINTS;
        }
    }
}

class ScoreCalculator
{
    public function getScore(string $opponentMove, string $strategy): int
    {
        if ($strategy === LOSE) {
            return (new LoseStrategy())->getScoreByStrategy($opponentMove);
        }

        if ($strategy === DRAW) {
            return (new DrawStrategy())->getScoreByStrategy($opponentMove);
        }

        if ($strategy === WIN) {
            return (new WinStrategy())->getScoreByStrategy($opponentMove);
        }
    }
}

$scoreCalculator = new ScoreCalculator();
$input = file('input.txt');
$score = 0;

foreach ($input as $row) {
    $score += $scoreCalculator->getScore($row[OPPONENT_MOVE], $row[STRATEGY]);
}

var_dump($score);
