@extends('layouts.backend_master')

@section('title', 'Register List')
@section('breadcrumbTitle', 'Register List')
@section('breadcrumbSubTitle', 'Register List')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card widget-flat">
            <div class="card-body">
                <table id="customTable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Register Code</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th>University</th>
                            <th>Student Id</th>
                            <th>Academic Year</th>
                            <th>Type Of Degree</th>
                            <th>Degree Level</th>
                            <th>About Ennovators</th>
                            <th>Facebook Follow</th>
                            <th>Instagram Follow</th>
                            <th>Linkedin Follow</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($registers as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->registrationID}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->dob}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->university}}</td>
                            <td>{{$item->studentId}}</td>
                            <td>{{$item->academic_year}}</td>
                            <td>{{$item->gender ? $item->degree->name : ''}}</td>
                            <td>{{$item->degree_level}}</td>
                            <td>{{$item->ennovator ? $item->ennovator->name: ''}}</td>
                            <td>
                                @if($item->facebook_status == 'Yes')
                                <span class="badge bg-success">{{$item->facebook_status}}</span>
                                @else
                                <span class="badge bg-danger">{{$item->facebook_status}}</span>
                                @endif
                            </td>
                            <td>
                                @if($item->instagram_status == 'Yes')
                                <span class="badge bg-success">{{$item->instagram_status}}</span>
                                @else
                                <span class="badge bg-danger">{{$item->instagram_status}}</span>
                                @endif
                            </td>
                            <td>
                                @if($item->linkedin_status == 'Yes')
                                <span class="badge bg-success">{{$item->linkedin_status}}</span>
                                @else
                                <span class="badge bg-danger">{{$item->linkedin_status}}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{route('admin.registerdestroy', $item->id)}}" onclick="registerDelete(event)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    function registerDelete(event) {
        event.preventDefault();
        $.ajax({
            url: event.target.href,
            method: "GET",
            success: res => {
                alert(res)
                location.reload();
            }
        })
    }
</script>
@endpush