<style>
    #success-alert {
        min-width: 340px;
        width: auto;
        position: fixed;
        top: 50px;
        right: -400px;
        background: #fff;
        z-index: 9999;
        transition: right 0.5s ease-out;
        border-left: 10px solid #a1f2e3;
        border-top: 2px solid #a1f2e3;
        border-right: 2px solid #a1f2e3;
        border-bottom: 2px solid #a1f2e3;
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
        font-weight: bold;
    }

    .noti p {
        margin-bottom: 0px;
        color: #000;
    }

    .icon {
        padding: 0 20px 0 10px;
    }

    .icon i {
        font-size: 26px
    }

    #success-alert.show {
        right: 50px;
    }
</style>

@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        <div class="icon">
            <i class="ti ti-check"></i>
        </div>
        <div class="noti">
            <h5>Success!</h5>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
