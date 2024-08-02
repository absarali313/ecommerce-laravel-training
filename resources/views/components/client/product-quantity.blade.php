<style>
    .hover-border:hover {
        border-width: 3px !important; /* Increase border width on hover */
    }
    .button-hover{
        color: Gray !important;
        background-color: transparent !important;
    }
</style>
<div class="d-flex align-items-center justify-content-center border border-1 border-dark w-25 hover-border">
    <button class="btn btn-outline-secondary border-0 button-hover" id="decrement">-</button>
    <span class="mx-3" id="counter">1</span>
    <button class="btn btn-outline-secondary border-0 button-hover" id="increment">+</button>
</div>
