
	@extends("admin_dashboard.layouts.app")

	@section("style")
    <link href="{{asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/vof3vihrlb30c4d3am03s7flnk09jbiueg20e99mnjvr9d2v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Posts</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Posts</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Post: {{$post->title}}</h5>
					  <hr/>
                      <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
                        @csrf
                        @method('PATCH')
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-12">
                           <div class="border border-3 p-4 rounded">
							 <div class="mb-3">
								<label for="inputProductTitle" class="form-label">Post Title</label>
								<input type="text" name="title" class="form-control" id="inputProductTitle" value="{{ old('title',$post->title)}}" placeholder="Enter post title">

                                @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
							  </div>
                              <div class="mb-3">
								<label for="inputProductTitle" class="form-label">Post Category</label>
                                <div class="card">
                                    <div class="card-body">
                                            <div class="mb-3">
                                                <select class="single-select" name="category_id">
                                                    @foreach ($categories as $key => $category )
                                                        <option {{ $post->category_id === $key ? 'selected' : ''}} value="{{ $key }}">{{ $category }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                    </div>
                                </div>

							  </div>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Post Content</label>
								<textarea id="mytextarea" name="body" class="form-control" id="inputProductDescription" rows="3">{{old('body', str_replace('../../', '../../../', $post->body))}}</textarea>
                                @error('body')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
							  </div>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Post Thumbnail</label>
								<input  id="thumbnail" type="file"  name="thumbnail" id="file">
                                @error('thumbnail')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                <div class='col-md-4 text-center'>
                                    <img style='width: 100%' src="/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
                                </div>
							  </div>
                              <div class="mb-3">
                                <label class="form-label">Post Tags</label>
                                <input type="text" class="form-control" name='tags' value="{{$tags}}" data-role="tagsinput">
                               </div>

                                  <button type="submit" class="btn btn-primary px-5">Update Post</button>
                                  <a
                                  class='btn btn-danger'
                                  onclick="event.preventDefault();document.getElementById('delete_post_{{ $post->id }}').submit()"
                                  href="#">Delete Post</a>

                            </div>
						   </div>

					   </div><!--end row-->
                      </div>
                    </form>
                    <form id="delete_post_{{ $post->id}}" action="{{ route('admin.posts.destroy', $post)}}" method="post">
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
    <script src="{{asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
	<script>

        $('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

        tinymce.init({
            selector: '#mytextarea',
            plugins: 'advlist autolink lists link image media charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: '500',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
            toolbar_mode: 'floating',
            image_title: true,
            automatic_uploads: false,

            images_upload_handler: function(bloginfo, success, failure)
            {
                let formData = new FormData();
                let _token = $("input[name='_token']").val();
                let xhr = new XMLHttpRequest();
                xhr.open('post', "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if( xhr.status !== 200 )
                    {
                        failure("Http Error: " + xhr.status);
                        return
                    }
                    let json = JSON.parse(xhr.responseText)
                    if(! json || typeof json.location != 'string')
                    {
                        failure("Invalid Json: " + xhr.responseText);
                        return
                    }
                    success( json.location )
                }
                formData.append('_token', _token);
                formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }


        });


	</script>
	@endsection
