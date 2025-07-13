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
                                <h2 class="accordion-header" id="AcademicSummaryHandel">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#AcademicSummary" aria-expanded="true" aria-controls="AcademicSummary">
                                        @lang('Academic Summary')
                                    </button>
                                </h2>
                                <div id="AcademicSummary" class="accordion-collapse collapse show" aria-labelledby="AcademicSummaryHandel" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="resume-info-view">
                                            @forelse ($academic_info as  $item)
                                            <div class="py-3">
                                                <div class="resume-info-edit-btn d-flex justify-content-between py-3">
                                                    <div>
                                                        <h6>Academic {{$loop->iteration}}</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="{{route('user.academic.info.edit',$item->id)}}" class="bg-primary text-white mr-5">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{route('user.academic.info.delete',$item->id)}}" class="bg-danger text-white" onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>Level of Education </b>
                                                        <p>{{$item->educationLavels ? $item->educationLavels->name : ''}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Exam/Degree Title</b>
                                                        <p>{{$item->degree ? $item->degree->name : ''}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Concentration/ Major/Group </b>
                                                        <p>{{$item->group}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Institute Name </b>
                                                        <p>{{$item->institute_name}} @if ($item->foreign_institute == 1)
                                                            <span class="d-flex">(Foreign Institute)</span>
                                                        @endif</p>


                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Result </b>
                                                        <p>{{$item->result ? $item->result->name : ''}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>GPA/CGPA </b>
                                                        <p>
                                                            {{$item->gpa}}
                                                            @if($item->gpa)
                                                            (out of {{$item->out_of}})
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <b>Year of Passing </b>
                                                        <p>{{$item->year_of_passing}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Duration (Years)</b>

                                                        <p>{{ Carbon\Carbon::parse($item->duration_start)->format('M Y') }} To {{ Carbon\Carbon::parse($item->duration_end)->format('M Y') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <h5 class="text-danger text-center py-5">No Data Found!</h5>
                                            @endforelse

                                        <div class="add-requir clearfix">
                                            <a href="javascript:void(0)" onclick="academic_add()"> <i class="fa fa-plus" aria-hidden="true"></i> Add Education (If Required)</a>
                                        </div>

                                        <div class="resume-info-edit-form py-3" id="academic_add" style="display: none;">
                                            <form action="{{route('user.academic.info.create')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Level of Education <span>*</span></label>
                                                        <select name="education_lavels_id">
                                                            <option value="">Select Level</option>
                                                            @foreach ($education_lavel as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Exam/Degree Title <span>*</span></label>
                                                        <select name="degrees_id">
                                                            <option value="">Select</option>
                                                            @foreach ($degree as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Concentration/ Major/Group</label>
                                                        <input type="text" name="group">
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Institute Name <span>*</span></label>
                                                        <input type="text" name="institute_name">
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Result <span>*</span></label>

                                                        <select name="result_id">
                                                            <option value="">Select Result</option>
                                                            @foreach ($result as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                            </select>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">GPA/CGPA</label>
                                                        <input type="text" name="gpa">
                                                    <div class="d-flex">
                                                        <div class="d-flex mr-15">
                                                            <input type="radio" class="checkbox" id="Four" value="4" name="out_of">
                                                            <label for="Four" class="ml-5">out of four (4)</label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input type="radio" class="checkbox" id="five" value="5" name="out_of">
                                                            <label for="five" class="ml-5">out of five (5)</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Year Of Passing</label>
                                                        <input type="text" name="year_of_passing">
                                                    </div>

                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Duration</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="date" name="duration_start">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="date" name="duration_end">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="save-data">Save</button>
                                                        <button onclick="academic_add()" class="cancel-data">Cancel</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="TrainingSummaryHandel">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#TrainingSummary" aria-expanded="false" aria-controls="TrainingSummary">
                                        Training Summary
                                    </button>
                                </h2>
                                <div id="TrainingSummary" class="accordion-collapse collapse" aria-labelledby="TrainingSummaryHandel" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="resume-info-view">
                                            @forelse ($traning_info as $item)
                                            <div class="py-3">
                                                <div class="resume-info-edit-btn d-flex justify-content-between">
                                                    <div>
                                                        <h6>Traning {{$loop->iteration}}</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="{{route('user.traning.info.edit',$item->id)}}" class="bg-primary text-white mr-5">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{route('user.traning.info.delete',$item->id)}}" class="bg-danger text-white" onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>Training Title  </b>
                                                        <p>{{$item->training_title}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Country </b>
                                                        <p>{{$item->country}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Topics Covered</b>
                                                        <p>{{$item->topics_covered}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Training Year </b>
                                                        <p>{{ Carbon\Carbon::parse($item->training_year)->format('M Y') }} </p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Institute</b>
                                                        <p>{{$item->institute}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Duration </b>
                                                        <p>{{$item->duration}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Location</b>
                                                        <p>{{$item->Location}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <h5 class="text-danger text-center py-5">No data Found</h5>
                                            @endforelse
                                        </div>
                                        <div class="add-requir clearfix">
                                            <a href="javascript:void(0)" onclick="traning_add()"> <i class="fa fa-plus" aria-hidden="true"></i> Add Training (If Required)</a>
                                        </div>

                                        <div class="resume-info-edit-form" id="traning_add" style="display: none">
                                            <form action="{{route('user.traning.info.create')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Training Title <span>*</span></label>
                                                        <input type="text" name="training_title" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Country <span>*</span></label>
                                                        <input type="text" name="country" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Topics Covered</label>
                                                        <input type="text" name="topics_covered">
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Training Year  <span>*</span></label>
                                                        <input type="date" name="training_year" required>
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Institute <span>*</span></label>
                                                        <input type="text" name="institute" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Duration <span>*</span></label>
                                                        <input type="text" name="duration">
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Location</label>
                                                        <input type="text" name="Location">
                                                    </div>

                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="save-data">Save</button>
                                                        <button  onclick="traning_add()" class="cancel-data">Cancel</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="ProfessionalCertificationHandel">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ProfessionalCertification" aria-expanded="false" aria-controls="ProfessionalCertification">
                                        Professional Certification Summary
                                    </button>
                                </h2>
                                <div id="ProfessionalCertification" class="accordion-collapse collapse" aria-labelledby="ProfessionalCertificationHandel" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">


                                            <div class="resume-info-view">

                                            @forelse ($certificate_info as $item)
                                            <div class="py-3">
                                                <div class="resume-info-edit-btn d-flex justify-content-between">
                                                    <div>
                                                        <h6>Professional Certification {{$loop->iteration}}</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="{{route('user.certificate.info.edit',$item->id)}}" class="bg-primary text-white mr-5">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{route('user.certificate.info.delete',$item->id)}}" class="bg-danger text-white" onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>Certification  </b>
                                                        <p>{{$item->certification}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Institute  </b>
                                                        <p>{{$item->institute}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Location</b>
                                                        <p>{{$item->Location}}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>Duration </b>
                                                        <p>{{$item->duration_start}} to {{$item->duration_end}}</p>
                                                    </div>


                                                </div>
                                            </div>
                                            @empty
                                            <h5 class="text-danger text-center py-5">Data is Empty</h5>
                                            @endforelse
                                        </div>
                                        <div class="add-requir clearfix">
                                            <a href="javascript:void(0)" onclick="certificate_add()"> <i class="fa fa-plus" aria-hidden="true"></i> Add Professional Certification (If Required)</a>
                                        </div>

                                        <div class="resume-info-edit-form" id="certificate_add" style="display: none">
                                            <form action="{{route('user.certificate.info.create')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Certification  <span>*</span></label>
                                                        <input type="text" name="certification" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Institute  <span>*</span></label>
                                                        <input type="text" name="institute" required>
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Location</label>
                                                        <input type="text" name="Location">
                                                    </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                        <label for="">Duration  <span>*</span></label>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <input type="date" name="duration_start" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <input type="date" name="duration_end" required>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="save-data">Save</button>
                                                        <button class="cancel-data">Cancel</button>
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
        function academic_add(){
            $('#academic_add').toggle();
        }
        function traning_add(){
            $('#traning_add').toggle();
        }
        function certificate_add(){
            $('#certificate_add').toggle();
        }
    </script>
@endpush
