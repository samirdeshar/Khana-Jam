@extends('layouts.backend_layout.template')
@section('title', 'Admin || Sliders')
@section('backend-css')
    <style>
        .drop-hover:hover {
            color: black !important;
        }
    </style>


@endsection

@section('main-content')
    <div class="pagetitle">
        <h1>Sliders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Slider List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="float">Slider List</h5>
                        <a href="{{ route('slider.create') }}" style="float:right;margin-right:20px;"
                            class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Create New Slider</a>

                        <p>All Sliders Listed Here.....</p>

                        <div>
                            {{-- -------------------Status Drop Down----------------- --}}
                            <!-- Example single danger button -->
                            <div class="btn-group" style="float:left">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Status
                                </button>
                                <ul class="dropdown-menu bg-success ">
                                    <li><a class="dropdown-item text-white drop-hover"
                                            href="{{ route('get-slider-status', 'active') }}"><i
                                                class="bi bi-check-circle me-1"></i> Active</a></li>
                                    <li><a class="dropdown-item text-white drop-hover"
                                            href="{{ route('get-slider-status', 'inactive') }}"><i
                                                class="bi bi-exclamation-octagon me-1"></i> In-Active</a></li>
                                    <li><a class="dropdown-item text-white drop-hover"
                                            href="{{ route('get-slider-status', 'all') }}"><i
                                                class="bi bi-collection-fill me-1"></i> All</a></li>
                                </ul>
                            </div>
                            {{-- -------------------Status Drop Down----------------- --}}

                            {{-- -------------------Action Drop Down----------------- --}}
                            <!-- Example single danger button -->
                            <div class="btn-group " style="float:right;margin-right:10px;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu bg-danger ">

                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item text-white drop-hover to-trip"
                                            data-multiple_action="active">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Active
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item text-white drop-hover to-trip"
                                            data-multiple_action="inactive">
                                            <i class="bi bi-exclamation-octagon me-1"></i>
                                            Inactive
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item text-white drop-hover to-trip"
                                            data-multiple_action="delete">
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------------Action Drop Down----------------- --}}
                        </div>
                        <!-- Table with stripped rows -->
                        <form action="{{ route('to-slider') }}" method="post" id="full-form">
                            <input type="text" hidden name="multiple_action" id="multiple_action">
                            @csrf
                            <table class="table ">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Action</th>
                                        <th>
                                            <input type="checkbox" name="selectall" id="selectall">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($data)
                                        {{-- @dd($data) --}}
                                        @php $n = 1; @endphp
                                        @foreach ($data as $post)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                <td>{{ ucfirst($post->title) }}</td>
                                                <td>
                                                    @if ($post->image && $post->image != null)
                                                        <a href="{{ asset(@$post->image) }}"
                                                            data-lightbox="image-{{ $post->id }}"
                                                            data-title="{{ ucfirst($post->title) }}">
                                                            View
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('slider-update-status', [$post->id, $post->status]) }}">
                                                        <span
                                                            class="badge rounded-pill bg-{{ $post->status == 'active' ? 'success' : 'danger' }}"><i
                                                                class="bi {{ $post->status == 'active' ? 'bi-check-circle me-1 ' : 'bi-exclamation-octagon me-1' }} "></i>
                                                            {{ ucfirst($post->status) }}</span>
                                                    </a>
                                                </td>
                                                <td>{{ date('Y/m/d', strtotime($post->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('slider.edit', $post) }}"
                                                        class="btn btn-sm btn-primary btn-style">
                                                        <i class="bi bi-pen-fill"></i>
                                                    </a>
                                                    <a href="javascript:;" data-id="{{ $post->id }}"
                                                        class="btn btn-sm btn-danger btn-style delete-trip">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="selects[]" class="select"
                                                        value="{{ $post->id }}">
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endisset

                                </tbody>
                            </table>
                        </form>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>


        {{ Form::open(['url' => '', 'class' => 'delete-form']) }}
        @method('delete')
        {{ Form::close() }}


    </section>

@endsection

@section('backend-js')

    <script>
        $('#selectall').click(function() {
            $('input:checkbox').prop('checked', this.checked);
        });

        $('.to-trip').on('click', function(e) {
            var performAction = $(this).data('multiple_action');
            $('#multiple_action').val(performAction);
            if (confirm('Are You sure want to ' + performAction + '......?')) {
                $('#full-form').submit();
            }
        });

        $(document).on('click', '.delete-trip', function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            $('.delete-form').attr('action', "{{ route('slider.destroy', '') }}/" + productId);
            let clicked = confirm('Are You Sure Want To Delete slider !');

            if (clicked) {
                $('.delete-form').submit();
            }
        });
    </script>
@endsection
