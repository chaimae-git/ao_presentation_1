<section class="section_3 form-step" id="section_3">
    <div class="form-group mb-3">
        <label for="adresse mb-2">Adresse</label>
        <input type="text" class="form-control" name="adresse" placeholder="adresse" value={{old('adresse', $ao->adresse)}}>
        @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="map bg-gray w-100  mb-3" style="height:300px"></div>
    <div class="form-group clearfix">
        <div class="d-none">
            <input type="hidden" name="id" value="{{$ao->id}}">
        </div>

        <div class="flex justify-content-between">
            <div class="button">
                <button class="pull-left btn bg-blue-button btn-prev text-white" type="button">precedant</button>
            </div>
            <div class="button">
                <button class="pull-right btn bg-blue-button btn-next text-white" type="submit" >submit</button>
            </div>
        </div>
    </div>
</section>
