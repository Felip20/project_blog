<x-admin-layout>
    <h3 class="my-3 text-center">Blog Edit From</h3>
        <x-card-wrapper>
            <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                   <x-form.input name="title" value="{{$blog->title}}"></x-form.input>     
                   <x-form.input name="slug" value="{{$blog->slug}}"></x-form.input>     
                   <x-form.input name="intro" value="{{$blog->intro}}"></x-form.input>
                   <x-form.input name="thumbnail" type="file"></x-form.input>
                   <img src="/storage/{{$blog->thumbnail}}" width="200px" height="100px" alt="">     
                   <x-form.textarea name="body" value="{{$blog->body}}"></x-form.textarea>
                  
                  <x-form.wrapper>
                    <label for="category" class="form-label">Category</label>
                      <select name="category_id" id="category" class="form-control">
                          @foreach ($categories as $category)
                          <option {{ $category->id==old('category_id',$blog->category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select> 
                      <x-error name="category_id"></x-error>
                  </x-form.wrapper>
                  <div class="d-flex justify-content-end mt-3">
                      <button type="submit" class="btn btn-primary">
                          Submit
                      </button>
                  </div>
            </form>
        </x-card-wrapper>
</x-admin-layout>