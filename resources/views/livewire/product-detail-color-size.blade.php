<div>
    <div class="sizes d-flex">sizes:
        @foreach($ProductSizes as $size)
            <span class="size d-flex"  data-toggle="tooltip" title="{{$size->ProductSize->size}}"><label class="rdiobox mb-0"><input wire:click="selectSize({{$size->ProductSize->id}})" name="radio_size" type="radio"> <span>{{$size->ProductSize->size}}</span></label></span>
        @endforeach
    </div>
    <div class="colors d-flex mr-3 mt-2">
        <span class="mt-2">colors:</span>
        <div class="row gutters-xs mr-4">
            @foreach($ProductColors as $color)
                <div class="mr-2">
                    <label class="colorinput">
                        <input type="radio"  wire:click="selectColor({{$color->ProductColor->id}})"  class="colorinput-input">
                        <span class="colorinput-color" data-toggle="tooltip" title="{{$color->ProductColor->color_name}}" style="background-color: {{$color->ProductColor->color}}"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
