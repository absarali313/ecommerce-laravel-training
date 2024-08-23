<div class="row bg-white rounded-3 px-3 py-2 border border-1 border-white shadow">
    <div class="col">
        <div class="row">
            <div class="col">
                <label for="visibility" class="text-start text-secondary">Visibility</label>

                <div class="form-check form-switch mt-1">
                    <input type="hidden" name="visibility" value=false>
                    <input class="form-check-input border border-1 border-secondary-subtle" type="checkbox" role="switch" id="visibility" name="visibility" value=true   @checked(old('visibility') != null ? (old('visibility') == "true" ?? false) : (isset($product) && $product->isVisible()))>
                    <label class="form-check-label" for="visibility">{{ isset($product) && $product->isVisible()? 'This product is live.' : 'This product is currently inactive' }}</label>
                </div>

                <x-form-error name="visibility"/>
            </div>
        </div>
    </div>
</div>
