@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Others Information')</span>
                </div>
                <div class="resume-dashboard-body">

                    @include('user.includes.edit-resume-tab')

                    <div class="resume-edit-acc mt-5">
                        <div class="personal-info">
                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="SpecializationHandel">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#Specialization" aria-expanded="true"
                                            aria-controls="Specialization">
                                            @lang('Specialization')
                                        </button>
                                    </h2>
                                    <div id="Specialization" class="accordion-collapse collapse show"
                                        aria-labelledby="AcademicSummaSpecializationHandelryHandel"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                @foreach ($specialization_info as $item)
                                                    <div class="py-3">
                                                        <div class="resume-info-edit-btn d-flex justify-content-between">
                                                            <div>
                                                                <h6>@lang('Skill') - {{ $loop->iteration }}</h6>
                                                            </div>
                                                            <div class="d-flex">
                                                                <a href="{{ route('user.specialization.info.edit', $item->id) }}"
                                                                    class="bg-primary text-white mr-5">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                    @lang('Edit')
                                                                </a>
                                                                <a href="{{ route('user.specialization.info.delete', $item->id) }}"
                                                                    class="bg-danger text-white"
                                                                    onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    @lang('Delete')
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <b>@lang('Skill') </b>
                                                                <p><span class="hilight">{{ $item->skill }}</span></p>
                                                            </div>
                                                            <div class="col-12">
                                                                <b>@lang('Skill') learned by</b>
                                                                <p>
                                                                    @if ($item->self == 1)
                                                                        @lang('Self'),
                                                                    @endif
                                                                    @if ($item->job == 1)
                                                                        @lang('Job'),
                                                                    @endif
                                                                    @if ($item->professional_training == 1)
                                                                        @lang('Professional Training'),
                                                                    @endif
                                                                    @if ($item->educational == 1)
                                                                        @lang('Educational'),
                                                                    @endif
                                                                    @if ($item->ntvqf == 1)
                                                                        @lang('NTVQF')
                                                                    @endif

                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <div class="add-requir clearfix">
                                                <a href="javascript:void(0)" onclick="skill_add()"> <i class="fa fa-plus"
                                                        aria-hidden="true"></i> @lang('Add Education (If Required)')</a>
                                            </div>
                                            <div class="resume-info-edit-form" id="skill_add" style="display: none">
                                                <form action="{{ route('user.specialization.info.create') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 pb-4">
                                                            <label for="">@lang('Skill') <span>*</span></label>
                                                            <input type="text" name="skill">
                                                        </div>
                                                        <div class="col-12 pb-4">
                                                            <label for="">@lang('How did you learn the skill?') <span>*</span></label>
                                                            <div class="d-flex">
                                                                <div class="d-flex mr-15">
                                                                    <input type="checkbox" class="checkbox" id="Self"
                                                                        value="1" name="self">
                                                                    <label for="Self" class="ml-5">@lang('Self')
                                                                    </label>
                                                                </div>
                                                                <div class="d-flex  mr-15">
                                                                    <input type="checkbox" class="checkbox" id="Job"
                                                                        value="1" name="job">
                                                                    <label for="Job" class="ml-5">@lang('Job')
                                                                    </label>
                                                                </div>
                                                                <div class="d-flex mr-15">
                                                                    <input type="checkbox" class="checkbox" id="Educational"
                                                                        value="1" name="educational">
                                                                    <label for="Educational"
                                                                        class="ml-5">@lang('Educational') </label>
                                                                </div>
                                                                <div class="d-flex mr-15">
                                                                    <input type="checkbox" class="checkbox" id="Training"
                                                                        value="1" name="professional_training">
                                                                    <label for="Training" class="ml-5">@lang('Professional Training')
                                                                    </label>
                                                                </div>
                                                                <div class="d-flex mr-15">
                                                                    <input type="checkbox" class="checkbox" id="NTVQF"
                                                                        value="1" name="ntvqf">
                                                                    <label for="NTVQF" class="ml-5">@lang('NTVQF')
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 mt-4">
                                                            <button type="submit"
                                                                class="save-data">@lang('Save')</button>
                                                            <button class="cancel-data"
                                                                onclick="skill_add()">@lang('Cancel')</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="LanguageProficiencyHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#LanguageProficiency"
                                            aria-expanded="false" aria-controls="LanguageProficiency">
                                            @lang('Language Proficiency')
                                        </button>
                                    </h2>
                                    <div id="LanguageProficiency" class="accordion-collapse collapse"
                                        aria-labelledby="LanguageProficiencyHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="resume-info-view">
                                                @forelse ($language_info as $item)
                                                    <div class="py-3">
                                                        <div class="resume-info-edit-btn d-flex justify-content-between">
                                                            <div>
                                                                <h6>@lang('Language') {{ $loop->iteration }}</h6>
                                                            </div>
                                                            <div class="d-flex">
                                                                <a href="{{ route('user.language.info.edit', $item->id) }}"
                                                                    class="bg-primary text-white mr-5">
                                                                    <i class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i>
                                                                    @lang('Edit')
                                                                </a>
                                                                <a href="{{ route('user.language.info.delete', $item->id) }}"
                                                                    class="bg-danger text-white"
                                                                    onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    @lang('Delete')
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Language') </b>
                                                                <p>{{ $item->language }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Reading')</b>
                                                                <p>{{ $item->reading }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Writing')</b>
                                                                <p>{{ $item->writing }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Speaking')</b>
                                                                <p>{{ $item->speaking }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                    <h5 class="text-danger text-center py-5">Data is Empty</h5>
                                                @endforelse
                                            </div>
                                            <div class="add-requir clearfix">
                                                <a href="javascript:void(0)" onclick="language_add()"> <i
                                                        class="fa fa-plus" aria-hidden="true"></i> @lang('Add Language')</a>
                                            </div>
                                            <div class="resume-info-edit-form" id="language_add" style="display: none">
                                                <form action="{{ route('user.language.info.create') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Language') <span>*</span></label>
                                                            <input type="text" name="Language" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Reading') <span>*</span></label>
                                                            <select name="reading">
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="High">@lang('High')</option>
                                                                <option value="Medium">@lang('Medium')</option>
                                                                <option value="Low">@lang('Low')</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Writing') <span>*</span></label>
                                                            <select name="writing" required>
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="High">@lang('High')</option>
                                                                <option value="Medium">@lang('Medium')</option>
                                                                <option value="Low">@lang('Low')</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Speaking') <span>*</span></label>
                                                            <select name="speaking" required>
                                                                <option value="">@lang('Select One')</option>
                                                                <option value="High">@lang('High')</option>
                                                                <option value="Medium">@lang('Medium')</option>
                                                                <option value="Low">@lang('Low')</option>
                                                            </select>
                                                        </div>



                                                        <div class="col-12 mt-4">
                                                            <button type="submit"
                                                                class="save-data">@lang('Save')</button>
                                                            <button class="cancel-data"
                                                                onclick="language_add()">@lang('Cancel')</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="ReferencesHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#References" aria-expanded="false"
                                            aria-controls="References">
                                            @lang('References')
                                        </button>
                                    </h2>
                                    <div id="References" class="accordion-collapse collapse"
                                        aria-labelledby="ReferencesHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                @forelse ($reference_info as $item)
                                                    <div class="py-3">
                                                        <div class="resume-info-edit-btn d-flex justify-content-between">
                                                            <div>
                                                                <h6>@lang('Reference') {{ $loop->iteration }}</h6>
                                                            </div>
                                                            <div class="d-flex">
                                                                <a href="{{ route('user.reference.info.edit', $item->id) }}"
                                                                    class="bg-primary text-white mr-5">
                                                                    <i class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i>
                                                                    @lang('Edit')
                                                                </a>
                                                                <a href="{{ route('user.reference.info.delete', $item->id) }}"
                                                                    class="bg-danger text-white"
                                                                    onclick="return confirm('Are you sure, Want to Delete this Item!')">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    @lang('Delete')
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Name') </b>
                                                                <p>{{ $item->name }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Designation')</b>
                                                                <p>{{ $item->designation }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Organization')</b>
                                                                <p>{{ $item->organization }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Email') </b>
                                                                <p>{{ $item->email }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Relation') </b>
                                                                <p>{{ $item->relation }}</p>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Mobile') </b>
                                                                <p>{{ $item->mobile }}</p>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <b>@lang('Address')</b>
                                                                <p>{{ $item->address }}</p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                    <h5 class="text-danger text-center py-5">@lang('Data is Empty')</h5>
                                                @endforelse
                                            </div>
                                            <div class="add-requir clearfix">
                                                <a href="javascript:void(0)" onclick="reference_add()"> <i
                                                        class="fa fa-plus" aria-hidden="true"></i> @lang('Add Reference')</a>
                                            </div>
                                            <div class="resume-info-edit-form" id="reference_add" style="display: none">
                                                <form action="{{ route('user.reference.info.create') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Name') <span>*</span></label>
                                                            <input type="text" name="name" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Designation') <span>*</span></label>
                                                            <input type="text" name="designation" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Organization') <span>*</span></label>
                                                            <input type="text" name="organization" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Email')</label>
                                                            <input type="text" name="email">
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Relation') </label>
                                                            <select name="relation">
                                                                <option value="Relative">@lang('Relative')</option>
                                                                <option value="Family Friend">@lang('Family Friend')</option>
                                                                <option value="Academic">@lang('Academic')</option>
                                                                <option value="Professional">@lang('Professional')</option>
                                                                <option value="Others">@lang('Others')</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 pb-4">
                                                            <label for="">@lang('Mobile') </label>
                                                            <input type="text" name="mobile">
                                                        </div>
                                                        <div class="col-12 pb-4">
                                                            <label for="">@lang('Address') </label>
                                                            <textarea name="address" id="" cols="30" rows="10"></textarea>
                                                        </div>

                                                        <div class="col-12 mt-4">
                                                            <button type="submit"
                                                                class="save-data">@lang('Save')</button>
                                                            <button class="cancel-data">@lang('Cancel')</button>
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
    </div>
@endsection

@push('script')
    <script>
        function skill_add() {
            $('#skill_add').toggle();
        }

        function language_add() {
            $('#language_add').toggle();
        }

        function reference_add() {
            $('#reference_add').toggle();
        }
    </script>
@endpush
