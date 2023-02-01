@extends('layout')

@section('content')

<div class="content-container">
    <label id="flabel">Fridge</label>
    <div class="fridge">
        <div class="header">
            <table><tr>
                <th style="width: 30%;"><div class="img label"></div></th>
                <th><div class="img qty"></div></th>
                <th><div class="img delivered"></div></th>
                <th><div class="img due"></div></th>
            </tr></table>
        </div>
        <div id="fridge" ></div>
        <div class="category"></div>
    </div>

    <label id="rlabel">Basket</label>
    <div class="out">
        <div id="retrieve"></div>
    </div>

    <div class="content-options">
        <div class="option" onclick="switchAdd();">Add Item</div>
        <div class="option" onclick="clearBasket();">Clear Basket</div>
        <form method="POST" action="/content/retrieve" style="    flex: 1 1 auto; display: flex;">
            @csrf
            <input style="display:none" type="text" id="basket" name="basket"/>
            <div style="display: flex; width: 100%;">
                <button type="submit" class="option"> Retrieve Items</button>
            </div>
        </form>
    </div>
</div>

<div class="add-overlay">
    <div class="add-option-cont">
        <div class="return" onclick="switchAdd();">
            <svg style="padding: 25%;" viewBox="0 0 110 110">
                <path d="M 10,10 l 90,90 M 100,10 l -90,90" stroke="black" stroke-width="10" stroke-linecap="round" ></path>
            </svg>
        </div>
        <form method="POST" action="/content/add">
        @csrf
            <div class="form-elem">
                <label for="name">Product name:
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="text" name="name" value="{{ old('name') }}"/>
            </div>

            <div class="form-elem">
                <label for="category">Category:
                    @error('category')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input list="category" name="category" value="{{ old('category') }}" />
                <datalist id="category">
                    <option value="Vegetable">
                    <option value="Fruit">
                    <option value="Meat">
                    <option value="Fish">
                </datalist>
            </div>

            <div class="form-elem">
                <label for="quantity">Quantity:
                    @error('quantity')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="text" name="quantity" value="{{ old('quantity') }}"/>
            </div>

            <div class="form-elem">
                <label for="unit">Measure:
                    @error('unit')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="text" name="unit" value="{{ old('unit') }}" />
            </div>

            <div class="form-elem">
                <label for="date_delivered">Delivery Date:
                    @error('date_delivered')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="date" name="date_delivered" value="{{ old('date_delivered') }}" />

            </div>

            <div class="form-elem">
                <label for="due_date">Due Date:
                    @error('due_date')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="date" name="due_date" value="{{ old('due_date') }}" />
            </div>

            <div>
            <button type="submit" class="button" style="margin: 2% 6%;">
                Confirm Add Item
            </button>
            </div>
        </form>
    </div>
</div>

<div style="display:none"></div>

<script>
    var addFlag = false;
    var iniFridge = {!! $products !!}
    var fridge = {!! $products !!};
    var retrieve = [];
    var fridgeElem = document.getElementById("fridge");
    var retrieveElem = document.getElementById("retrieve");
    var basketElem = document.getElementById("basket");

    function htmlToElement(html) {
        var template = document.createElement('template');
        template.innerHTML = html.trim();
        return template.content.firstChild;}

    function makeFridgeItem (item, index) {
        return `<div class="item fridge-item" id="F`+index+`" onclick="retrieveItem('`+index+`')">
                    <div style="flex-basis:30%">`+item.Name+`</div>
                    <div>`+item.Quantity+" "+item.Unit+`</div>
                    <div>`+item.Date_delivered+`</div>
                    <div>`+item.Due_date+`</div>
                </div>`;}

    function makeRetrieveItem (item, index) {
        return `<div class="item retrieve-item" id="R`+index+`" onclick="fridgeItem('`+index+`')">
                    <div style="flex-basis:30%">`+item.Name+`</div>
                    <div>`+item.Quantity+" "+item.Unit+`</div>
                    <div>`+item.Date_delivered+`</div>
                    <div>`+item.Due_date+`</div>
                </div>`;}

    function retrieveItem(index) {
        retrieve.splice(parseInt(retrieveElem.childElementCount), 0, fridge[index]);
        fridge.splice(parseInt(index), 1);
        reset();}

    function fridgeItem(index) {
        fridge.splice(parseInt(fridgeElem.childElementCount), 0, retrieve[index]);
        retrieve.splice(parseInt(index), 1);
        reset();}

    function reset()
        {let temp = "";
        fridgeElem.innerHTML = "";
        retrieveElem.innerHTML = "";
        for(let item in fridge) fridgeElem.appendChild(htmlToElement(makeFridgeItem(fridge[item], item)));
        for(let item in retrieve)
            {retrieveElem.appendChild(htmlToElement(makeRetrieveItem(retrieve[item], item)));
            temp += retrieve[item].id + ",";}
        basketElem.value = temp;
        }

    function clearBasket()
        {fridge = iniFridge;
        retrieve = [];
        reset();}

    function switchAdd()
        {document.getElementsByClassName("add-overlay")[0].classList.toggle("o-open");}

    function retrieveBasket()
        {window.location='{{ url('/content/retrieve') }}'}

    reset()

</script>

@endsection
