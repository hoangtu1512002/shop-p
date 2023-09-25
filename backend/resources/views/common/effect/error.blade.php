<style>
    #error-alert{
        min-width: 300px;
        width: auto;
        position: fixed;
        top: 50px;
        right: -400px;
        transition: right 0.5s ease-out;
        z-index: 9999;
        margin-bottom: 10px;
    }

    .alert {
        background: #fff;
        border-left: 10px solid #fc6661;
        border-top: 2px solid #fc6661;
        border-right: 2px solid #fc6661;
        border-bottom: 2px solid #fc6661;
        padding: 0;
        display: flex;
        align-items: center;
        padding: 16px 0;
    }

    .noti {
        flex: 1;
        padding-right: 20px;
    }

    .noti h5 {
        color: #000;
    }

    .noti p {
        margin-bottom: 0px;
        color: #000;
    }

    .icon {
        padding: 0 20px 0 10px;
    }

    .icon i {
        color: #fc6661;
    }

    .error-message {
        margin-bottom: 0;
    }

    #error-alert.show {
        right: 50px;
    }

</style>

@if ($errors->any())
    <div id="error-alert">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <div class="icon">
                    <i class="ti ti-x"></i>
                </div>
                <div class="noti">
                    <h5>Error!</h5>
                    <p class="error-message">{{ $error }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif
