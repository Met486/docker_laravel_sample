<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Top</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div>
        <div>
            <h1>TODO List</h1>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Detail</th>
                    <th>DueDate</th>
                    <th>Status</th>
                    <th>Complete?</th>
                    <th>Delete?</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->detail }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if (strcmp($item->status,'Progress') == 0)
                        <form action="{{ route('items.complete', $item->id) }}" method="post">
                            @csrf @method('put')
                            <input type="submit" value="complete" class="btn btn-danger"
                                onclick='return confirm("completed?");' />
                        </form>
                        @else
                        <div>Complete</div>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('items.delete', $item->id) }}" method="post" class="float-right">
                            @csrf @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger"
                                onclick='return confirm("delete?");' />
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div>
            <h1>TODO Add Form</h1>
            <form action="{{ route('items.register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <br>
                    <input type="text" name="title" id="title" />
                    <br>
                    <label for="detail">Detail</label>
                    <br>
                    <input type="text" name="detail" id="detail" />
                    <br>
                    <label for="due_date">DueDate</label>
                    <br>
                    <input type="date" name="due_date" id="due_date" />
                    <br>
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
