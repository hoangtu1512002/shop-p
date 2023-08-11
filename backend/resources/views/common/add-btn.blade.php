<style>
    .btn-class-name {
        --primary: 255, 90, 120;
        --secondary: 150, 50, 60;
        width: 60px;
        height: 50px;
        border: none;
        outline: none;
        cursor: pointer;
        user-select: none;
        touch-action: manipulation;
        outline: 10px solid rgb(var(--primary), .5);
        border-radius: 100%;
        position: relative;
        transition: .3s;
    }

    .btn-class-name .back {
        background: rgb(var(--secondary));
        border-radius: 100%;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .btn-class-name .front {
        background: linear-gradient(0deg, rgba(var(--primary), .6) 20%, rgba(var(--primary)) 50%);
        box-shadow: 0 .5em 1em -0.2em rgba(var(--secondary), .5);
        border-radius: 100%;
        position: absolute;
        border: 1px solid rgb(var(--secondary));
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
        font-weight: 600;
        font-family: inherit;
        transform: translateY(-15%);
        transition: .15s;
        color: rgb(var(--secondary));
    }

    .btn-class-name .front i {
        color: #fff;
    }

    .btn-class-name:active .front {
        transform: translateY(0%);
        box-shadow: 0 0;
    }
</style>

<a href="{{ route($route) }}" class="btn-class-name">
    <span class="back"></span>
    <span class="front"><i class="ti ti-plus"></i></span>
</a>
