
	@extends("admin_dashboard.layouts.app")

	@section("style")
    <link href="{{asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />

	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Categories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Categories</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Category</h5>
					  <hr/>
                      <form action="{{ route('admin.categories.update', $category) }}" method='post' >
                        @csrf
                        @method('PATCH')
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-12">
                           <div class="border border-3 p-4 rounded">
							 <div class="mb-3">
								<label for="inputProductTitle" class="form-label">Category Name</label>
								<input type="text" name="name" class="form-control" id="inputProductTitle" value="{{ old('name', $category->name)}}" placeholder="Enter category name">

                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
							  </div>


                                  <button type="submit" class="btn btn-primary px-5">Update Category</button>
                                  <a
                                  class='btn btn-danger'
                                  onclick="event.preventDefault();document.getElementById('delete_category_{{ $category->id }}').submit()"
                                  href="#">Delete Category</a>

                            </div>
						   </div>

					   </div><!--end row-->
                      </div>
                    </form>
                    <form id="delete_category_{{ $category->id}}" action="{{ route('admin.categories.destroy', $category)}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>

				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->
		@endsection

	@section("script")

	<script>



        $(document).ready(function () {

        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
        });


	</script>
	@endsection
