@extends('dashboard')

@section('admin-content')
<head>
    <style>
        .blue{
            background-color: #4F46E5;
        }
        .green{
            background-color: #22C55E;
        }

    </style>
</head>
<div class="container mx-auto p-6">

    <!-- Visitor Statistics -->
    <h2 class="text-2xl font-semibold mb-4">Visitor Logs</h2>
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="blue text-white p-4 rounded">
            <h3 class="text-lg">Daily Visitors</h3>
            <p class="text-2xl">{{ $dailyVisitors }}</p>
        </div>
        <div class="green text-white p-4 rounded">
            <h3 class="text-lg">Weekly Visitors</h3>
            <p class="text-2xl">{{ $weeklyVisitors }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded">
            <h3 class="text-lg">Monthly Visitors</h3>
            <p class="text-2xl">{{ $monthlyVisitors }}</p>
        </div>
        <div class="bg-red-500 text-white p-4 rounded">
            <h3 class="text-lg">Yearly Visitors</h3>
            <p class="text-2xl">{{ $yearlyVisitors }}</p>
        </div>
    </div>

    <!-- Visitor Chart -->
    <canvas id="visitorChart" width="400" height="150"></canvas>

    <!-- Visitor Table -->
    <table class="min-w-full bg-white mt-6">
        <thead class="bg-[#266867] text-white">
            <tr>
                <th class="w-1/4 py-2 px-4">IP Address</th>
                <th class="w-1/4 py-2 px-4">Region</th>
                <th class="w-1/4 py-2 px-4">Destination Port</th>
                <th class="w-1/4 py-2 px-4">User Agent</th>
                <th class="w-1/4 py-2 px-4">Visited At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $visitor->ip_address }}</td>
                <td class="py-2 px-4">{{ $visitor->region }}</td>
                <td class="py-2 px-4">{{ $visitor->destination_port }}</td>
                <td class="py-2 px-4">{{ $visitor->user_agent }}</td>
                <td class="py-2 px-4">{{ $visitor->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $visitors->links('pagination::tailwind') }}
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitorChart').getContext('2d');
    const visitorChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Daily', 'Weekly', 'Monthly', 'Yearly'],
            datasets: [{
                label: 'Number of Visitors',
                data: [{{ $dailyVisitors }}, {{ $weeklyVisitors }}, {{ $monthlyVisitors }}, {{ $yearlyVisitors }}],
                backgroundColor: ['#4F46E5', '#22C55E', '#FBBF24', '#EF4444']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
