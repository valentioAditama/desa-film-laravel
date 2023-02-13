@foreach($data as $movie)
<div class="modal fade" id="editmodal{{$movie->id}}" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Edit Users</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dataMovie/update/{{$movie->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Get ID -->
                    <input type="hidden" id="id-users" value="{{$movie->id}}">

                    @csrf

                    <!-- Title input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="title" class="form-control" name="title" required value="{{$movie->title}}" />
                        <label class="form-label" for="title">title</label>
                    </div>

                    <!-- Category input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="category" class="form-control" name="category" required value="{{$movie->category}}" />
                        <label class="form-label" for="category">Category</label>
                    </div>

                    <!-- link_film input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="link_film" class="form-control" name="link_film" required value="{{$movie->link_film}}" />
                        <label class="form-label" for="link_film">Link Movie From ZippyShare</label>
                    </div>

                    <!-- Link_trailer input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="Link_trailer" class="form-control" name="link_trailer" required value="{{ $movie->link_trailer }}" />
                        <label class="form-label" for="Link_trailer">Link Trailer From Youtube</label>
                    </div>

                    <!-- Banner input -->
                    <label for="">Banner Movie</label>
                    <div class="form-outline mb-4">
                        <input type="file" id="banner" class="form-control" name="banner" value="" />
                    </div>

                    <!-- Poster input -->
                    <label for="">Poster Movie</label>
                    <div class="form-outline mb-4">
                        <input type="file" id="Poster" class="form-control" name="poster" value="" />
                    </div>

                    <!-- Category input -->
                    <label for="description">Descripton Movie</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Input Description" maxlength="500">
                    {{ $movie->description }}
                    </textarea>

                    <div class="mt-4">
                        <button class="btn btn-success btn-sm">Upload</button>
                        <a href="/dataMovie" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach