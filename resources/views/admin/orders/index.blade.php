@extends("admin.layouts.master")

@section("content")
<div class="content">
    <h1>Məhsullar</h1>

    <a href="@route('products.create')" class="btn btn-success">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Qty</th>
                <th scope="col">Total Price</th>
                <th scope="col">Is Accept</th>
                <th scope="col">Actions</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->qty }}</td>
                <td>{{ $order->total_price }}</td>
                @if ($order->is_accepted !== null)
                @if ($order->is_accepted === true)
                <td><span class="badge badge-success">Approved</span></td>
                @else
                <td><span class="badge badge-danger">Rejected</span></td>
                @endif
                @else
                <td><span class="badge badge-warning">Pending</span></td>
                @endif
                <td>
                    @if ($order->is_accepted !== null)
                    @if ($order->is_accepted === 1)
                    <a href="{{route('admin.orders.reject',$order->id)}}" class="btn btn-danger mb-1"><i class="icon-blocked mr-2"></i>
                        To Reject</a>
                    @else
                    <a href="{{route('admin.orders.accept', $order->id)}}" class="btn btn-success mb-1"><i class="icon-checkmark4 mr-2"></i>To Accept</a>
                    @endif
                    @else
                    <a href="{{route('admin.orders.accept', $order->id)}}" class="btn btn-success mb-1"><i class="icon-checkmark4 mr-2"></i>To Accept</a>
                    <a href="{{route('admin.orders.reject',$order->id)}}" class="btn btn-danger mb-1"><i class="icon-blocked mr-2"></i>
                        To Reject</a>
                    @endif
                <td>
                    <form onsubmit="return deleteConfirmation(event)" method="POST" action="{{route('admin.orders.delete', $order->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
