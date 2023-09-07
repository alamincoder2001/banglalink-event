@extends('layouts.backend_master')

@section('title', 'Participant Create')
@section('breadcrumbTitle', 'Participant Create')
@section('breadcrumbSubTitle', 'Participant Create')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card participant">
            <div class="card-body">
                <form onsubmit="saveData(event)">
                    <input type="hidden" name="id" id="id">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-gorup">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control shadow-none">
                                        <span class="text-danger error error-title"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-gorup">
                                        <label for="type">Type</label>
                                        <select id="type" onchange="VideoURLShow(event)" name="type" class="form-control shadow-none">
                                            <option value="image">Image</option>
                                            <option value="video">Video</option>
                                        </select>
                                        <span class="text-danger error error-type"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 d-none video">
                                    <div class="form-gorup">
                                        <label for="url">Video URL</label>
                                        <input type="text" id="url" name="url" class="form-control shadow-none" autocomplete="off" />
                                        <span class="text-danger error error-url"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-end">
                                        <button type="submit" class="px-3 mt-3 btn btn-info btn-sm btnChange">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 imageHide">
                            <div class="form-group ImageBackground text-center">
                                <span class="text-danger">(1280 X 720)</span>
                                <img src="{{asset('noimage.jpg')}}" class="imageShow" />
                                <label for="uploadImage">Upload Image</label>
                                <input type="file" id="uploadImage" name="image" class="form-control shadow-none" onchange="imageUrl(event)" />
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
                            <th>Title</th>
                            <th>URL</th>
                            <th>Type</th>
                            <th>Image</th>
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
        ajax: "/admin/get-participant",
        order: [
            [0, "desc"]
        ],
        columns: [{
                data: 'id',
            },
            {
                data: 'title'
            },
            {
                data: null,
                render: data => {
                    return data.type == 'video' ? data.url : 'N/A';
                }
            },
            {
                data: null,
                render: data => {
                    return `<span class='text-uppercase'>${data.type}</span>`;
                }
            },
            {
                data: null,
                render: data => {
                    return data.type == 'image' ? `<img src="${data.image != null ? '/'+data.image : '/noimage.jpg'}" width="80"/>` : 'N/A';;
                }
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
            url: "/admin/participant",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $(".participant").find('form .error').text('');
            },
            success: res => {
                if (res.status) {
                    $('form').trigger('reset')
                    $(".participant").find('.imageShow').prop('src', '/noimage.jpg');
                    $.notify(res.msg, 'success');
                    table.ajax.reload();
                } else {
                    $.each(res.msg, (index, value) => {
                        $(".participant").find('form .error-' + index).text(value);
                    })
                }
            }
        })
    }

    function Edit(id) {
        $.ajax({
            url: '/admin/get-participant/' + id,
            method: "GET",
            success: res => {
                $.each(res, (index, value) => {
                    $(".participant").find('form #' + index).val(value);
                })
                $(".participant").find('.imageShow').prop('src', res.image != null ? '/' + res.image : '/noimage.jpg');
                if (res.type == 'video') {
                    $(".video").removeClass('d-none')
                    $(".imageHide").addClass('d-none')
                } else {
                    $(".video").addClass('d-none')
                    $(".imageHide").removeClass('d-none')
                }
            }
        })
    }

    function Delete(id) {
        if (confirm("Are you sure!")) {
            $.ajax({
                url: '/admin/delete-participant/' + id,
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
            img.onload = () => {
                if (img.width === 1280 && img.height === 720) {
                    document.querySelector('.imageShow').src = window.URL.createObjectURL(event.target.files[0]);
                } else {
                    alert(`This image ${img.width} X ${img.width} but require image 1280px X 720px`);
                }
            }
        }
    }

    function VideoURLShow(event) {
        if (event.target.value == 'video') {
            $(".video").removeClass('d-none')
            $(".imageHide").addClass('d-none')
        } else {
            $(".video").addClass('d-none')
            $(".imageHide").removeClass('d-none')
        }
    }
</script>
@endpush