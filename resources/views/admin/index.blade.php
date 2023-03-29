@section('title', 'Администраторы')

<link href="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.js"></script>
    <meta name="theme-color" content="#7952b3">
    
@section('content')

<div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Пользователи</h3>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
           
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    <div>{{ $user->name }}</div>
                </td>
                <td>
                    <div>{{ $user->email }}</div>
                </td>
                <td>
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}