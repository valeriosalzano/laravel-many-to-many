@if ($data['type'] == 'textarea')
    <div class="mb-3">
        <label for="{{ $data['field'] }}" class="form-label">{{ $data['label'] }}:</label>
        <textarea class="form-control @error($data['field']) is-invalid @enderror" id="{{ $data['field'] }}"
            name="{{ $data['field'] }}">{{ old($data['field'], $data['default']) }}</textarea>
        @include('partials.forms.validation.error_alert', ['field' => $data['field']])
    </div>
@elseif ($data['type'] == 'select')
    <div class="mb-3">

        <label for="{{ $data['field'] }}" class="form-label">{{ $data['label'] }}:</label>
        <select class="form-select @error($data['field']) is-invalid border-2 border-danger border @enderror"
            aria-label="Default select example" id="{{ $data['field'] }}" name="{{ $data['field'] }}">
            <option @selected(old($data['type'], $data['default']) == '') value=''>No types selected</option>
            @foreach ($data['options'] as $option)
                <option @selected(old($data['field'], $data['default']) == $option->id) value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>

        @include('partials.forms.validation.error_alert', ['field' => $data['field']])
    </div>
@elseif ($data['type'] == 'checkboxes')
    <div class="mb-3">
        <p>{{ $data['label'] }}</p>
        <ul class="list-group">
            @foreach ($data['options'] as $index => $option)
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" name="{{ $data['field'] . '[]' }}"
                        id="{{ $data['field'] }}_{{ $index }}"
                        @if ($errors->any())
                            @checked(in_array($option->id, old($data['field']), [] ))
                        @else
                            @checked($data['default']->contains($option->id)) @endif>
                    <label class="form-check-label"
                        for="{{ $data['field'] }}_{{ $index }}">{{ $option->name }}</label>
                </li>
            @endforeach
            @include('partials.forms.validation.error_alert', ['field' => $data['field']])
        </ul>
    </div>
@else
    <div class="mb-3">
        <label for="{{ $data['field'] }}" class="form-label">{{ $data['label'] }}:</label>
        <input type="{{ $data['type'] }}"
            class="form-control @error($data['field']) is-invalid border-2 border-danger border @enderror"
            id="{{ $data['field'] }}" name="{{ $data['field'] }}"
            value="{{ old($data['field'], $data['default']) }}">

        @include('partials.forms.validation.error_alert', ['field' => $data['field']])
    </div>
@endif
