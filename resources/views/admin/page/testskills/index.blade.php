@extends('admin.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.add.test.skill') }}" class="btn btn-success btn-sm" title="Add New testskill">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ route('list.test.skill') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Test Skill Name</th>
                                        <th>Test(s)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($testskills as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td class="text-center">{{ $item->test_skill_name }} </td>
                                        <td class="text-center">
                                            @foreach($tests as $test)
                                                @if ($test->testskill_id == $item->id)
                                                <a style="display: block;" href="{{ route('admin.detail.test', ['id' => $test->id]) }}">{{ $test->name }}</a>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('get.test.skill', ['id' => $item->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                                                <i class="fa fa-edit"></i> Edit </a>
                                            <!-- <form method="POST" action="{{ url('/admin/testskills' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete testskill" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $testskills->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
