<div class="datatable-dropdown">
    <label>
        <select id="per_page" name="per_page" class="datatable-selector">
            @foreach($pages as $page)
                @if($page == $per_page)
                <option value="{{$page}}" selected>{{$page}}</option>
                @else
                <option value="{{$page}}">{{$page}}</option>
                @endif
            @endforeach
        </select>
    </label>
</div>