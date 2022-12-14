@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2">
            <div class="panel panel-default border rounded bg-white col-sm-6 mb-4">
                <div class="panel-heading text-white border-bottom text-center bg-primary fw-semibold p-3 rounded ">
                    Form Create Task
                </div>

                <div class="panel-body p-3">

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group mb-3">
                            <label for="task-name" class="form-label">Task Name :</label>

                            <div class="col-sm-12">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3">
                                <button type="submit" class="btn px-3 btn-primary">
                                    Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p class="mb-0">{{ $message }}</p>
			</div>
			@endif

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default border rounded mb-3">
                    <div class="panel-heading border-bottom text-center fw-bold p-3 bg-light">
                        Tasks Data
                    </div>

                    <div class="panel-body p-3">
                        <table class="table table-striped task-table">
                        <!-- <label for="search" class="ms-2 mb-1" >Cari data : </label> -->
                            <div class="row justify-content-end  ">
                                    <!-- New Task Form -->
                                    <form class="mt-2" method="get" action="{{ route('search') }}">
                                            <div class="form-group col-sm-auto col-md-4 mb-2 " >
                                                    <input placeholder="Keyword..." type="text" name="search" id="search" class="table-text form-control">
                                            </div>
                                            <div class="form-group col-sm-auto col col-md-auto col-lg-auto mb-4">
                                                 <button type="submit" class="btn px-3 btn-primary">
                                                        Search
                                                 </button>  
                                            </div>
                                    </form>    
                            <thead>
                                <th class="align-middle">Task Name</th>
                                <!-- <th class="text-end" colspan="2">
									<form class="form" method="get" action="{{ route('search') }}">
										<div class="form-group">
											<input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Keyword...">
											<button type="submit" class="btn btn-primary mx-1 mb-1">Search</button>
										</div>
									</form>
								</th> -->
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text col-8"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td class="col-6 col-xs-3 text-end">
                                            <form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <!-- Button trigger modal -->
                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete') }} {{ $task->name }} {{ '?' }}')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        
										<td class="col-2 text-end">
											<a href="{{url('task/edit')}}/{{$task->id}}" class="btn btn-success">Edit</a>
										</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  
            @else
                <div class="panel panel-default border rounded mb-3 ">
                        <div class="panel-heading border-bottom text-center fw-bold p-3 bg-light">
                            Tasks Data
                        </div>

                        <div class="panel-body p-3">
                            <table class="table table-striped task-table ">
                            <!-- <label for="search" class="ms-2 mb-1" >Cari data : </label> -->
                            <div class="row justify-content-end">
                                    <!-- New Task Form -->
                                    <form class="mt-2" method="get" action="{{ route('search') }}">
                                            <div class="form-group col-sm-auto col-md-4 mb-2 " >
                                                    <input placeholder="Keyword..." type="text" name="search" id="search" class="table-text form-control">
                                            </div>
                                            <div class=" form-group col-sm-auto col col-md-2 col-lg-auto mb-4">
                                                 <button type="submit" class="btn px-3 btn-primary">
                                                        Search
                                                 </button>  
                                            </div>
                                    </form>
                                </div>
                                <thead>
                                    <th class="align-middle">Task Name</th>
                                    <!-- <th class="text-end" colspan="2">
                                        <form class="form" method="get" action="{{ route('search') }}">
                                            <div class="form-group ">
                                                <tr class="">
                                                    <input type="text" name="search" class="table-text form-control w-25 d-inline mb-2" id="search" placeholder="Keyword...">
                                                    <button type="submit" class="btn btn-primary mx-1 mb-1">Search</button>
                                                </tr>      
                                            </div> 
                                        </form>
                                    </th> -->
                                </thead>
                                <tbody class="">
                                        <tr class="">
                                            <td class="table-text col-lg-12 text-center">
                                                <div class = "">
                                                    Data tidak ditemukan
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- <div class="panel-body p-3">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th class="align-middle">Task Name</th>
                                    <th class="text-end" colspan="2">
                                        <form class="form" method="get" action="{{ route('search') }}">
                                            <div class="form-group ">
                                                <tr class="">
                                                    <input type="text" name="search" class=" table-text form-control w-25 d-inline mb-2" id="search" placeholder="Keyword...">
                                                    <button type="submit" class="btn btn-primary mx-1 mb-1">Search</button>
                                                </tr>      
                                            </div> 
                                        </form>
                                    </th>
                                </thead>
                            </table>
                        </div> -->
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
