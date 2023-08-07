<style>
    .loader-container {
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        display: none;
    }

    .loader-container.show {
        display: block;
    }

    .loader-overlay {
        width: 100%;
        height: 100%;
        background-color: rgba(235, 237, 238, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader-item div {
        left: 94px;
        top: 48px;
        position: absolute;
        animation: loader-item linear 1s infinite;
        background: #ff443d;
        width: 12px;
        height: 24px;
        border-radius: 6px / 12px;
        transform-origin: 6px 52px;
    }

    .loader-item div:nth-child(1) {
        transform: rotate(0deg);
        animation-delay: -0.9166666666666666s;
        background: #ff443d;
    }

    .loader-item div:nth-child(2) {
        transform: rotate(30deg);
        animation-delay: -0.8333333333333334s;
        background: #ff443d;
    }

    .loader-item div:nth-child(3) {
        transform: rotate(60deg);
        animation-delay: -0.75s;
        background: #ff443d;
    }

    .loader-item div:nth-child(4) {
        transform: rotate(90deg);
        animation-delay: -0.6666666666666666s;
        background: #ff443d;
    }

    .loader-item div:nth-child(5) {
        transform: rotate(120deg);
        animation-delay: -0.5833333333333334s;
        background: #ff443d;
    }

    .loader-item div:nth-child(6) {
        transform: rotate(150deg);
        animation-delay: -0.5s;
        background: #ff443d;
    }

    .loader-item div:nth-child(7) {
        transform: rotate(180deg);
        animation-delay: -0.4166666666666667s;
        background: #ff443d;
    }

    .loader-item div:nth-child(8) {
        transform: rotate(210deg);
        animation-delay: -0.3333333333333333s;
        background: #ff443d;
    }

    .loader-item div:nth-child(9) {
        transform: rotate(240deg);
        animation-delay: -0.25s;
        background: #ff443d;
    }

    .loader-item div:nth-child(10) {
        transform: rotate(270deg);
        animation-delay: -0.16666666666666666s;
        background: #ff443d;
    }

    .loader-item div:nth-child(11) {
        transform: rotate(300deg);
        animation-delay: -0.08333333333333333s;
        background: #ff443d;
    }

    .loader-item div:nth-child(12) {
        transform: rotate(330deg);
        animation-delay: 0s;
        background: #ff443d;
    }

    .loader-sniper {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
    }

    .loader-item {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
    }

    .loader-item div {
        box-sizing: content-box;
    }

    @keyframes loader-item {
        0% {
            opacity: 1
        }

        100% {
            opacity: 0
        }
    }

</style>
<div class="loader-container">
    <div class="loader-overlay">
        <div class="loader-sniper">
            <div class="loader-item">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
