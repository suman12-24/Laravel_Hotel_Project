<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        /* Wrapper so table won't break when sidebar expands */
        .table-wrapper{
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            margin-top: 40px;
        }

        .table_deg{
            border: 2px solid white;
            width: 1500px; /* Prevent table shrinking */
            margin: auto;
            text-align: center;
            border-collapse: collapse;
            table-layout: auto;
        }

        .th_deg{
            background-color: skyblue;
            padding: 15px;
            white-space: nowrap;
        }

        tr{
            border: 3px solid white;
        }

        td{
            padding: 10px;
            white-space: nowrap; /* Prevent content wrapping */
        }

        /* Status dropdown column */
        .form-select-sm{
            padding: 5px;
            font-size: 13px;
        }

        /* Align dropdown inside cell */
        td form{
            display: inline-block;
            margin: 0;
        }
             .status-select.pending {
    background-color: #ffeb3b !important; /* Yellow */
    color: black !important;
}

.status-select.approved {
    background-color: #4CAF50 !important; /* Green */
    color: white !important;
}

.status-select.rejected {
    background-color: #f44336 !important; /* Red */
    color: white !important;
}


    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <div class="table-wrapper">

            <table class="table_deg">
              <tr>
                <th class="th_deg">Room id</th>
                <th class="th_deg">Customer Name</th>
                <th class="th_deg">Email</th>
                <th class="th_deg">Phone</th>
                <th class="th_deg">Arrival Date</th>
                <th class="th_deg">Departure Date</th>
                <th class="th_deg">Status</th>
                <th class="th_deg">Room Title</th>
                <th class="th_deg">Room Image</th>
                <th class="th_deg">Room Price</th>
                <th class="th_deg">Action</th>
              </tr>

              @foreach ($data as $data)
              <tr>
                <td>{{ $data->room_id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->start_date }}</td>
                <td>{{ $data->end_date }}</td>
                <td>
    <form action="{{ url('update_booking_status', $data->id) }}" method="POST">
        @csrf

        <select name="status"
                class="form-select form-select-sm status-select {{ strtolower($data->status) }}"
                onchange="this.form.submit()">

             {{-- Show Pending only if current status is Pending --}}
            @if ($data->status == 'pending')
                <option value="Pending" selected>Pending</option>
            @endif

            {{-- Approved --}}
            <option value="Approved" {{ $data->status == 'Approved' ? 'selected' : '' }}>
                Approved
            </option>

            {{-- Rejected --}}
            <option value="Rejected" {{ $data->status == 'Rejected' ? 'selected' : '' }}>
                Rejected
            </option>

        </select>

    </form>
</td>




                <td>{{ $data->room->room_title }}</td>

                <td>
                    <img width="100" src="roomimage/{{ $data->room->image }}" alt="">
                </td>

                <td>{{ $data->room->price }}</td>

                <td>
                    <a onclick="return confirm('Are you sure to delete this?')" 
                       href="{{ url('delete_booking', $data->id) }}" 
                       class="btn btn-danger btn-sm"
                       title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
              </tr>
              @endforeach
            </table>

          </div> <!-- table-wrapper end -->

        </div>
      </div>
    </div>

    @include('admin.footer')

  </body>
</html>
