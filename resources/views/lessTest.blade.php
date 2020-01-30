@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 gallery">
            <div class="gallery-head">Галерея</div>
            <div class="gallery-block">
                <div class="g_item">1</div>
                <div class="g_item">2</div>
                <div class="g_item">3</div>
                <div class="g_item">4</div>
                <div class="g_item">5</div>
                <div class="g_item">6</div>
                <div class="g_item">7</div>
                <div class="g_item">8</div>
                <div class="g_item">9</div>
            </div>
        </div>

        <div class="col-md-12 cust-buttons">
            <div class="cust-buttons-head">Кнопки</div>
            <div class="cust-buttons-block">
                <div class="my-button cust-button xs">cust-button xs</div>
                <div class="my-button cust-button blue xs">cust-button blue xs</div>
                <div class="my-button cust-button black xs">cust-button black xs</div>
            </div>
            <div class="cust-buttons-block">
                <div class="my-button cust-button">cust-button</div>
                <div class="my-button cust-button blue">cust-button blue</div>
                <div class="my-button cust-button black">cust-button black</div>
            </div>    
            <div class="cust-buttons-block">    
                <div class="my-button cust-button xl">cust-button xl</div>
                <div class="my-button cust-button blue xl">cust-button blue xl</div>
                <div class="my-button cust-button black xl">cust-button black xl</div>
            </div>
        </div>
    </div>
</div>
@endsection
