<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.default')

    <body>
    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Job ID</th>
            <th>Candidate ID</th>
            <th>Job Title</th>
            <th>Company Name</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
    </thead>
    <tbody>
    <a href="/load" class="btn btn-primary">Load database tables</a>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->surname}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->job_id}}</td>
            <td>{{$item->candidate_id}}</td>
            <td>{{$item->job_title}}</td>
            <td>{{$item->company_name}}</td>
            <td>{{$item->start}}</td>
            <td>{{$item->end}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
    </body>
</html>
