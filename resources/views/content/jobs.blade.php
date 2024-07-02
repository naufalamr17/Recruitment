@extends('layouts/contentNavbarLayout')

@section('title', 'Jobs')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center pb-1 mb-4">
    <h6 class="text-muted">Jobs at MLP Mining</h6>
    @auth
    @if (Auth::user()->role === 'admin')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable">
        Add Job
    </button>
    @endif
    @endauth
</div>

<div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Add Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <!-- form fields here -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Position</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="position" class="form-control" id="basic-icon-default-fullname" placeholder="Job Position" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Requirement</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-list-ul"></i></span>
                            <textarea id="basic-icon-default-message" name="requirement" class="form-control" placeholder="Job Requirement" aria-describedby="basic-icon-default-message2"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Start Recruitment</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                            <input type="date" name="start_recruitment" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">End Recruitment</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                            <input type="date" name="end_recruitment" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">People Needed</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="number" name="people_needed" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Number of people needed" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Contact</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="number" name="contact" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-light fw-medium d-block">Status</small>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="open" />
                            <label class="form-check-label badge bg-label-success" for="inlineRadio1">Open</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="hold" />
                            <label class="form-check-label badge bg-label-secondary" for="inlineRadio2">Hold</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="closed" />
                            <label class="form-check-label badge bg-label-danger" for="inlineRadio3">Closed</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row" data-masonry='{"percentPosition": true }'>
    @foreach($jobs as $job)
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <h5>{{ $job->position }}</h5>
                    @if($job->status == 'Open')
                    <div class="badge bg-success">{{ $job->status }}</div>
                    @elseif($job->status == 'Hold')
                    <div class="badge bg-secondary">{{ $job->status }}</div>
                    @elseif($job->status == 'Closed')
                    <div class="badge bg-danger">{{ $job->status }}</div>
                    @endif
                </div>
                <p class="card-text"><small class="text-muted">Periode Pendaftaran: {{ Carbon\Carbon::parse($job->start_recruitment)->format('d M Y') }} - {{ Carbon\Carbon::parse($job->end_recruitment)->format('d M Y') }} <br> Terbuka Untuk: {{ $job->people_needed }} Orang</small></p>
                <hr>
                <p class="card-text">
                    <strong>Requirement:</strong>
                    <small class="card-text d-block mb-2">
                        {!! nl2br(e($job->requirement)) !!}
                    </small>
                </p>
                <p class="mt-2">
                    <span class="me-2"><i class="bx bx-phone-call"></i></span>{{ $job->contact }}
                </p>
                @auth
                @if (Auth::user()->role === 'admin')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable2">
                    Edit
                </button>
                <div class="modal fade" id="modalScrollable2" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalScrollableTitle">Edit Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Position</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Job Position" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-message">Requirement</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-list-ul"></i></span>
                                            <textarea id="basic-icon-default-message" class="form-control" placeholder="Job Requirement" aria-describedby="basic-icon-default-message2"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-phone">Start Recruitment</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                            <input type="date" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-phone">End Recruitment</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                            <input type="date" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-phone">People Needed</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Number of people needed" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-phone">Contact</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                            <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone Number" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <small class="text-light fw-medium d-block">Status</small>
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
                                            <label class="form-check-label badge bg-label-success" for="inlineRadio1">Open</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                                            <label class="form-check-label badge bg-label-secondary" for="inlineRadio2">Hold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
                                            <label class="form-check-label badge bg-label-danger" for="inlineRadio3">Closed</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <a href="javascript:void(0)" class="btn btn-primary">Apply</a>
                @endif
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection