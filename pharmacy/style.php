<style>
body {
    margin:0;
    font-family: Arial;

    background: url('medical.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* overlay */
body::before{
    content:"";
    position:fixed;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    top:0;
    left:0;
    z-index:-1;
}
</style>