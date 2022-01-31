<div>
    @foreach($associate as $ake => $adat)
        &emsp;&emsp; 
        <input type="checkbox" name="{{$associate->id}}">
        {{ $associate->first_name }} <br>

        @if($adata->id < count($associates))
        	@include('sub_cat',['associate' => $associate, 'assoc_id' => $adata->id])
        @endif

    @endforeach
</div>

