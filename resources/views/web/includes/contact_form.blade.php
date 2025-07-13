<form action="{{ route('contact.form.submit') }}" method="post">
    @csrf

    <div class="row">
        <h5>
            @lang('Please Send Your Comments Here:')
        </h5>
        <p>
            @lang('For any suggestion or query please send your comments to us.')
        </p>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <input required type="text" name="name" id="name" placeholder="@lang('Name')" class="form-control">
        </div>
        <div class="col-md-12 mb-4">
            <input required type="text" name="mobile" id="mobile" placeholder="@lang('Mobile Number')" class="form-control">
        </div>
        <div class="col-md-12 mb-4">
            <input required type="email" name="email" id="email" placeholder="@lang('Email')" class="form-control">
        </div>
        <div class="col-md-12 mb-4">
            <input required type="text" name="work_place" id="work_place" placeholder="@lang('Work Place')" class="form-control">
        </div>
        <div class="col-md-12 mb-4">
            <input required type="text" name="country" id="country" placeholder="@lang('Country')" class="form-control">
        </div>
        <div class="col-md-12 mb-4">
            <textarea required name="message" id="message" placeholder="@lang('Message')" class="form-control"></textarea>
        </div>
        <div class="col-12">
            <input class="btn primary-btn" type="submit" value="@lang('Send Message')">
        </div>
    </div>
</form>
