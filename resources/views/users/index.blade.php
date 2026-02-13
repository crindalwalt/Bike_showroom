
<x-dashboard-layout.main>

<style>
	.overview {display:flex;gap:16px;margin-bottom:18px}
	.overview .card{flex:1;padding:18px;border-radius:12px;background:#fff;border:1px solid #EEF2F7}
	.overview .card h3{margin:0 0 6px;font-size:15px}
	.overview .card p{margin:0;color:#6B7280;font-size:13px}
	.section{margin-bottom:22px}
	.section-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
	.btn{padding:.45rem .75rem;border-radius:8px;text-decoration:none;display:inline-block}
	.btn-warning{background:#F59E0B;color:#fff;border:none}
	.btn-outline-secondary{background:#fff;border:1px solid #E5E7EB;color:#111}
	.table{width:100%;border-collapse:collapse}
	.table th,.table td{padding:10px;border-bottom:1px solid #F1F5F9;text-align:left}
	.text-muted{color:#6B7280}
	.text-end{text-align:right}
</style>

<div class="content">

	<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
		<div>
			<h2>User Dashboard</h2>
			<p class="text-muted">Manage your products, categories and collections</p>
		</div>
	</div>

	<div class="overview">
		<div class="card">
			<h3>Add Product</h3>
			<p>Create and manage your product listings.</p>
			<div style="margin-top:12px">
				<a href="{{ route('dashboard.products.create') }}" class="btn btn-warning">Add Product</a>
			</div>
		</div>
		<div class="card">
			<h3>Add Category</h3>
			<p>Create categories to organize your products.</p>
			<div style="margin-top:12px">
				<a href="{{ route('dashboard.categories.create') }}" class="btn btn-outline-secondary">Add Category</a>
			</div>
		</div>
		<div class="card">
			<h3>Add Collection</h3>
			<p>Group related products into collections.</p>
			<div style="margin-top:12px">
				<a href="{{ route('dashboard.collections.create') }}" class="btn btn-outline-secondary">Add Collection</a>
			</div>
		</div>
	</div>

	<!-- Products list -->
	<div class="section">
		<div class="section-header">
			<div>
				<h3 style="margin:0">Products</h3>
				<div class="text-muted">Your product listings</div>
			</div>
			<div>
				<a href="{{ route('dashboard.products.create') }}" class="btn btn-warning">Add Product</a>
			</div>
		</div>

		<div class="card-box">
			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Category</th>
						<th>Price</th>
						<th class="text-end">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Roadster 300</td>
						<td>Sports</td>
						<td>$2,499</td>
						{{-- <td class="text-end">
							<a href="{{ route('dashboard.products.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('dashboard.products.edit') }}" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="{{ route('dashboard.products.delete') }}" class="btn btn-sm btn-danger">Delete</a>
						</td> --}}
					</tr>
					<tr>
						<td>Commuter Plus</td>
						<td>Touring</td>
						<td>$1,199</td>
						<td class="text-end">
							<a href="#" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="#" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Categories list -->
	<div class="section">
		<div class="section-header">
			<div>
				<h3 style="margin:0">Categories</h3>
				<div class="text-muted">Manage product categories</div>
			</div>
			<div>
				<a href="{{ route('dashboard.categories.create') }}" class="btn btn-warning">Add Category</a>
			</div>
		</div>

		<div class="card-box">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th class="text-end">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Sports</td>
						<td>High performance and track-ready motorcycles</td>
						<td class="text-end">
							<a href="{{ route('dashboard.categories.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('dashboard.categories.edit') }}" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="{{ route('dashboard.categories.delete') }}" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
					<tr>
						<td>Touring</td>
						<td>Comfort-focused bikes for long distances</td>
						<td class="text-end">
							<a href="#" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="#" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Collections list -->
	<div class="section">
		<div class="section-header">
			<div>
				<h3 style="margin:0">Collections</h3>
				<div class="text-muted">Group your products into collections</div>
			</div>
			<div>
				<a href="{{ route('dashboard.collections.create') }}" class="btn btn-warning">Add Collection</a>
			</div>
		</div>

		<div class="card-box">
			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Items</th>
						<th class="text-end">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Summer Specials</td>
						<td>8</td>
						<td class="text-end">
							<a href="{{ route('dashboard.collections.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('dashboard.collections.edit') }}" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="{{ route('dashboard.collections.delete') }}" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
					<tr>
						<td>City Commuters</td>
						<td>5</td>
						<td class="text-end">
							<a href="#" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
							<a href="#" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>

</x-dashboard-layout.main>
