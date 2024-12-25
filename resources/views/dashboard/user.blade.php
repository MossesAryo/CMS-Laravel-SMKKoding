@extends('layout.template')

@section('main')
<main class="flex-1 p-6">
            
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center">
                <div>
                    <h5 class="text-lg font-bold"></h5>
                    <p class="text-2xl">1,234</p>
                </div>
                <i class="fas fa-users fa-2x"></i>
            </div>
        </div>
        <div class="bg-green-500 text-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center">
                <div>
                    <h5 class="text-lg font-bold">Sales</h5>
                    <p class="text-2xl">$12,345</p>
                </div>
                <i class="fas fa-dollar-sign fa-2x"></i>
            </div>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center">
                <div>
                    <h5 class="text-lg font-bold">Performance</h5>
                    <p class="text-2xl">75%</p>
                </div>
                <i class="fas fa-chart-line fa-2x"></i>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <h2 class="text-xl font-bold mb-4">Recent Users</h2>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
               
            </tbody>
        </table>
    </div>
</main>

@endsection