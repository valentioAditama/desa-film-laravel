@foreach($data as $movie)
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$movie->id}}" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Are you sure for delete this data?</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dataMovie/delete/{{ $movie->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="text" value="{{$movie->id}}">
                    Are You Sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Sure, Just Delete it</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach