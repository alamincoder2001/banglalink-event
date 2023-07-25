@extends('layouts.backend_master')

@section('title', 'Event Create')
@section('breadcrumbTitle', 'Event Create')
@section('breadcrumbSubTitle', 'Event Create')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card event">
            <div class="card-body">
                <form onsubmit="saveData(event)">
                    <input type="hidden" name="id" id="id">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-gorup">
                                        <label for="venue">Venue Name</label>
                                        <select name="venue" id="venue" class="form-control shadow-none">
                                            <option value="">Choose venue name</option>
                                            @foreach($universities as $key => $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error error-venue"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eventDate">Event Date</label>
                                        <input type="date" id="eventDate" name="eventDate" class="form-control shadow-none">
                                        <span class="text-danger error error-eventDate"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="From">From</label>
                                        <input type="time" id="From" name="From" class="form-control shadow-none">
                                        <span class="text-danger error error-From"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="To">To</label>
                                        <input type="time" id="To" name="To" class="form-control shadow-none">
                                        <span class="text-danger error error-To"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="description">Short Description</label>
                                        <textarea name="description" id="description" rows="5" class="form-control shadow"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-end">
                                        <button type="submit" class="px-3 mt-3 btn btn-info btn-sm btnChange">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ImageBackground text-center">
                                <!-- <span class="text-danger">(150 X 150)</span> -->
                                <img src="{{asset('noimage.jpg')}}" class="imageShow" />
                                <label for="image">Upload Image</label>
                                <input type="file" id="image" name="logo" class="form-control shadow-none" onchange="imageUrl(event)" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card widget-flat">
            <div class="card-body">
                <table id="example" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Venue Name</th>
                            <th>Event Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    var table = $('#example').DataTable({
        ajax: "/admin/get-event",
        order: [
            [0, "desc"]
        ],
        columns: [{
                data: 'id',
            },
            {
                data: 'venue'
            },
            {
                data: 'eventDate'
            },
            {
                data: 'description'
            },
            {
                data: null,
                render: data => {
                    return `
                            ${'<button type="button" onclick="Edit('+data.id+')" class="btn btn-primary shadow-none btn-sm">Edit</button>'}            
                            ${'<button type="button" onclick="Delete('+data.id+')" class="btn btn-danger shadow-none btn-sm">Delete</button>'}
                        `;
                }
            }
        ],
    });

    function saveData(event) {
        event.preventDefault();
        let formdata = new FormData(event.target)
        $.ajax({
            url: "/admin/event",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $(".event").find('form .error').text('');
            },
            success: res => {
                if (res.status) {
                    $('form').trigger('reset')
                    $(".event").find('.imageShow').prop('src', '/noimage.jpg');
                    $.notify(res.msg, 'success');
                    table.ajax.reload();
                } else {
                    $.each(res.msg, (index, value) => {
                        $(".event").find('form .error-' + index).text(value);
                    })
                }
            }
        })
    }

    function Edit(id) {
        $.ajax({
            url: '/admin/get-event/' + id,
            method: "GET",
            success: res => {
                $.each(res, (index, value) => {
                    $(".event").find('form #' + index).val(value);
                })
                $(".event").find('.imageShow').prop('src', res.logo != null ? '/'+res.logo:'/noimage.jpg');
            }
        })
    }

    function Delete(id) {
        if (confirm("Are you sure!")) {
            $.ajax({
                url: '/admin/delete-event/' + id,
                method: "GET",
                success: res => {
                    if (res.status) {
                        $.notify(res.msg, 'success');
                        table.ajax.reload();
                    }
                }
            })
        }
    }

    function imageUrl(event) {
        if (event.target.files[0]) {
            let img = new Image()
            img.src = window.URL.createObjectURL(event.target.files[0]);
            document.querySelector('.imageShow').src = window.URL.createObjectURL(event.target.files[0]);
            // img.onload = () => {
            //     if (img.width === 150 && img.height === 150) {
            //     } else {
            //         alert(`This image ${img.width} X ${img.width} but require image 150px X 150px`);
            //     }
            // }
        }
    }
</script>
@endpush