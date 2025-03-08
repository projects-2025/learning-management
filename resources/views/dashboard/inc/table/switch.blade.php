<div class="toggle-switch">

    <input type="checkbox"
     class="toggle-input toggle-status"
     id="toggle_{{ $row->id }}"
     data-id="{{ $row->id }}" {{ $row->status === 'active' ? 'checked' : '' }}>

    <label class="toggle-label" for="toggle_{{ $row->id }}"></label>
</div>
