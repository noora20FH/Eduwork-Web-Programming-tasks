<x-mainlayout title="K-Pop Mart">
    <main class="container my-5">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row g-4">
            @foreach($data as $item )
            <!-- Kartu Ringkasan Jumlah Produk -->
            <div class="col-md-6 col-lg-3">
                <div class="card text-white shadow-sm h-100 rounded-3" style="background: white;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold text-uppercase">{{$item['title']}}</h5>
                            <i class="bi {{$item['icon']}} h1 opacity-50"></i>
                        </div>
                        <h2 class="display-4 fw-bold">{{$item['value']}}</h2>
                        <p class="card-text opacity-75">{{$item['description']}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-semibold">Grafik Transaksi Mingguan</h5>
                    </div>
                    <div class="card-body">
                        <!-- Ini adalah elemen canvas untuk chart -->
                        <canvas id="weeklyTransactionChart" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-semibold">Transaksi Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <input type="text" id="searchInput" class="form-control rounded-pill" placeholder="Cari transaksi...">
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <select id="statusFilter" class="form-select rounded-pill">
                                    <option value="">Semua Status</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select id="perPageSelect" class="form-select rounded-pill">
                                    <option value="5">5 per halaman</option>
                                    <option value="10" selected>10 per halaman</option>
                                    <option value="20">20 per halaman</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer" onclick="sortTable(0)">ID <span id="sort-0">↕️</span></th>
                                        <th scope="col" class="cursor-pointer" onclick="sortTable(1)">Tanggal <span id="sort-1">↕️</span></th>
                                        <th scope="col" class="cursor-pointer" onclick="sortTable(2)">Pelanggan <span id="sort-2">↕️</span></th>
                                        <th scope="col" class="cursor-pointer" onclick="sortTable(3)">Jumlah <span id="sort-3">↕️</span></th>
                                        <th scope="col" class="cursor-pointer" onclick="sortTable(4)">Status <span id="sort-4">↕️</span></th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <!-- Data transaksi akan dirender di sini oleh JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <nav class="d-flex justify-content-between align-items-center mt-3" aria-label="Tabel navigasi">
                            <div class="d-none d-sm-block">
                                <p id="paginationInfo" class="text-sm text-muted mb-0"></p>
                            </div>
                            <ul class="pagination mb-0 ms-auto">
                                <li class="page-item">
                                    <a class="page-link" href="#" id="prevBtn" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item d-none d-md-flex" id="pageNumbers">
                                    <!-- Angka halaman akan dirender di sini -->
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" id="nextBtn" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    {{-- Script untuk grafik transaksi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('weeklyTransactionChart').getContext('2d');
            const weeklyTransactionChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [
                        {
                            label: 'Transaksi',
                            data: [12, 19, 3, 5, 20, 3, 10],
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.1,
                            fill: true
                        },
                        {
                            label: 'Volume',
                            data: [1, 13, 6, 10, 1, 4, 1],
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.1)',
                            tension: 0.1,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    
    {{-- Script untuk tabel transaksi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Static transaction data
            const transactionsData = [
                { id: '#1001', date: 'Dec 15, 2023', customer: 'John Doe', amount: 125.99, status: 'completed' },
                { id: '#1002', date: 'Dec 14, 2023', customer: 'Jane Smith', amount: 89.50, status: 'pending' },
                { id: '#1003', date: 'Dec 14, 2023', customer: 'Mike Johnson', amount: 245.00, status: 'completed' },
                { id: '#1004', date: 'Dec 13, 2023', customer: 'Sarah Wilson', amount: 67.25, status: 'failed' },
                { id: '#1005', date: 'Dec 13, 2023', customer: 'David Brown', amount: 156.80, status: 'completed' },
                { id: '#1006', date: 'Dec 12, 2023', customer: 'Emma Davis', amount: 199.99, status: 'completed' },
                { id: '#1007', date: 'Dec 12, 2023', customer: 'Alex Chen', amount: 78.45, status: 'pending' },
                { id: '#1008', date: 'Dec 11, 2023', customer: 'Lisa Wang', amount: 234.50, status: 'completed' },
                { id: '#1009', date: 'Dec 11, 2023', customer: 'Tom Miller', amount: 45.25, status: 'failed' },
                { id: '#1010', date: 'Dec 10, 2023', customer: 'Kate Johnson', amount: 187.60, status: 'completed' }
            ];

            let currentPage = 1;
            let perPage = 10;
            let sortColumn = 0;
            let sortDirection = 'asc';
            let filteredData = [...transactionsData];

            function getStatusBadge(status) {
                const badges = {
                    completed: '<span class="badge bg-success">Completed</span>',
                    pending: '<span class="badge bg-warning text-dark">Pending</span>',
                    failed: '<span class="badge bg-danger">Failed</span>'
                };
                return badges[status];
            }

            function renderTable() {
                const tableBody = document.getElementById('tableBody');
                const start = (currentPage - 1) * perPage;
                const end = start + perPage;
                const paginatedData = filteredData.slice(start, end);

                tableBody.innerHTML = paginatedData.map(item => `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.date}</td>
                        <td>${item.customer}</td>
                        <td>$${item.amount.toFixed(2)}</td>
                        <td>${getStatusBadge(item.status)}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                `).join('');

                updatePagination();
            }

            function updatePagination() {
                const totalPages = Math.ceil(filteredData.length / perPage);
                const start = (currentPage - 1) * perPage + 1;
                const end = Math.min(currentPage * perPage, filteredData.length);
                
                document.getElementById('paginationInfo').textContent = 
                    `Menampilkan ${start} sampai ${end} dari ${filteredData.length} entri`;

                const pageNumbers = document.getElementById('pageNumbers');
                pageNumbers.innerHTML = '';
                
                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('li');
                    pageButton.className = `page-item ${i === currentPage ? 'active' : ''}`;
                    pageButton.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                    pageButton.onclick = (e) => {
                        e.preventDefault();
                        goToPage(i);
                    };
                    pageNumbers.appendChild(pageButton);
                }

                document.getElementById('prevBtn').parentNode.classList.toggle('disabled', currentPage === 1);
                document.getElementById('nextBtn').parentNode.classList.toggle('disabled', currentPage === totalPages);
            }

            function goToPage(page) {
                currentPage = page;
                renderTable();
            }

            function sortTable(column) {
                if (sortColumn === column) {
                    sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
                } else {
                    sortColumn = column;
                    sortDirection = 'asc';
                }

                const columns = ['id', 'date', 'customer', 'amount', 'status'];
                const key = columns[column];

                filteredData.sort((a, b) => {
                    let aVal = a[key];
                    let bVal = b[key];

                    if (key === 'amount') {
                        aVal = parseFloat(aVal);
                        bVal = parseFloat(bVal);
                    }

                    if (sortDirection === 'asc') {
                        return aVal > bVal ? 1 : -1;
                    } else {
                        return aVal < bVal ? 1 : -1;
                    }
                });

                document.querySelectorAll('[id^="sort-"]').forEach(el => el.textContent = '↕️');
                document.getElementById(`sort-${column}`).textContent = sortDirection === 'asc' ? '↑' : '↓';

                currentPage = 1;
                renderTable();
            }

            function filterTable() {
                const searchTerm = document.getElementById('searchInput').value.toLowerCase();
                const statusFilter = document.getElementById('statusFilter').value;

                filteredData = transactionsData.filter(item => {
                    const matchesSearch = Object.values(item).some(val => 
                        val.toString().toLowerCase().includes(searchTerm)
                    );
                    const matchesStatus = !statusFilter || item.status === statusFilter;
                    return matchesSearch && matchesStatus;
                });

                currentPage = 1;
                renderTable();
            }

            document.getElementById('searchInput').addEventListener('input', filterTable);
            document.getElementById('statusFilter').addEventListener('change', filterTable);
            document.getElementById('perPageSelect').addEventListener('change', function() {
                perPage = parseInt(this.value);
                currentPage = 1;
                renderTable();
            });

            document.getElementById('prevBtn').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) goToPage(currentPage - 1);
            });

            document.getElementById('nextBtn').addEventListener('click', (e) => {
                e.preventDefault();
                const totalPages = Math.ceil(filteredData.length / perPage);
                if (currentPage < totalPages) goToPage(currentPage + 1);
            });
            
            // Initial render
            renderTable();
        });
    </script>
</x-mainlayout>
