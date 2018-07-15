@extends('front.page.master') @section('content')
<div class="container portlet light portlet-fit portlet-datatable ">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
        <div class="box-caption box-caption-margin">
          <p>
            <span class="bc-icon icon-lego"></span> Answer Keys:</p>
        </div>
        <ul class="col-md-6 list-answer green">
          
          @foreach ($data['answers'] as $answer) 
            <span>{{ $loop->iteration }}</span>
            @foreach ($answer as $ans)
          <li class="qp-item">{{ $ans->answer }}</li>
           @endforeach
          @endforeach
        </ul>
      </div>
      <div class="col-md-4">
        <div class="box-caption">
          <p>
            <span class="bc-icon icon-board"></span> Leaderboard:</p>
        </div>
        <div class="table">
          <?php $i=0; ?>
          <table width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Score</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $i++; ?>
                </td>
                <td>Quynh Nguyen</td>
                <td>8.5</td>
                <td>19:59</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection