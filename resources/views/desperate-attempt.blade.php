<style>
    body{
        background-color:hsla(110,0%,100%,1);
        background-image:
            radial-gradient(at -50% 0%, hsla(206,65%,66%,1) 0px, transparent 50%),
            radial-gradient(at 0% 100%, hsla(122,100%,50%,0.4) 0px, transparent 50%),
            radial-gradient(at 170% 0%, hsla(120,100%,50%,0.5) 0px, transparent 50%),
            radial-gradient(at 89% 99%, hsla(167,100%,50%,0.6) 0px, transparent 50%),
            url(https://grainy-gradients.vercel.app/noise.svg);

    }
    html{
        min-height: 100vh;
    }
    .glass{
        background: rgba(255, 255, 255, 0.10);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(9.5px);
        -webkit-backdrop-filter: blur(9.5px);
        border: 1px solid rgba(255, 255, 255, 0.72);
    }

    .fit{
        width: fit-content;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .red{
        color: red;
    }

</style>
