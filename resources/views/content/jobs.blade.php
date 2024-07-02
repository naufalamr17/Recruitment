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
                <form>
                    <div class="card-body">
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
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <div class="card-header">
                Jobs
            </div>
            <div class="card-body">
                <h5 class="card-title">Job Position</h5>
                <p class="card-text">
                    Details about job position.
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
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card p-3">
            <figure class="p-3 mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card bg-primary text-white text-center p-3">
            <figure class="mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-white">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has a regular title and short paragraph of text below it.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card p-3 text-end">
            <figure class="mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
@endsection