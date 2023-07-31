<style>
    .switch {
        --button-width: 3.5em;
        --button-height: 2em;
        --toggle-diameter: 1.5em;
        --button-toggle-offset: calc((var(--button-height) - var(--toggle-diameter)) / 2);
        --toggle-shadow-offset: 10px;
        --toggle-wider: 3em;
        --color-grey: #cccccc;
        --color-green: #ff443d;
    }

    .slider {
        display: inline-block;
        width: var(--button-width);
        height: var(--button-height);
        background-color: var(--color-grey);
        border-radius: calc(var(--button-height) / 2);
        position: relative;
        transition: 0.3s all ease-in-out;
    }

    .slider::after {
        content: "";
        display: inline-block;
        width: var(--toggle-diameter);
        height: var(--toggle-diameter);
        background-color: #fff;
        border-radius: calc(var(--toggle-diameter) / 2);
        position: absolute;
        top: var(--button-toggle-offset);
        transform: translateX(var(--button-toggle-offset));
        box-shadow: var(--toggle-shadow-offset) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
        transition: 0.3s all ease-in-out;
    }

    .switch input[type="checkbox"]:checked+.slider {
        background-color: var(--color-green);
    }

    .switch input[type="checkbox"]:checked+.slider::after {
        transform: translateX(calc(var(--button-width) - var(--toggle-diameter) - var(--button-toggle-offset)));
        box-shadow: calc(var(--toggle-shadow-offset) * -1) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
    }

    .switch input[type="checkbox"] {
        display: none;
    }

    .switch input[type="checkbox"]:active+.slider::after {
        width: var(--toggle-wider);
    }

    .switch input[type="checkbox"]:checked:active+.slider::after {
        transform: translateX(calc(var(--button-width) - var(--toggle-wider) - var(--button-toggle-offset)));
    }
</style>

@if (isset($permissions))
    @foreach ($permissions as $permission)
        <div class="mb-[10px]">
            <nav class="form-label">{{ $permission->name }}</nav>
            <label class="switch">
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                <span class="slider"></span>
            </label>
        </div>
    @endforeach
@endif
