<div class="media">
    <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
    <div>
        @if(Auth::user())
            <form action="{{ route('comment/store') }}" method="post">
                <div class="form-group">
                    <input type="textarea" name="comment" class="form-control border" placeholder="comment" >
                </div>
            </form>
        @endif
    </div>
</div>