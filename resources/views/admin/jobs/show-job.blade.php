@extends('admin.layouts.app', ['title' => 'Jobs'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Job details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:20%">Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>{{@$data->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$data->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $data->description !!}</td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <td>{{$data->deadline}}</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{ \App\Constants\JobInfo::qualification()[$data->qualification] }}</td>
                        </tr>
                        <tr>
                            <th>Job Type</th>
                            <td>{{ \App\Constants\JobInfo::jobtype()[$data->jobtype] }}</td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>{{ \App\Constants\JobInfo::salarytype()[$data->salarytype] }}</td>
                        </tr>
                        <tr>
                            <th>Salary Currency</th>
                            <td>{{ \App\Constants\JobInfo::salarycurrency()[$data->salarycurrency] }}</td>
                        </tr>
                        <tr>
                            <th>Salary Range</th>
                            <td>{{ \App\Constants\JobInfo::salaryrange()[$data->salaryrange] }}</td>
                        </tr>
                        <tr>
                            <th>Experience</th>
                            <td>{{ \App\Constants\JobInfo::experience()[$data->experience] }}</td>
                        </tr>

                        <tr>
                            <th>Level</th>
                            <td>{{ \App\Constants\JobInfo::levels()[$data->level] }}</td>
                        </tr>
                        <tr>
                            <th>Vacancies</th>
                            <td>{{$data->vacancies}}</td>
                        </tr>
                        {{-- <tr>
                            <th>Skill</th>
                            <td>{{$data->skill}}</td>
                        </tr>
                        <tr>
                            <th>Attachment</th>
                            <td>{{$data->attachment}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$data->country->name}}</td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>{{$data->district->name}}</td>
                        </tr> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
