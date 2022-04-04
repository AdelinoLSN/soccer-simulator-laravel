@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <div class="flex flex-col">
        <span class="text-lg font-bold">Match #{{ $match->id }}</span>
        <div class="flex flex-row">
            <span>[{{ $match->left_team->overall }}{{ !$match->is_neutral ? '+5' : '' }}]</span>&nbsp;
            <span>{{ $match->left_team->name }}</span>&nbsp;
            <span>({{ $match->left_team->acronym }})</span>&nbsp;
            <span>{{ $match->left_team_score }}</span>x<span>{{ $match->right_team_score }}</span>&nbsp;
            <span>({{ $match->right_team->acronym }})</span>&nbsp;
            <span>{{ $match->right_team->name }}</span>&nbsp;
            <span>[{{ $match->right_team->overall }}]</span>
        </div>
    </div>

    <hr>

    <div class="flex flex-col">
        <span class="text-lg font-bold">Statistics</span>
        @foreach (array_keys($statistics) as $statistic)
            <div>{{ $statistic }}</div>
            <div class="flex flex-row">
                @foreach (array_keys($statistics[$statistic]) as $team)
                    {{ $team }} - {{ $statistics[$statistic][$team] }}%
                @endforeach
            </div>
        @endforeach
    </div>

    <hr>

    <div class="flex flex-col">
        @foreach (array_keys($real_time) as $time)
            <span>{{ $time }} - {{ $real_time[$time] }}</span>
        @endforeach
    </div>
</div>