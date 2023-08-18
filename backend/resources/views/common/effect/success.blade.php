<style>
    #success-alert {
        min-width: 300px;
        position: fixed;
        top: 50px;
        right: -400px;
        transition: right 0.5s ease-out;
        z-index: 9999;
    }

    #success-alert p {
        margin-bottom: 0px;
    }

    #success-alert.show {
        right: 50px;
    }
</style>

@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        <h5 class="text-success">Yeah!</h5>
        <p>{{ session('success') }}</p>
    </div>
@endif