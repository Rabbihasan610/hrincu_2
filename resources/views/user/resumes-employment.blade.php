@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span> Edit Resume</span>
            </div>
            <div class="resume-dashboard-body">
                @include('user.includes.edit-resume-tab')

                <div class="resume-edit-acc mt-5">
                    <div class="personal-info">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="EmploymentHistoryHandel">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#EmploymentHistory" aria-expanded="true" aria-controls="EmploymentHistory">
                                        Employment History
                                    </button>
                                </h2>
                                <div id="EmploymentHistory" class="accordion-collapse collapse show" aria-labelledby="EmploymentHistoryHandel" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="resume-info-view">
                                            @forelse ($employment_info as $item)
                                            <div class="py-3">
                                                <div class="resume-info-edit-btn d-flex justify-content-between">
                                                    <div>
                                                        <h6>Employment History {{$loop->iteration}}</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="{{route('user.employment.info.edit',$item->id)}}" class="bg-primary text-white mr-5">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{route('user.employment.info.delete',$item->id)}}" class="bg-danger text-white" onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>Company Name </b>
                                                        <p>{{$item->company_name}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Company Business</b>
                                                        <p>{{$item->company_business}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Designation </b>
                                                        <p>{{$item->designation}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Department </b>
                                                        <p>{{$item->department}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Employment Period </b>
                                                        <p>{{ Carbon\Carbon::parse($item->employment_period_start)->format('M Y') }}  To {{$item->currently_working == '1' ? 'Continue' :  Carbon\Carbon::parse($item->employment_period_end)->format('M Y') }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Responsibilities </b>
                                                        <p>{{$item->responsibilities}}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <b>Area of Expertise</b>
                                                        @if ($item->area_of_expertise_1)
                                                            <p>{{$item->area_of_expertise_1}} ({{$item->area_of_expertise_1_month}})</p>
                                                        @endif
                                                        @if ($item->area_of_expertise_2)
                                                            <p>{{$item->area_of_expertise_2}} ({{$item->area_of_expertise_2_month}})</p>
                                                        @endif
                                                        @if ($item->area_of_expertise_3)
                                                            <p>{{$item->area_of_expertise_4}} ({{$item->area_of_expertise_3_month}})</p>
                                                        @endif



                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Company Location</b>
                                                        <p>{{$item->company_location}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <h5 class="text-danger text-center py-5">No Data Found</h5>
                                            @endforelse
                                        </div>

                                        <div class="add-requir clearfix">
                                            <a href="javascript:void(0)" onclick="employ_add()"> <i class="fa fa-plus" aria-hidden="true"></i> Add Employement (If Required)</a>
                                        </div>

                                        <div class="resume-info-edit-form py-3" id="employ_add" style="display: none">
                                            <form action="{{route('user.employment.info.create')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Company Name <span>*</span></label>
                                                        <input type="text" name="company_name" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Company Business </label>
                                                        <input type="text" name="company_business">
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Designation <span>*</span></label>
                                                        <input type="text" name="designation" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Department </label>
                                                        <input type="text" name="department">

                                                    </div>
                                                    <div class="col-12 pb-4">

                                                        <label for="">Employment Period <span>*</span></label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="date" name="employment_period_start" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="date" name="employment_period_end">
                                                                <div class="d-flex">
                                                                    <input type="checkbox" class="checkbox" id="Working" name="currently_working" value="1">
                                                                    <label for="Working" class="ml-5">Currently Working</label>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                    <div class="col-12 pb-4">
                                                        <label for="">Responsibilities </label>
                                                        <textarea name="responsibilities" id="" cols="30" rows="10"></textarea>
                                                    </div>

                                                        <div class="col-12">
                                                        <label for="">Company Location</label>
                                                        <input type="text" name="company_location">
                                                    </div>


                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="save-data">Save</button>
                                                        <button class="cancel-data" onclick="employ_add()">Cancel</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        function employ_add(){
            $('#employ_add').toggle();
        }

    </script>
@endpush
