<style>
    #error-alert{
        min-width: 300px;
        position: fixed;
        top: 50px;
        right: -400px;
        transition: right 0.5s ease-out;
        z-index: 9999;
        margin-bottom: 10px
    }

    .error-message {
        margin-bottom: 0;
    }

    #error-alert.show {
        right: 50px;
    }

</style>

@if ($errors->any())
    <dir id="error-alert">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <h5 class="text-danger">Opps!</h5>
                <p class="error-message">{{ $error }}</p>
            </div>
        @endforeach
    </dir>
@endif
