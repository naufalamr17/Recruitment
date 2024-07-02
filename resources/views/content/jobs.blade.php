@extends('layouts/contentNavbarLayout')

@section('title', 'Jobs')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center pb-1 mb-4">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Filter by Status
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item filter-job" href="#" data-status="all">All</a></li>
        <li><a class="dropdown-item filter-job" href="#" data-status="open">Open</a></li>
        <li><a class="dropdown-item filter-job" href="#" data-status="hold">Hold</a></li>
        <li><a class="dropdown-item filter-job" href="#" data-status="closed">Closed</a></li>
    </ul>
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
    <div class="col-sm-6 col-lg-4 mb-4 job-item" data-status="{{ strtolower($job->status) }}">
        <div class=" card">
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
                <p class="card-text"><small class="text-muted">Periode Pendaftaran: {{ Carbon\Carbon::parse($job->start_recruitment)->format('d M Y') }} - {{ Carbon\Carbon::parse($job->end_recruitment)->format('d M Y') }} <br> Terbuka Untuk: {{ $job->people_needed }} Orang <br> Kontak: {{ $job->contact }}</small></p>
                <hr>
                <p class="card-text">
                    <strong>Requirement:</strong>
                    <small class="card-text d-block">
                        <?php
                        $requirements = explode("\n", $job->requirement); // Pisahkan teks berdasarkan baris
                        echo "<ul>"; // Mulai daftar ul
                        foreach ($requirements as $requirement) {
                            $requirement = trim($requirement); // Hapus spasi ekstra
                            if (!empty($requirement)) {
                                echo "<li>$requirement</li>"; // Tambahkan setiap item sebagai daftar li
                            }
                        }
                        echo "</ul>"; // Tutup daftar ul
                        ?>
                    </small>
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
                                <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label" for="position-{{ $job->id }}">Position</label>
                                        <div class="input-group input-group-merge">
                                            <span id="position-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                            <input type="text" name="position" class="form-control" id="position-{{ $job->id }}" value="{{ $job->position }}" placeholder="Job Position" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="requirement-{{ $job->id }}">Requirement</label>
                                        <div class="input-group input-group-merge">
                                            <span id="requirement-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-list-ul"></i></span>
                                            <textarea name="requirement" id="requirement-{{ $job->id }}" class="form-control" placeholder="Job Requirement">{{ $job->requirement }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="start_recruitment-{{ $job->id }}">Start Recruitment</label>
                                        <div class="input-group input-group-merge">
                                            <span id="start-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                            <input type="date" name="start_recruitment" id="start_recruitment-{{ $job->id }}" class="form-control" value="{{ $job->start_recruitment }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="end_recruitment-{{ $job->id }}">End Recruitment</label>
                                        <div class="input-group input-group-merge">
                                            <span id="end-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                            <input type="date" name="end_recruitment" id="end_recruitment-{{ $job->id }}" class="form-control" value="{{ $job->end_recruitment }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="people_needed-{{ $job->id }}">People Needed</label>
                                        <div class="input-group input-group-merge">
                                            <span id="people-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="number" name="people_needed" id="people_needed-{{ $job->id }}" class="form-control" value="{{ $job->people_needed }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="contact-{{ $job->id }}">Contact</label>
                                        <div class="input-group input-group-merge">
                                            <span id="contact-icon-{{ $job->id }}" class="input-group-text"><i class="bx bx-phone"></i></span>
                                            <input type="text" name="contact" id="contact-{{ $job->id }}" class="form-control" value="{{ $job->contact }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <small class="text-light fw-medium d-block">Status</small>
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="status" id="status-open-{{ $job->id }}" value="open" {{ $job->status === 'Open' ? 'checked' : '' }} />
                                            <label class="form-check-label badge bg-label-success" for="status-open-{{ $job->id }}">Open</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status-hold-{{ $job->id }}" value="hold" {{ $job->status === 'Hold' ? 'checked' : '' }} />
                                            <label class="form-check-label badge bg-label-secondary" for="status-hold-{{ $job->id }}">Hold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status-closed-{{ $job->id }}" value="closed" {{ $job->status === 'Closed' ? 'checked' : '' }} />
                                            <label class="form-check-label badge bg-label-danger" for="status-closed-{{ $job->id }}">Closed</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Script to filter jobs based on status
        $('.filter-job').click(function(e) {
            e.preventDefault();
            var status = $(this).data('status');

            // Show all jobs
            $('.job-item').show();

            // Filter jobs by status
            if (status !== 'all') {
                $('.job-item').not('[data-status="' + status + '"]').hide();
            }
        });
    });
</script>
@endsection