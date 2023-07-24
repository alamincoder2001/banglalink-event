@extends('layouts.backend_master')

@section('title', 'University Create')
@section('breadcrumbTitle', 'University Create')
@section('breadcrumbSubTitle', 'University Create')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card university">
            <div class="card-body">
                <form onsubmit="saveData(event)">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-gorup">
                                <label for="name">University Name</label>
                                <input type="text" name="name" id="name" autocomplete="off" class="form-control shadow-none" />
                                <span class="text-danger error-name"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="px-3 mt-3 btn btn-info btn-sm btnChange">Save</button>
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
                            <th>Name</th>
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
        ajax: "/admin/get-university",
        order: [
            [0, "desc"]
        ],
        columns: [{
                data: 'id',
            },
            {
                data: 'name'
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
            url: "/admin/university",
            method: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            beforeSend: () => {
                $(".university").find('form .text-danger').text('');
            },
            success: res => {
                if (res.status) {
                    $('form').trigger('reset')
                    $.notify(res.msg, 'success');
                    table.ajax.reload();
                } else {
                    $.each(res.msg, (index, value) => {
                        $(".university").find('form .error-' + index).text(value);
                    })
                }
            }
        })
    }

    function Edit(id) {
        $.ajax({
            url: '/admin/get-university/' + id,
            method: "GET",
            success: res => {
                $.each(res, (index, value) => {
                    $(".university").find('form #'+index).val(value);
                })
            }
        })
    }

    function Delete(id) {
        if (confirm("Are you sure!")) {
            $.ajax({
                url: '/admin/delete/' + id,
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
</script>
@endpush